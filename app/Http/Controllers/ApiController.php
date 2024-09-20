<?php

namespace App\Http\Controllers;

use App\Models\Point;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BaseController;

class ApiController extends BaseController
{

    public function get_client(Request $request)
    {
        $clients = Client::all();
        return response()->json($clients, 200);
    }

    public function get_points(Request $request)
    {
        $points = Point::with('Clients')->where('user_id', $request->id)->get();
        if ($points == null) {
            $points = [];
        }
        return response()->json($points);
    }
}
