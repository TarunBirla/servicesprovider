<?php
// app/Http/Controllers/RatingController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\Service;
use Illuminate\Support\Facades\Validator;

class RatingController extends Controller
{
    /**
     * Store a new rating
     */
    public function store(Request $request)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'serviceid' => 'nullable|integer|exists:services,id',
            'name' => 'nullable|string|max:255',
            'rating' => 'nullable|integer|min:1|max:5',
            'note' => 'nullable|string|max:1000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Create rating
            $rating = Rating::create([
                'serviceid' => $request->serviceid,
                'name' => $request->name,
                'rating' => $request->rating,
                'note' => $request->note,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Rating submitted successfully!',
                'data' => $rating
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to submit rating. Please try again.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get all ratings for a service
     */
    public function getServiceRatings($serviceid)
    {
        try {
            $service = Service::findOrFail($serviceid);
            
            $ratings = Rating::where('serviceid', $serviceid)
                ->orderBy('created_at', 'desc')
                ->get();

            $averageRating = $ratings->avg('rating');
            $totalRatings = $ratings->count();

            return response()->json([
                'success' => true,
                'data' => [
                    'service' => $service,
                    'ratings' => $ratings,
                    'average_rating' => round($averageRating, 2),
                    'total_ratings' => $totalRatings,
                    'rating_breakdown' => [
                        '5_star' => $ratings->where('rating', 5)->count(),
                        '4_star' => $ratings->where('rating', 4)->count(),
                        '3_star' => $ratings->where('rating', 3)->count(),
                        '2_star' => $ratings->where('rating', 2)->count(),
                        '1_star' => $ratings->where('rating', 1)->count(),
                    ]
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Service not found.',
                'error' => $e->getMessage()
            ], 404);
        }
    }

    /**
     * Show rating history page
     */
    public function ratingHistory()
    {
        $ratings = Rating::with('service')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('rating.history', compact('ratings'));
    }

    /**
     * Delete a rating
     */
    public function destroy($id)
    {
        try {
            $rating = Rating::findOrFail($id);
            $rating->delete();

            return response()->json([
                'success' => true,
                'message' => 'Rating deleted successfully!'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Rating not found.',
                'error' => $e->getMessage()
            ], 404);
        }
    }
}