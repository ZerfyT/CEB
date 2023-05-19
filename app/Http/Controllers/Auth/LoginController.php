<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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
    }

    protected function authenticated(Request $request, $user)
    {
        $redirect = '/'; // Default redirect URL

        // Check the user's role and set the redirect URL accordingly
        if ($user->hasRole('admin')) {
            $redirect = '/admin.dashboard';
        } elseif ($user->hasRole('cashier')) {
            $redirect = '/cashier/home';
        } elseif ($user->hasRole('meter-reader')) {
            $redirect = '/mreader/home';
        }

        // Add additional role-based or custom logic here if needed

        return Redirect::to($redirect);
    }
}
