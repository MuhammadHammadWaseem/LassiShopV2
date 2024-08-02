<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Sale;
use App\Models\Unit;
use App\Models\User;
use App\Models\Order;
use App\Models\Point;
use App\Models\Account;
use App\Models\Setting;
use App\Events\OrderList;
use App\Mail\OrderCreated;
use App\Models\SaleDetail;
use App\Models\OnlineOrder;
use App\Models\PaymentSale;
use App\Models\Notification;
use App\Models\PosSaleItems;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Models\NewProductDetail;
use App\Events\NotificationCreate;
use App\Models\NotificationDetail;
use App\Models\OnlineOrderDetails;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\OrderDetailsRequest;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\{Category, NewProduct, Product};
use App\Events\OnlineOrderCreated;

class GuestController extends Controller
{
    public function index()
    {
        $setting = Setting::with('currency')->get();

        $categories = Category::where('deleted_at', null)->where('is_ingredient', 0)->get();

        $OrderNumber = Session::get('OrderNumber');
        return view('guest.index')->with(compact('categories', 'setting','OrderNumber'));
    }
    public function getProductByCategory($id)
    {
        $setting = Setting::with('currency')->get();
        $category = Category::find($id);
        if ($category) {
            // $products = NewProduct::where('category_id', $id)->get();
            $products = NewProduct::all();
        }
        return view('guest.products', compact('setting', 'category', 'products'));
    }

    public function addToCart(Request $request)
    {
        // Session::forget('guest_cart');
        // Retrieve the cart
        $cart = Session::get('guest_cart') ?? [];
        // Keep track of out-of-stock items
        $outOfStockItems = [];
        $canAddToCart = true; // Assume the products can be added until proven otherwise

        // Continue with the rest of the code for processing the requested product
        $productId = $request->id;
        $productPrice = $request->price;
        $productName = $request->name;
        $productImgPath = $request->img_path;

        // Clone the cart to simulate the addition of the new product
        $simulatedCart = $cart;
        // $simulatedOrderList = $OrderList;
        if (array_key_exists($productId, $simulatedCart)) {
            $simulatedCart[$productId]['quantity'] += 1;
        } else {
            $simulatedCart[$productId] = [
                'id' => $productId,
                'name' => $productName,
                'price' => $productPrice,
                'img_path' => $productImgPath,
                'quantity' => 1,
            ];
        }

        // Calculate the total quantity needed for all products in the simulated cart
        $totalQuantityNeeded = [];
        foreach ($simulatedCart as $item) {
            $productDetails = NewProductDetail::where('new_product_id', $item['id'])->get();
            foreach ($productDetails as $productDetail) {
                $unit = Unit::where('id', $productDetail->unit_id)->first();
                $ingredientWarehouse = \App\Models\product_warehouse::where('product_id', $productDetail->base_product_id)
                    ->where('warehouse_id', $request->warehouse_id)
                    ->first();

                if ($unit && $ingredientWarehouse) {
                    // Calculate quantity in the base unit
                    $quantityInBaseUnit = $productDetail->qty * $item['quantity'];

                    // Check if unit conversion is needed
                    if ($unit->name !== 'Units') {
                        // Apply unit conversion
                        if ($unit->operator === '/' && $unit->operator_value !== 0) {
                            $quantityInBaseUnit /= $unit->operator_value;
                        } elseif ($unit->operator === '*' && $unit->operator_value !== 0) {
                            $quantityInBaseUnit *= $unit->operator_value;
                        } else {
                            throw new \Exception('Invalid conversion for unit: ' . $unit->name);
                        }
                    }

                    // Add the quantity needed for the current item to the total
                    if (!isset($totalQuantityNeeded[$ingredientWarehouse->product_id])) {
                        $totalQuantityNeeded[$ingredientWarehouse->product_id] = 0;
                    }

                    $totalQuantityNeeded[$ingredientWarehouse->product_id] += $quantityInBaseUnit;

                    if ($totalQuantityNeeded[$ingredientWarehouse->product_id] > $ingredientWarehouse->qte) {
                        // Track out-of-stock item
                        $canAddToCart = false;
                        $outOfStockItems[] = "Out of Stock";
                        break; // Stop checking other ingredients if one is out of stock
                    }
                }
            }
        }

        // Check if any out-of-stock items were found
        if (!$canAddToCart) {
            return response()->json(['message' => 'Out of stock for: ' . implode(', ', $outOfStockItems)]);
        }

        // Update the actual cart if the stock check passes
        if (array_key_exists($productId, $cart)) {
            $cart[$productId]['quantity'] += 1;
            Session::put('guest_cart', $cart);
        } else {
            $cart[$productId] = [
                'id' => $productId,
                'name' => $productName,
                'price' => $productPrice,
                'img_path' => $productImgPath,
                'quantity' => 1,
            ];
            Session::put('guest_cart', $cart);
        }

        // Return the updated cart in the response
        return response()->json(['guest_cart' => $cart]);
    }

