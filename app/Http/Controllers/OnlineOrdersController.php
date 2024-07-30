<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OnlineOrder;
use App\Models\OnlineOrderDetails;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class OnlineOrdersController extends Controller
{
    public function index()
    {
        $order = OnlineOrder::where('sales_id', null)->orderBy('id', 'DESC')->get();
        return response()->json($order);
    }
    public function edit(Request $request)
    {
        Session::forget('cart');
        $onlineOrder = OnlineOrder::find($request->id);
        $onlineOrderDetails = OnlineOrderDetails::where('online_order_id', $request->id)->get();
        return response()->json([
            'message' => 'success',
            'data' => compact('onlineOrder', 'onlineOrderDetails'),
        ]);
    }
}
