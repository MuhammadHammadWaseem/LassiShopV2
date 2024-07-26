<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LocationController extends Controller
{
    public function index()
    {
        return view('location');
    }
    public function search(Request $request)
    {
        $setting_data = Setting::where('deleted_at', '=', null)->first();
        $Setting_km = $setting_data->km;

        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');

        $locations = DB::table('location')
        ->select('latitude', 'longitude')
        ->selectRaw(
                '(6371 * acos(cos(radians(?)) * cos(radians(latitude)) * cos(radians(longitude) - radians(?)) + sin(radians(?)) * sin(radians(latitude)))) AS distance',
                [$latitude, $longitude, $latitude]
            )
            ->having('distance', '<', $Setting_km) // Set Radius radius
            ->orderBy('distance')
            ->get();
        return response()->json([
            'data' => $locations]);
    }
}