    public function updateQuantity(Request $request)
{
    $cart = Session::get('guest_cart');
    $productId = $request->id;

    if (isset($cart[$productId])) { // Check if the productId exists in the cart
        if ($cart[$productId]['quantity'] == 1) {
            unset($cart[$productId]);
        } else {
            $cart[$productId]['quantity'] -= 1;
        }
        Session::put('guest_cart', $cart);

        return response()->json([
            'guest_cart' => $cart
        ]);
    } else {
        return response()->json([
            'guest_cart' => $cart
        ], 200); // Or any appropriate error code
    }
}


    public function cart()
    {
        $cart = Session::get('guest_cart');
        $setting = Setting::where('deleted_at', '=', null)->get();
        // dd($cart);
        return view('guest.cart', compact('cart', 'setting'));
    }
    public function getProducts(Request $request)
    {
        $cart = Session::get('guest_cart');
        return response()->json($cart);
    }

    public function deleteProductFromCart(Request $request)
    {
        $cart = Session::get('guest_cart');
        $productId = $request->id;
        unset($cart[$productId]);
        Session::put('guest_cart', $cart);
        return response()->json(
            [
                'guest_cart' => $cart
            ]
        );
    }

    public function checkSession(Request $request)
    {

        if (Session::has('guest_order_details') && count(Session::get('guest_order_details')) > 0) {
            return response()->json(
                [
                    'guest_order_details' => Session::get('guest_order_details')
                ]
            );
        } else {
            return response()->json(
                [
                    'guest_order_details' => []
                ]
            );
        }
    }

    public function placeOrder(OrderDetailsRequest $request)
    {
        if (Session::has('guest_order_details') && count(Session::get('guest_order_details')) > 0) {
            // Session::forget('guest_order_details');
            $order = [];
            $order = $request->all();
            Session::put('guest_order_details', $order);
            return response()->json(
                [
                    'guest_order_details' => $order
                ]
            );
        } else {

            $order = [];
            $order = $request->all();
            Session::put('guest_order_details', $order);
            return response()->json(
                [
                    'guest_order_details' => $order
                ]
            );
        }
    }

    public function checkout()
    {
        $order = Session::get('guest_order_details');
        $cart = Session::get('guest_cart');
        $setting = Setting::where('deleted_at', '=', null)->get();
        $payment_method = PaymentMethod::where('deleted_at', '=', null)->get();
        return view('guest.checkout', compact('order', 'setting', 'cart', 'payment_method'));
    }

