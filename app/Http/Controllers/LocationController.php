<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Assembly;
use App\Models\City;
use Illuminate\Http\Request;

class LocationController extends Controller
{

    public function index()
    {
        return view('locations.index');
    }
    

    public function getDistricts($state_id)
    {
        $districts = District::where('state_id', $state_id)->get();
        return response()->json($districts);
    }

    public function getAssemblies($district_id)
    {
        $assemblies = Assembly::where('district_id', $district_id)->get();
        return response()->json($assemblies);
    }

    public function getCities($assembly_id)
    {
        return response()->json(City::where('assembly_id', $assembly_id)->get());
    }
}
