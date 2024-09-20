<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Sale;
use App\Models\Unit;
use App\Models\Order;
use App\Models\Point;
use App\Models\Client;
use App\Models\Account;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Warehouse;
use App\Models\SaleDetail;
use App\Models\OnlineOrder;
use App\Models\PaymentSale;
use App\Models\Notification;
use App\Models\PosSaleItems;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\NewProductDetail;
use App\Models\NotificationDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Validator;

class ApiController extends BaseController
{

    public function get_client(Request $request)
    {
        $clients = Client::all();
        return response()->json($clients, 200);
    }

    public function get_points()
    {
        // Fetch all points with related clients and user data
        $points = Point::with('Clients.user')->get();
        // Format the response to include only the required fields
        $formattedPoints = $points->map(function ($point) {
            return [
                'id' => $point->Clients->id,
                'name' => $point->clients->username ?? null,  // Client's username
                'loyaltyPoints' => $point->total_user_point,
                'remaining_user_point' => $point->remaining_user_point,
                'user_name' => $point->clients->user->username ?? null,  // User model's username
            ];
        });

        // Return the formatted data as JSON
        return response()->json($formattedPoints);
    }

    public function create_pos(Request $request)
{
    try {
        // Validate the input
        $validator = Validator::make($request->all(), [
            'client_id' => 'required',
            'warehouse_id' => 'required',
            'payment_method_id' => 'required',
            'cart' => 'required|array',
            'cart.*.id' => 'required|integer', // Ensure each cart item has a valid product ID
            'cart.*.name' => 'required|string',
            'cart.*.quantity' => 'required|integer',
            'cart.*.price' => 'required|numeric',
        ]);

        // If validation fails, return the first error
        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()->first()], 422);
        }

        // Retrieve the cart data
        $cartData = $request->input('cart');
        // Check if cart data is empty
        if (empty($cartData)) {
            return response()->json(['status' => 'error', 'message' => 'Please add some items!'], 400);
        }

        // Transaction to handle POS creation and inventory update
        $item = \DB::transaction(function () use ($request, $cartData) {
            // Token generation
            $tokenCounter = DB::table('token_counters')->lockForUpdate()->first();
            $tokenNo = $tokenCounter->current_token_no + 1;
            DB::table('token_counters')->update(['current_token_no' => $tokenNo]);

            // Create Sale Order
            $order = new Sale([
                'is_pos' => 1,
                'date' => Carbon::now(),
                'Ref' => 'SO-' . now()->format('Ymd-His'),
                'token_no' => $tokenNo,
                'client_id' => $request->client_id ?? null,
                'vat' => $request->vat,
                'warehouse_id' => $request->warehouse_id,
                'tax_rate' => $request->tax_rate,
                'TaxNet' => $request->TaxNet,
                'discount' => $request->discount,
                'discount_type' => $request->discount_type ?? 0,
                'discount_percent_total' => $request->discount_percent_total,
                'shipping' => $request->shipping,
                'GrandTotal' => $request->GrandTotal ?? 0,
                'notes' => $request->notes,
                'statut' => 'completed',
                'payment_statut' => 'unpaid',
                'user_id' => Auth::id(),
                'is_onilne' => 0,
            ]);
            $order->save();

            // Save Order Details
            $orderDetails = [];
            foreach ($cartData as $key => $value) {
                $newProductDetails = NewProductDetail::where('new_product_id', $value['id'])->get();

                foreach ($newProductDetails as $newProductDetail) {
                    $product = Product::findOrFail($newProductDetail->base_product_id);
                    $price = $value['price'] * $value['quantity'];
                    $total = $product->tax_method == 1 ? $price : $price + ($price * $product->TaxNet / 100);

                    $orderDetails[] = [
                        'date' => $order->date,
                        'sale_id' => $order->id,
                        'sale_unit_id' => $product->unit_sale_id,
                        'quantity' => $value['quantity'],
                        'product_id' => $product->id,
                        'total' => $total,
                        'price' => $product->price,
                        'TaxNet' => $product->TaxNet,
                        'tax_method' => $product->tax_method,
                        'discount' => 0,
                        'imei_number' => '',
                    ];

                    // Adjust product warehouse quantity
                    $productWarehouse = product_warehouse::where('product_id', $newProductDetail->base_product_id)
                        ->where('warehouse_id', $request->warehouse_id)
                        ->lockForUpdate()
                        ->first();

                    if ($productWarehouse) {
                        $productWarehouse->qte -= $value['quantity'];
                        $productWarehouse->save();
                    }
                }
            }

            // Insert sale details in bulk
            SaleDetail::insert($orderDetails);

            // Handle payment if applicable
            if ($request->paying_amount > 0) {
                $total_paid = $order->paid_amount + $request->paying_amount;
                $due = $order->GrandTotal - $total_paid;
                $payment_statut = ($due <= 0) ? 'paid' : ($due < $order->GrandTotal ? 'partial' : 'unpaid');

                PaymentSale::create([
                    'sale_id' => $order->id,
                    'account_id' => $request->account_id,
                    'Ref' => $this->generate_random_code_payment(),
                    'date' => $request->date,
                    'payment_method_id' => $request->payment_method_id,
                    'montant' => $request->paying_amount,
                    'notes' => $request->payment_notes,
                    'user_id' => Auth::id(),
                ]);

                $order->update(['paid_amount' => $total_paid, 'payment_statut' => $payment_statut]);
            }

            return $order->id;
        });

        // Return success response
        return response()->json(['status' => 'success', 'message' => 'POS created successfully', 'order_id' => $item], 201);

    } catch (\Exception $e) {
        // Handle any errors and return a generic error response
        return response()->json(['status' => 'error', 'message' => 'An error occurred: ' . $e->getMessage()], 500);
    }
}

    public function default_warehouse(){
        $defaultWarehouse = Setting::where('warehouse_id', '!=', null)->with('warehouse')->first();
        return response()->json( [ 'warehouse' => $defaultWarehouse->warehouse]);
    }

    public function settings(){
        $settings = Setting::where('deleted_at', '=', null)->first();
        return response()->json( [ 'settings' => $settings]);
    }
}