    public function confirmOrder(Request $request)
    {
        $onlineUserDetails = Session('user');
        if (Session::get('guest_cart') == null) {
            return response()->json(['status' => 'error', 'message' => 'Please add some items!']);
        }

        $payment_method = PaymentMethod::where('id', '=', $request->payment_method_id)->first();

        $online_ordrs = new OnlineOrder();
        $online_ordrs->name = Session::get('guest_order_details')['name'];
        $online_ordrs->email = Session::get('guest_order_details')['email'];
        $online_ordrs->phone = Session::get('guest_order_details')['phone'];
        $online_ordrs->delivery_charges = $request->delivery_charges;
        $online_ordrs->payment_method_id = $request->payment_method_id;
        $online_ordrs->total = $request->GrandTotal;
        $online_ordrs->payment_status = "unpaid";
        $online_ordrs->order_no = $this->generate_random_code_payment();
        $online_ordrs->order_status = "pending";
        $online_ordrs->save();

        $countOrderData = OnlineOrder::where('sales_id', '=', null)->count();
        event(new OnlineOrderCreated($online_ordrs, $countOrderData));

        $OrderNumber = $online_ordrs->order_no;
        Session::put('OrderNumber', $OrderNumber);

        $order_products = Session::get('guest_cart');
        foreach ($order_products as $order_product) {
            $full_path = $order_product['img_path'];
            $base_url = url('/')."/images/products/";
            $image_path = str_replace($base_url, '', $full_path);

            $OnlineOrderDetails = new OnlineOrderDetails();
            $OnlineOrderDetails->online_order_id = $online_ordrs->id;
            $OnlineOrderDetails->product_id = $order_product['id'];
            $OnlineOrderDetails->name = $order_product['name'];
            $OnlineOrderDetails->quantity = $order_product['quantity'];
            $OnlineOrderDetails->img_path = $image_path;
            $OnlineOrderDetails->payment_method = $payment_method->title;
            $OnlineOrderDetails->payment_method_id = $payment_method->id;
            $OnlineOrderDetails->price = $order_product['price'];
            $OnlineOrderDetails->save();
        }

        Session::forget('guest_cart');
        Session::forget('guest_order_details');
        Session::forget('user');
        return redirect()->route('success.shopping');
    }

    private function broadcastNewOrderEvent($order)
    {
        // Retrieve the newly created order along with its associated new product
        $newlyCreatedOrder = Order::with('newProduct')->find($order->id);
        // Group the orders by order number
        $groupedOrders = Order::with('newProduct')
            ->where('order_no', $newlyCreatedOrder->order_no)
            ->get()
            ->groupBy('order_no')
            ->values()
            ->all();

        // Broadcast the event for the new order
        event(new OrderList($groupedOrders));
    }

    public function generate_random_code_payment()
    {
        $gen_code = 'INV/SL-' . date("Ymd") . '-' . substr(number_format(time() * mt_rand(), 0, '', ''), 0, 6);

        if (PaymentSale::where('Ref', $gen_code)->exists()) {
            $this->generate_random_code_payment();
        } else {
            return $gen_code;
        }
    }

