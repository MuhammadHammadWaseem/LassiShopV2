<?php

namespace App\Http\Controllers;

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
}
