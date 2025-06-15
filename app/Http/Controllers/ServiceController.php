<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\State;
use App\Models\Category;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        
        $services = Service::where('user_id', auth()->id())
                        ->orderBy('created_at', 'desc')
                        ->paginate(10);
        
        if ($services->isEmpty()) {
            return view('associate.services.index', ['services' => $services])
                ->with('message', 'No services found. Please create a service.');
        }

        return view('associate.services.index', compact('services'));
    }

    public function create()
    {
        $states = State::all();
        $categories = Category::all();
        return view('associate.services.create', compact('states', 'categories'));
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'associate_trade_name.*' => 'required|string|max:255',
                'type_0' => 'required|string', // For first form
                'revenue_type.*' => 'required|string',
                'sector_name.*' => 'required|string',
                'industry_name.*' => 'required|string',
                'sub_industry_name.*' => 'required|string',
                'experience_year.*' => 'nullable|string',
                'associate_trade_address.*' => 'required|string',
                'associate_trade_pincode.*' => 'required|string',
                'associate_trade_st_ut_name.*' => 'required|string',
                'associate_trade_district_name.*' => 'required|string',
                'associate_trade_assembly_name.*' => 'required|string',
                'associate_trade_part_name.*' => 'required|string',
            ]);

            $associate_id = session()->get('associate_id');
            $user_id = session()->get('user_id');

            if (!$user_id) {
                return redirect()->route('login')->with('error', 'User not authenticated. Please log in.');
            }
   

        foreach ($request->associate_trade_name as $index => $tradeName) {
            Service::create([
                'user_id' => $user_id,
                'associate_id' => $associate_id,
                'title' => $tradeName,
                'type' => $request->input("type_$index"),
                'revenue_type' => $request->revenue_type[$index],
                'sector_name' => $request->sector_name[$index],
                'industry_name' => $request->industry_name[$index],
                'sub_industry_name' => $request->sub_industry_name[$index],
                'experience_year' => $request->experience_year[$index] ?? null,
                'address' => $request->associate_trade_address[$index],
                'pincode' => $request->associate_trade_pincode[$index],
                'state' => $request->associate_trade_st_ut_name[$index],
                'district_name' => $request->associate_trade_district_name[$index],
                'assembly_name' => $request->associate_trade_assembly_name[$index],
                'part_name' => $request->associate_trade_part_name[$index],
            ]);
        }

        session()->forget('associate_id');
        session()->forget('user_id'); // Clear the session after storing

        return redirect()->route('login')->with('success', 'Services submitted successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['error' => 'An error occurred while submitting the service. Please try again.']);
        }
        
    }

}
