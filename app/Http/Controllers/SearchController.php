<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Location;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

Class SearchController extends Controller
{
    // public function index(Request $request)
    // {
    //     $query = Service::query();

    //     if ($request->filled('state_id')) {
    //         $query->where('state', $request->state_id);
    //     }

    //     if ($request->filled('district_id')) {
    //         $query->where('district_name', $request->district_id);
    //     }

    //     if ($request->filled('assembly_id')) {
    //         $query->where('assembly_name', $request->assembly_id);
    //     }

    //     // if ($request->filled('category')) {
    //     //     $query->where('category', $request->category);
    //     // }

    //     $services = $query->get();

    //     return view('user.search', compact('services'));
    // }

    // public function index(Request $request)
    // {
    //     // dd($request->all());
    //     $query = Service::with('associate'); // Eager load associate

    //     if ($request->filled('state_id')) {
    //         $query->where('state', $request->state_id);
    //     }

    //     if ($request->filled('district_id')) {
    //         $query->where('district_name', $request->district_id);
    //     }

    //     if ($request->filled('assembly_id')) {
    //         $query->where('assembly_name', $request->assembly_id);
    //     }

    //     $services = $query->get();

    //     return view('user.index', compact('services'));
    // }

    public function index(Request $request)
    {
        $query = Service::with('associate'); 
        
        if($request->filled('state_id') && $request->state_id !== 'all') {
            $query->where('state', $request->state_id);
        }

        if($request->filled('district_id') && $request->district_id !== 'all_state') {
            $query->where('district_name', $request->district_id);
        }

        if($request->filled('assembly_id') && $request->assembly_id !== 'all_district') {
            $query->where('assembly_name', $request->assembly_id);
        }

        if($request->filled('sector_code')) {
            $query->where('sector_name', $request->sector_code);
        }

        if($request->filled('industry_code')) {
            $query->where('industry_name', $request->industry_code);
        }

        if($request->filled('subindustry_code')) {
            $query->where('sub_industry_name', $request->subindustry_code);
        }

        $services = $query->get();
        
        return view('user.index', compact('services'));
    }



    public function service_details(Request $request)
    {

        $id = $request->input('id');
        $service = Service::findOrFail($id);
        $service->load('associate'); 

        return view('user.searchtableview', compact('service'));
    }


    public function fetchLocations($serviceId)
    {
        $locations = Location::where('service_id', $serviceId)->get();
        return response()->json($locations);
    }
}