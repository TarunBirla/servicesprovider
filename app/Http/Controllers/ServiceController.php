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
        $services = Service::with(['category', 'state', 'district', 'assembly', 'city'])
                        ->where('user_id', auth()->id())
                        ->orderBy('created_at', 'desc')
                        ->paginate(10);
        if ($services->isEmpty()) {
            return redirect()->route('services.create')->with('info', 'No services found. Please create a service.');
        }
        if (auth()->user()->role !== 'associate') {
            return redirect()->route('dashboard')->with('error', 'You do not have permission to view this page.');
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

    $user_id = auth()->id();

    foreach ($request->associate_trade_name as $index => $tradeName) {
        Service::create([
            'user_id' => $user_id,
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

    return redirect()->route('services.index')->with('success', 'Services submitted successfully!');
}

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'title' => 'required',
    //         'category_id' => 'required|exists:categories,id',
    //         'price' => 'required|numeric',
    //         'description' => 'nullable',
    //         'image' => 'nullable|image',
    //         'state_id' => 'nullable|exists:states,id',
    //         'district_id' => 'nullable|exists:districts,id',
    //         'assembly_id' => 'nullable|exists:assemblies,id',
    //         'city_id' => 'nullable|exists:cities,id',
    //     ]);

    //     $data = $request->all();
    //     $data['user_id'] = auth()->id();

    //     if ($request->hasFile('image')) {
    //         $data['image'] = $request->file('image')->store('services', 'public');
    //     }

    //     Service::create($data);

    //     return redirect()->route('services.index')->with('success', 'Service created successfully.');
    // }
}
