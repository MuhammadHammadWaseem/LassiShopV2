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

    public function get_points()
    {
        // Fetch all points with related clients and user data
        $points = Point::with('Clients.user')->get();
        // Format the response to include only the required fields
        $formattedPoints = $points->map(function ($point) {
            return [
                'id' => $point->id,
                'name' => $point->clients->username ?? null,  // Client's username
                'loyaltyPoints' => $point->total_user_point,
                'remaining_user_point' => $point->remaining_user_point,
                'user_name' => $point->clients->user->username ?? null,  // User model's username
            ];
        });

        // Return the formatted data as JSON
        return response()->json($formattedPoints);
    }


}
