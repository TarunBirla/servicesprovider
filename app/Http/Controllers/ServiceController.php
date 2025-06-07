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
            ->get();

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
        $request->validate([
            'title' => 'required',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric',
            'description' => 'nullable',
            'image' => 'nullable|image',
            'state_id' => 'nullable|exists:states,id',
            'district_id' => 'nullable|exists:districts,id',
            'assembly_id' => 'nullable|exists:assemblies,id',
            'city_id' => 'nullable|exists:cities,id',
        ]);

        $data = $request->all();
        $data['user_id'] = auth()->id();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('services', 'public');
        }

        Service::create($data);

        return redirect()->route('services.index')->with('success', 'Service created successfully.');
    }
}
