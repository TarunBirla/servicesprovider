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
        return response()->json(District::where('state_id', $state_id)->get());
    }

    public function getAssemblies($district_id)
    {
        return response()->json(Assembly::where('district_id', $district_id)->get());
    }

    public function getCities($assembly_id)
    {
        return response()->json(City::where('assembly_id', $assembly_id)->get());
    }
}
