<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Override redirectPath to handle dynamic redirects based on role_id.
     *
     * @return string
     */
    protected function redirectPath()
    {
        $roleId = auth()->user()->role_id;

        if ($roleId == 1) {
            return '/customer/profile/show'; // Customer's profile page
        } elseif ($roleId == 2) {
            return '/hotel/profile/show'; // Hotel admin's profile page
        }

        // Default redirect path
        // return '/home';
    }

    /**
     * Handle logout and redirect to a custom page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        // Log the user out of the application
        $this->guard()->logout();

        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate the CSRF token
        $request->session()->regenerateToken();

        // Redirect to /top/list after logout
        return redirect('/customer/top/list');
    }
}

