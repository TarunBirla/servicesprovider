<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class LoginController extends Controller
{
   
    protected $redirectTo = '/home';


    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]); 

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if( Auth::user()->role == 'associate') {
                // Redirect to associate dashboard
                return redirect()->route('associate.dashboard')->with('success', 'Login successful!');
            } elseif (Auth::user()->role == 'admin') {
                // Redirect to admin dashboard
                return redirect()->route('admin.dashboard')->with('success', 'Login successful!');
            } 
        }  

        return redirect()->back()
            ->withInput($request->only('email'))
            ->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/')->with('success', 'You have been logged out successfully.');
    }
    public function showForgotPasswordForm()
    {
        return view('auth.passwords.email');
    }
    
    public function sendResetLinkEmail(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
        ]);

        // Logic to send reset link email
        // This is typically handled by Laravel's built-in password reset functionality

        return back()->with('status', 'We have emailed your password reset link!');
    }

}
