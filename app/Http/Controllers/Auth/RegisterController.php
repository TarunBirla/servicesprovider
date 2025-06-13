<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Plan;
use App\Models\Associate;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    public function showAssociateForm()
    {
        $plans = Plan::all();
        return view('auth.register_associate', compact('plans'));
    }

    public function registerAssociate(Request $request)
{
    $count = count($request->associate_name);

    for ($i = 0; $i < $count; $i++) {
        $associate = new Associate();
        $associate->name = $request->associate_name[$i];
        $associate->mobile = $request->associate_mobile[$i];
        $associate->email = $request->associate_email[$i];
        $associate->address = $request->associate_address[$i];
        $associate->pincode = $request->associate_pincode[$i];
        $associate->state = $request->state[$i];
        $associate->district_name = $request->district_name[$i];
        $associate->assembly_name = $request->assembly_name[$i];
        $associate->part_name = $request->part_name[$i];

        if ($request->hasFile("aadhar_front.$i")) {
            $associate->aadhar_front = $request->file("aadhar_front.$i")->store('aadhar_fronts', 'public');
        }

        if ($request->hasFile("aadhar_back.$i")) {
            $associate->aadhar_back = $request->file("aadhar_back.$i")->store('aadhar_backs', 'public');
        }

        $associate->save();
    }

    return redirect()->route('services.create')->with('success', 'Associates registered successfully.');
}

    /**
     * Handle the registration of a new associate.
     */
    // public function registerAssociate(Request $request)
    // {
    //     $request->validate([
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'password' => ['required', 'confirmed', 'min:8'],
    //         'plan_id' => ['required', 'exists:plans,id'],
    //     ]);

    //     $user = User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //         'role' => 'associate',
    //         'plan_id' => $request->plan_id,
    //     ]);

    //     Auth::login($user);

    //     return redirect()->route('dashboard')->with('success', 'Registration successful!');
    // }

    
}