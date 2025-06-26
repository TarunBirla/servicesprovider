<?php
// app/Http/Controllers/RatingController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\Service;
use Illuminate\Support\Facades\Validator;

class RatingController extends Controller
{
     public function store(Request $request)
    {
        // Validate
        $request->validate([
            'serviceid' => 'required|exists:services,id',
            'name' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'note' => 'nullable|string',
        ]);

        // Save to DB
        $rating = Rating::create([
            'serviceid' => $request->serviceid,
            'name'      => $request->name,
            'rating'    => $request->rating,
            'note'      => $request->note,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Rating saved!',
            'rating'  => $rating
        ]);
    }

    public function thankyou($serviceId = null)
    {
        $service = $serviceId ? Service::find($serviceId) : null;
        return view('user.thankyou', compact('service'));
    }

    public function ratingHistory()
    {
        $ratings = Rating::with('service')->orderBy('created_at', 'desc')->paginate(15);
        return view('rating.history', compact('ratings'));
    }
}
