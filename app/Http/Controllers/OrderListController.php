<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Setting;
use App\Events\OrderList;
use Illuminate\Http\Request;
use App\Events\OrderListEvent;
use App\Models\OnlineOrder;
use App\Models\OnlineOrderDetails;
use Illuminate\Support\Facades\Session;

class OrderListController extends Controller
{
    //-------------- Get Order ---------------\\
    public function OrderList()
    {
        // $orders = Order::with('newProduct')->get();
        $orders = Order::with('newProduct')->get()->groupBy('order_no')->values()->all();
        return response()->json(['orders' => $orders]);
    }

    public function OrderListShow()
    {

        $orders = Order::with('newProduct')->get();
        // event(new OrderList($orders));
        $settings = Setting::where('deleted_at', '=', null)->first();
        return view('sales.OrderList', [
            'settings' => $settings,
            'orders' => $orders,
        ]);
    }

    public function Order(){
      return view('orders.index');
    }

    public function OrderOnline()
    {
        $online_orders = OnlineOrderDetails::with('Orders','Products')->groupBy('online_order_details.online_order_id')->get();
        return response()->json(['online_orders'=>$online_orders]);
    }
    public function completedOrder($orderId,$productId)
    {
        $OrderList = Order::where('new_product_id' , $productId)->where('id' , $orderId)->first();
        // dd($OrderList);
        if($OrderList->quantity > 0)
        {
            $OrderList->quantity -= 1;
            $OrderList->save();
            $orders = Order::with('newProduct')->get()->groupBy('order_no')->values()->all();
            return response()->json(['orders' => $orders]);
        }
        else{
            $OrderList->delete();
            $orders = Order::with('newProduct')->get()->groupBy('order_no')->values()->all();
            return response()->json(['orders' => $orders]);
        }
        return response()->json(['error' => 'Order not found']);
    }

    public function completedFullOrder($orderId)
    {
        $OrderList = Order::where('order_no' , $orderId)->get();
        // dd($OrderList);
        foreach($OrderList as $order)
        {
            $order->delete();
        }
        $orders = Order::with('newProduct')->get()->groupBy('order_no')->values()->all();
        return response()->json(['orders' => $orders]);
    }
    public function undoOrder($orderId,$productId)
    {
        $OrderList = Order::where('new_product_id' , $productId)->where('id' , $orderId)->first();
        // dd($OrderList);

        if($OrderList->quantity < $OrderList->orignal_quantity)
        {
            $OrderList->quantity += 1;
            $OrderList->save();
            $orders = Order::with('newProduct')->get()->groupBy('order_no')->values()->all();
            return response()->json(['orders' => $orders]);
        }
        else{
            // $OrderList->delete();
            $orders = Order::with('newProduct')->get()->groupBy('order_no')->values()->all();
            return response()->json(['orders' => $orders]);
        }
        return response()->json(['error' => 'Order not found']);
    }

    public function OrderShowView($id)
    {
        $orders = OnlineOrderDetails::with('Orders','Orders.paymentMethod','Products')->where('online_order_details.online_order_id', $id)->get();
        return response()->json(['orders' => $orders]);
    }

    public function OrderStatusUpdate(Request $request, $id)
    {
        if($request->status == "Confirm"){
            $status = 0;
        }elseif($request->status == "On the Way"){
            $status = 1;
        }elseif($request->status == "delivered"){
            $status = 2;
        }

        OnlineOrder::where('id', $id)->update([
            'order_status' => $status,
        ]);
        return response()->json(['success' => 'Order status updated successfully.']);
    }

}
