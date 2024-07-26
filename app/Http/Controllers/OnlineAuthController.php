<?php

namespace App\Http\Controllers;

use App\Models\OnlineUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\OnlineUsersRegister;

class OnlineAuthController extends Controller
{
    public function register()
    {
        return view('auth.onlineUsers.register');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'city' => 'required|max:255',
            'country' => 'required|max:255',
            'address' => 'required',
            'password' => 'required|confirmed|min:6',
            'phone' => 'required|numeric',
        ]);


        $user = OnlineUsers::create([
            'name' => $request->name,
            'email' => $request->email,
            'city' => $request->city,
            'country' => $request->country,
            'address' => $request->address,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
        ]);

        return redirect()->route('login.form');
    }

    public function showLoginForm()
    {
        return view('auth.onlineUsers.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
    
        if (OnlineUsers::where('email', $request->email)->exists() && 
            Hash::check($request->password, OnlineUsers::where('email', $request->email)->first()->password)) {
            
            $user = OnlineUsers::where('email', $request->email)->first();
            
            // Store user data in session
            $request->session()->put('user', $user);
    
            // Regenerate session ID to prevent session fixation attacks
            $request->session()->regenerate();
    
            return redirect()->route('guest.index');
        } else {
            return back()->withErrors([
                'invalid_credentials' => 'The provided credentials do not match our records.',
            ]);
        }
    }
    
}
