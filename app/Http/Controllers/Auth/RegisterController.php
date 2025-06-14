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
        try{

            $request->validate([
                'associate_name.*' => 'required|string|max:255',
                'associate_mobile.*' => 'required|string|max:15',
                'associate_email.*' => 'required|email|max:255',
                'associate_password.*' => 'required|string',
                'associate_address.*' => 'required|string|max:255',
                'associate_pincode.*' => 'required|string|max:10',
                'state.*' => 'required|string|max:100',
                'district_name.*' => 'required|string|max:100',
                'assembly_name.*' => 'required|string|max:100',
                'part_name.*' => 'required|string|max:100',
                'aadhar_front.*' => 'required|file',
                'aadhar_back.*' => 'required|file',
            ]);

            $count = count($request->associate_name);

            for ($i = 0; $i < $count; $i++) {
                $associate = new Associate();
                $associate->name = $request->associate_name[$i];
                $associate->mobile = $request->associate_mobile[$i];
                $associate->password = Hash::make($request->associate_password[$i]);
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

                $user = new User();
                $user->name = $associate->name;
                $user->email = $associate->email;
                $user->password = Hash::make($request->associate_password[$i]);
                $user->role = 'associate';
                $user->status = 'pending'; // Associate the user with the newly created associate
                $user->save();

                session()->put('associate_id', $associate->id);
                session()->put('user_id', $user->id);
            }
            
            return redirect()->route('services.create')->with('success', 'Associates registered successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to register associates: ' . $e->getMessage());
        }
         
    }
   
}