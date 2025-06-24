<?php

namespace App\Http\Controllers;

use App\Models\Suggestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SuggestionController extends Controller
{
    // Show the user suggestion form
    public function indexUser()
    {
        return view('user.suggestion'); 
    }

    // Show the associate suggestion form
    public function indexAssociate()
    {
        return view('associate.suggestionasso'); 
    }

    // Save suggestion (shared)
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'nullable|exists:users,id',
            'associate_id' => 'nullable|exists:associates,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        Suggestion::create($request->only(
            'user_id',
            'associate_id',
            'name',
            'email',
            'subject',
            'message'
        ));

        return response()->json(['success' => true]);
    }

    // Show all suggestions (admin view)
    public function show()
    {
        $suggestions = Suggestion::latest()->paginate(10);
        return view('admin.suggestion.index', compact('suggestions'));
    }

    // Update status (admin)
   public function updateStatus(Request $request, $id)
{
    $request->validate([
        'status' => 'required|in:Pending,Reviewed,Resolved'
    ]);

    $suggestion = Suggestion::findOrFail($id);
    $suggestion->update(['status' => $request->status]);
    return response()->json(['success' => true]);
}

}
