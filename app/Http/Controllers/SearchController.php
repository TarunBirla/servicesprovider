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

    public function index(Request $request)
    {
        $query = Service::with('associate'); // Eager load associate

        if ($request->filled('state_id')) {
            $query->where('state', $request->state_id);
        }

        if ($request->filled('district_id')) {
            $query->where('district_name', $request->district_id);
        }

        if ($request->filled('assembly_id')) {
            $query->where('assembly_name', $request->assembly_id);
        }

        $services = $query->get();

        return view('user.index', compact('services'));
    }


    public function service_details(Request $request)
    {

        $query = $request->input('query');
        $services = Service::where('name', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->get();

        return view('user.searchtable', compact('services', 'query'));
    }


    public function fetchLocations($serviceId)
    {
        $locations = Location::where('service_id', $serviceId)->get();
        return response()->json($locations);
    }
}