    public function stripeCheckout(Request $request)
    {
        $UserData = [];
        $UserData = [
            'payment_method_id' => $request->payment_method_id,
            'warehouse_id' => $request->warehouse_id,
            'shipping' => $request->shipping,
            'delivery_charges' => $request->delivery_charges,
            'GrandTotal' => $request->GrandTotal,
            'paying_amount' => $request->paying_amount,
        ];

        Session::put('userData', $UserData);

        $total = 0;

        // dd(Session('guest_cart'));
        $products = session('guest_cart');
        foreach ($products as $p) {
            $total += $p['price'] * $p['quantity'];
        }

        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET_KEY'));
        $checkoutSession = $stripe->checkout->sessions->create([
            'success_url' => route('payment.success'),
            'cancel_url' => route('payment.fail'),
            'payment_method_types' => ['card'],
            'mode' => 'payment',
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'USD',
                        'unit_amount' => $total * 100,
                        'product_data' => [
                            'name' => 'Your Product Name',
                            'description' => 'Your Product Description',
                        ],
                    ],
                    'quantity' => 1,
                ],
            ],
            'customer_email' => "hw13604@gmail.com",
        ]);

        Session::put('stripe_checkout_id', $checkoutSession->id);

        return redirect()->away($checkoutSession->url);
    }

    public function stripeSuccess(Request $request)
    {
        $onlineUserDetails = Session('user');
        $userData = Session::get('userData');
        // dd($onlineUserDetails);
        if (Session::get('guest_cart') == null) {
            return response()->json(['status' => 'error', 'message' => 'Please add some items!']);
        }

        $order = new Sale;

        $order->is_pos = 1;
        $order->date = now();
        $order->Ref = 'SO-' . date("Ymd") . '-' . date("his");
        $order->client_id = $onlineUserDetails->id ?? null;
        $order->warehouse_id = $userData['warehouse_id'] ?? null;
        $order->tax_rate = $userData['tax_rate'] ?? 0;
        $order->TaxNet = $userData['TaxNet'] ?? 0;
        $order->discount = $userData['discount'] ?? 0;
        $order->discount_type = $userData['discount_type'] ?? 0;
        $order->discount_percent_total = $userData['discount_percent_total'] ?? 0;
        $order->shipping = $userData['shipping'];
        $order->GrandTotal = $userData['GrandTotal'];
        $order->notes = $userData['notes'] ?? '';
        $order->statut = 'completed';
        $order->payment_statut = 'unpaid';
        $order->user_id = Auth::user()->id ?? null;
        $order->is_onilne = 1;
        $order->save();

        $online_ordrs = new OnlineOrder();
        $online_ordrs->sales_id = $order->id;
        $online_ordrs->name = Session::get('guest_order_details')['name'];
        $online_ordrs->email = Session::get('guest_order_details')['email'];
        $online_ordrs->phone = Session::get('guest_order_details')['phone'];
        $online_ordrs->city = Session::get('guest_order_details')['city'];
        $online_ordrs->country = Session::get('guest_order_details')['country'];
        $online_ordrs->address = Session::get('guest_order_details')['address'];
        $online_ordrs->delivery_charges = $userData['delivery_charges'];
        $online_ordrs->payment_method_id = $userData['payment_method_id'];
        $online_ordrs->total = $userData['GrandTotal'];
        $online_ordrs->payment_status = "unpaid";
        $online_ordrs->order_status = "pending";
        $online_ordrs->order_no = $this->generate_random_code_payment();
        $online_ordrs->save();

        $OrderNumber = $online_ordrs->order_no;
        Session::put('OrderNumber', $OrderNumber);

        $order_products = Session::get('guest_cart');
        foreach ($order_products as $order_product) {
            $OnlineOrderDetails = new OnlineOrderDetails();
            $OnlineOrderDetails->online_order_id = $online_ordrs->id;
            $OnlineOrderDetails->product_id = $order_product['id'];
            $OnlineOrderDetails->quantity = $order_product['quantity'];
            $OnlineOrderDetails->price = $order_product['price'];
            $OnlineOrderDetails->save();
        }

        $data = Session::get('guest_cart');
        foreach ($data as $key => $value) {
            $newProductDetails = NewProductDetail::where('new_product_id', $value['id'])->get();

            $orders = Order::create([
                'new_product_id' => $newProductDetails[0]->new_product_id,
                'user_id' => $onlineUserDetails->id ?? null,
                'order_no' => $order->Ref,
                'quantity' => $value['quantity'],
                'orignal_quantity' => $value['quantity'],
                'is_onilne' => 1,
            ]);
            $order_no = $orders->order_no;
            // Send the email
            $mail =  Mail::to("hw13604@gmail.com")->send(new OrderCreated($order_no));
          $this->broadcastNewOrderEvent($orders);

            foreach ($newProductDetails as $newProductDetail) {
                $unit = Unit::where('id', $newProductDetail->unit_id)->first();
                $productWarehouse = \App\Models\product_warehouse::where('product_id', $newProductDetail->base_product_id)
                    ->where('warehouse_id', $userData['warehouse_id'])
                    ->first();

                if ($unit && $productWarehouse) {
                    $quantityInBaseUnit = $newProductDetail->qty * $value['quantity'];

                    // Check if the conversion is needed
                    if ($unit->name !== 'Units') {
                        // Check if the conversion is supported
                        if ($unit->operator === '/' && $unit->operator_value !== 0) {
                            $quantityInBaseUnit = $quantityInBaseUnit / $unit->operator_value;
                        } elseif ($unit->operator === '*' && $unit->operator_value !== 0) {
                            $quantityInBaseUnit = $quantityInBaseUnit * $unit->operator_value;
                        } else {
                            throw new \Exception('Invalid conversion for unit: ' . $unit->name);
                        }
                    }

                    // Update product warehouse quantity based on the purchase and sale units
                    $productWarehouse->qte -= $quantityInBaseUnit;
                    $productWarehouse->save();

                    $productStockCheck = Product::where('id', $newProductDetail->base_product_id)->first();
                    if ($productStockCheck->stock_alert >= $productWarehouse->qte) {
                        $notification = Notification::create([
                            'messages' => 'Product ( ' . $productStockCheck->name . ' ) is low in stock, please restock.',
                        ]);
                        $user = User::where('id', 1)->first();
                        $data =  NotificationDetail::create([
                            'notification_id' => $notification->id,
                            'user_id' => $user->id,
                            'status' => 0,
                            'read_at' => null,
                            'created_at' => Carbon::now()->tz('Asia/Dubai'),
                            'updated_at' => Carbon::now()->tz('Asia/Dubai'),
                        ]);
                        $notifications = DB::table('notification')
                            ->select('*')
                            ->join('notification_details', 'notification.id', '=', 'notification_details.notification_id')
                            ->where('notification_details.user_id', 1)
                            ->where('notification_details.status', 0)
                            ->orderBy('notification.id', 'desc')
                            ->get();
                        $unreadNotificationsCount = NotificationDetail::where('user_id', 1)->where('status', 0)->count();
                        // event(new NotificationCreate($unreadNotificationsCount, $notifications));
                    }
                }
            }



            foreach ($newProductDetails as $newProductDetail) {
                $product = Product::where('id', $newProductDetail->base_product_id)->first();
                $Price = ($value['price'] * $value['quantity']);
                if ($product->tax_method == 1) {
                    // Tax included in the price
                    $total = $Price;
                } else {
                    // Tax is not included in the price
                    $total = $Price + ($Price * $product->TaxNet / 100);
                }

                $orderDetails[] = [
                    'date' => $order->date,
                    'sale_id' => $order->id,
                    'sale_unit_id' => $product->unit_sale_id ? $product->unit_sale_id : NULL,
                    'quantity' => $value['quantity'],
                    'product_id' => $product->id,
                    // 'product_variant_id' => $value['product_variant_id'] ? $value['product_variant_id'] : NULL,
                    'total' => $total,
                    'price' => $product->price,
                    'TaxNet' => $product->TaxNet,
                    'tax_method' => $product->tax_method,
                    'discount' => 0,
                    // 'discount_method'    => $value['discount_Method'],
                    'imei_number' => '',
                ];
            }
        }

        SaleDetail::insert($orderDetails);

        if ($userData['paying_amount'] > 0) {

            $sale = Sale::findOrFail($order->id);

            $total_paid = $sale->paid_amount + $userData['paying_amount'];
            $due = $sale->GrandTotal - $total_paid;

            if ($due === 0.0 || $due < 0.0) {
                $payment_statut = 'paid';
            } else if ($due != $sale->GrandTotal) {
                $payment_statut = 'partial';
            } else if ($due == $sale->GrandTotal) {
                $payment_statut = 'unpaid';
            }

            // PaymentSale::create([
            //     'sale_id' => $order->id,
            //     'account_id' => $userData['account_id'] ? $userData['account_id'] : NULL,
            //     'Ref' => $this->generate_random_code_payment(),
            //     'date' => $userData['date'],
            //     'payment_method_id' => $userData['payment_method_id'] ? $userData['payment_method_id'] : NULL,
            //     'montant' => $userData['paying_amount'],
            //     'change' => 0,
            //     'notes' => $userData['payment_notes'] ? $userData['payment_notes'] : NULL,
            //     'user_id' => Auth::user()->id ?? NULL,
            // ]);

            // $account = Account::where('id', $userData['account_id'])->exists();

            // if ($account) {
            //     // Account exists, perform the update
            //     $account = Account::find($userData['account_id']);
            //     $account->update([
            //         'initial_balance' => $account->initial_balance + $userData['paying_amount'],
            //     ]);
            // }

            $sale->update([
                'paid_amount' => $total_paid,
                'payment_statut' => $payment_statut,
            ]);
        }

        $cartForSale = Session::get('guest_cart');
        foreach ($cartForSale as $cart) {
            PosSaleItems::create([
                'sale_id' => $order->id,
                'new_product_id' => $cart['id'],
                'qty' => $cart['quantity'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        $notification2 = Notification::create([
            'messages' => 'New Order Created  Order Number: ' . $orders->order_no ,
        ]);
        $user = User::where('id', 1)->first();
        $data2 =  NotificationDetail::create([
            'notification_id' => $notification2->id,
            'user_id' => $user->id,
            'status' => 0,
            'read_at' => null,
            'created_at' => Carbon::now()->tz('Asia/Dubai'),
            'updated_at' => Carbon::now()->tz('Asia/Dubai'),
        ]);
        $notifications2 = DB::table('notification')
            ->select('*')
            ->join('notification_details', 'notification.id', '=', 'notification_details.notification_id')
            ->where('notification_details.user_id', Auth::user()->id ?? NULL)
            ->where('notification_details.status', 0)
            ->orderBy('notification.id', 'desc')
            ->get();
        $unreadNotificationsCount2 = NotificationDetail::where('user_id', Auth::user()->id ?? NULL)->where('status', 0)->count();
        event(new NotificationCreate($unreadNotificationsCount2, $notifications2));


        //Points Work
        // $settings = Setting::where('deleted_at', '=', null)->first();
        // $client_id = $onlineUserDetails->id;

        // if ($request->is_points == 1) {
        //     $userPoints = Point::where('user_id', $client_id)->first();

        //     $pointsValue = $settings->on_purchase_point;
        //     $discountInDarhum = $request->discount;

        //     $points = $discountInDarhum * $pointsValue;

        //     $points = $userPoints->remaining_user_point -= $points;

        //     $update_remaining = Point::where('user_id', $client_id)->update(['remaining_user_point' => $points]);
        // }

        // if ($settings->on_purchase == 1) {
        //     $GrandTotal = $request->GrandTotal;
        //     $on_purchase_point = $settings->on_purchase_point;
        //     $on_purchase_value = $settings->on_purchase_value;
        //     $pointsEarned = floor($GrandTotal / $on_purchase_value) * $on_purchase_point;

        //     // Fetch current remaining points
        //     $point = Point::where('user_id', $client_id)->first();
        //     $user_remaining_point = ($point !== null) ? $point->remaining_user_point : 0;
        //     $user_total_point = ($point !== null) ? $point->total_user_point : 0;

        //     // Add pointsEarned to current remaining points
        //     $user_remaining_point += $pointsEarned;
        //     $user_total_point += $pointsEarned;

        //     Point::where('user_id', $client_id)->update(['remaining_user_point' => $user_remaining_point, 'total_user_point' => $user_total_point]);
        // }

        Session::forget('guest_cart');
        Session::forget('guest_order_details');
        Session::forget('user');

        return redirect()->route('success.shopping');
    }

    public function searchGuestOrder(Request $request)
    {
        $data = OnlineOrderDetails::with('orders', 'orders.paymentMethod', 'products')
    ->whereHas('orders', function ($query) use ($request) {
        $query->where('order_no', $request['query']);
    })
    ->first();

        // $data = OnlineOrder::where('order_no',$request['query'])->with('OnlineOrderDetails.Products')->first();

        if($data){
            return response()->json($data);
        }
        return response()->json(['success' => false, 'data' =>'No Data Found related to this order no']);
    }

    public  function onlineLinks(){
        return view('onlineLinks.index');
    }
    public function QrCode(){
        $url = url('/online/links');
        $qrCodes = [];
        $qrCodes['simple'] =
        QrCode::size(150)->generate($url);
        // $qrCodes['changeColor'] =
        // QrCode::size(150)->color(255, 0, 0)->generate('');
        // $qrCodes['changeBgColor'] =
        // QrCode::size(150)->backgroundColor(255, 0, 0)->generate('');
        // $qrCodes['styleDot'] =
        // QrCode::size(150)->style('dot')->generate('');
        // $qrCodes['styleSquare'] = QrCode::size(150)->style('square')->generate('');
        // $qrCodes['styleRound'] = QrCode::size(150)->style('round')->generate('');
        return view('onlineLinks.QRCode',$qrCodes);
    }
    public function checkCart(){
        $data = Session::get('guest_cart');
        return response()->json(["data" => $data]);
    }
     public function successShopping(){
        if(Session::has('OrderNumber')){

            $setting = Setting::with('currency')->get();
            $OrderNumber = Session::get('OrderNumber');
            return view('guest.thankyou')->with(compact('OrderNumber','setting'));
        }else{
            return redirect()->route('guest.index');
        }

    }

}
