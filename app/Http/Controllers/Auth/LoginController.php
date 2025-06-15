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


    public function user_login(){
        if(!empty(Auth::user())){
            return redirect()->route('home');
        }else{
            return view('user.login');
        }
    }
    public function home(){
        return view('user.index');
    }
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]); 

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if( Auth::user()->role == 'associate') {
                return redirect()->route('associate.dashboard')->with('success', 'Login successful!');
            } elseif (Auth::user()->role == 'admin') {
                
                return redirect()->route('admin.dashboard')->with('success', 'Login successful!');
            }else{
                return redirect()->route('home')->with('success', 'Login successful!');
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
        return back()->with('status', 'We have emailed your password reset link!');
    }

}
