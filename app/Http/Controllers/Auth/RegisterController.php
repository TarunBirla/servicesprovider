<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Plan;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    public function showAssociateForm()
    {
        $plans = Plan::all();
        return view('auth.register_associate', compact('plans'));
    }

    /**
     * Handle the registration of a new associate.
     */
    public function registerAssociate(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:8'],
            'plan_id' => ['required', 'exists:plans,id'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'associate',
            'plan_id' => $request->plan_id,
        ]);

        Auth::login($user);

        return redirect()->route('dashboard')->with('success', 'Registration successful!');
    }
}