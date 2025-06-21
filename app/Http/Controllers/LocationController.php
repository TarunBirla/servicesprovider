<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Assembly;
use App\Models\City;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LocationController extends Controller
{

    public function index()
    {
        $states = Location::select('ST_UT_CODE as id', 'ST_UT_NAME as name')
                    ->distinct()
                    ->orderBy('name')
                    ->get();

        return view('yourviewname', compact('states'));
    }

   public function getDistricts($stateCode)
    {
        $districts = DB::table('districts')->where('district_code', 'LIKE', $stateCode . '%')
                    ->select('district_code as id', 'name')
                    ->groupBy('district_code', 'name')
                    ->orderBy('name')
                    ->get();

        return response()->json($districts);
    }
    


    public function getAssemblies($districtCode)
    {
        $assemblies = DB::table('assemblies')->where('district_id', $districtCode)
                        ->select('assembly_code as id', 'name as name')
                        ->groupBy('assembly_code', 'name')
                        ->orderBy('name')
                        ->get();

        return response()->json($assemblies);
    }

    public function getParts($assemblyCode)
    {
        $parts = Location::where('ASSEMBLY_CODE', $assemblyCode)
            ->select('PART_CODE as id', 'PART_NAME as name')
            ->groupBy('PART_CODE', 'PART_NAME')
            ->orderBy('PART_NAME')
            ->get();

        return response()->json($parts);
    }

    public function getIndustries($sector_code)
    {
        $industries = DB::table('service_list')
            ->where('sector_code','LIKE', $sector_code . '%')
            ->select('industry_code', 'industry_name')
            ->distinct()
            ->get();

        return response()->json(['industries' => $industries]);
    }

    public function getSubIndustries($industry_code)
    {
        $subindustries = DB::table('service_list')
            ->where('industry_code','LIKE', $industry_code . '%')
            ->select('subindustry_code', 'subindustry_name')
            ->distinct()
            ->get();

        return response()->json(['subindustries' => $subindustries]);
    }


    // public function index()
    // {
    //     return view('locations.index');
    // }
    

    // public function getDistricts($state_id)
    // {
    //     $districts = District::where('state_id', $state_id)->get();
    //     return response()->json($districts);
    // }

    // public function getAssemblies($district_id)
    // {
    //     $assemblies = Assembly::where('district_id', $district_id)->get();
    //     return response()->json($assemblies);
    // }

    // public function getCities($assembly_id)
    // {
    //     return response()->json(City::where('assembly_id', $assembly_id)->get());
    // }
}