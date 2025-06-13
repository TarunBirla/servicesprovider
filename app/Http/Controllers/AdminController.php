<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function users()
    {
        $users = \App\Models\User::all();
        return view('admin.users.index', compact('users'));
    }
    public function associates()
    {
        $associates = \App\Models\User::where('role', 'associate')->get();
        return view('admin.associates.index', compact('associates'));
    }

    public function showAssociateForm()
    {
        $plans = \App\Models\Plan::all();
        return view('auth.register_associate', compact('plans'));
    }
    public function registerAssociate(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:8'],
            'plan_id' => ['required', 'exists:plans,id'],
        ]);

        $user = \App\Models\User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'associate',
            'plan_id' => $request->plan_id,
        ]);

        return redirect()->route('admin.associates')->with('success', 'Associate registered successfully.');
    }
    public function showForgotPasswordForm()
    {
        return view('auth.passwords.email');
    }
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        // Logic to send reset link email
        // This is a placeholder, actual implementation will depend on your mail setup

        return back()->with('status', 'Password reset link sent to your email.');
    }
    public function logout(Request $request)
    {
        auth()->logout();
        return redirect('/')->with('success', 'You have been logged out successfully.');
    }

    public function editAssociate($id)
    {
        $associate = \App\Models\User::findOrFail($id);
        $plans = \App\Models\Plan::all();
        return view('admin.associates.edit', compact('associate', 'plans'));
    }
    public function updateAssociate(Request $request, $id)
    {
        $associate = \App\Models\User::findOrFail($id);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $associate->id],
            'plan_id' => ['required', 'exists:plans,id'],
        ]);

        $associate->update([
            'name' => $request->name,
            'email' => $request->email,
            'plan_id' => $request->plan_id,
        ]);

        return redirect()->route('admin.associates')->with('success', 'Associate updated successfully.');
    }   
    public function destroyAssociate($id)
    {
        $associate = \App\Models\User::findOrFail($id);
        $associate->delete();
        return redirect()->route('admin.associates')->with('success', 'Associate deleted successfully.');
    }

    public function plans()
    {
        $plans = \App\Models\Plan::all();
        return view('admin.plans.index', compact('plans'));
    }
    public function createPlan()
    {
        return view('admin.plans.create');
    }
    public function storePlan(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric'],
            'duration' => ['required', 'integer'],
            'features' => ['required', 'array'],
        ]);

        \App\Models\Plan::create($request->all());

        return redirect()->route('admin.plans')->with('success', 'Plan created successfully.');
    }
    public function editPlan($id)
    {
        $plan = \App\Models\Plan::findOrFail($id);
        return view('admin.plans.edit', compact('plan'));
    }           

    public function updatePlan(Request $request, $id)
    {
        $plan = \App\Models\Plan::findOrFail($id);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric'],
            'duration' => ['required', 'integer'],
            'features' => ['required', 'array'],
        ]);

        $plan->update($request->all());

        return redirect()->route('admin.plans')->with('success', 'Plan updated successfully.');
    }
    public function destroyPlan($id)
    {
        $plan = \App\Models\Plan::findOrFail($id);
        $plan->delete();
        return redirect()->route('admin.plans')->with('success', 'Plan deleted successfully.');
    }
    public function locations()
    {
        $locations = \App\Models\Location::all();
        return view('admin.locations.index', compact('locations'));
    }
    public function createLocation()
    {
        return view('admin.locations.create');
    }
    public function storeLocation(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'in:state,district,assembly,city'],
        ]);

        \App\Models\Location::create($request->all());

        return redirect()->route('admin.locations')->with('success', 'Location created successfully.');
    }
    public function editLocation($id)
    {
        $location = \App\Models\Location::findOrFail($id);
        return view('admin.locations.edit', compact('location'));
    }
    public function updateLocation(Request $request, $id)
    {
        $location = \App\Models\Location::findOrFail($id);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'in:state,district,assembly,city'],
        ]);

        $location->update($request->all());

        return redirect()->route('admin.locations')->with('success', 'Location updated successfully.');
    }
    public function destroyLocation($id)
    {
        $location = \App\Models\Location::findOrFail($id);
        $location->delete();
        return redirect()->route('admin.locations')->with('success', 'Location deleted successfully.');
    }
    public function terms()
    {
        return view('terms');
    }
    public function privacy()
    {
        return view('privacy');
    }
}