<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class LoginController extends Controller
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
        $this->middleware('auth')->only('logout');
    }

    // to ability to  login in email , username ,phone
    protected function credentials(Request $request)
{
    $password = $request->input('password');
    $login = $request->input('email'); 
    
    if (is_numeric($login)) {
        return [
            'phone' => $login,
            'password' => $password,
        ];
    } elseif (filter_var($login, FILTER_VALIDATE_EMAIL)) {
        return [
            'email' => $login,
            'password' => $password,
        ];
    } else {
        return [
            'username' => $login,
            'password' => $password,
        ];
    }
}

    

}
