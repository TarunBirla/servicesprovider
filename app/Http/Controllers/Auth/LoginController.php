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
     */
    protected function redirectTo()
    {
        if (auth()->user()->role === 'admin') {
            return '/admin/dashboard';
        } elseif (auth()->user()->role === 'associate') {
            return '/associate/dashboard';
        } else {
            return '/';
        }
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
