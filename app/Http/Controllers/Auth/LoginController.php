<?php

namespace App\Http\Controllers\Auth;


use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\BaseController as BaseController;

class LoginController extends BaseController
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function loginApi(Request $request)  {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = auth()->user();
            $roleName = Role::where('id', '=', $user->role_users_id)->first();
            $success['token'] =  $user->createToken('MyApp')->plainTextToken;
            $success['username'] =  $user->username;
            $success['role'] =  $roleName->name;
            $success['is_employee'] =  $user->is_employee;
            return $this->sendResponse($success, 'User login successfully.');
        }
        else{
            return $this->sendError('Unauthorised.', ['error'=>'Password or Email is invalid.'], 401);
        }
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'status'   => 1
        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            $user_Auth = Auth::User();
            return redirect('/dashboard/admin');
        }
    }
}
