<?php

// app/Http/Controllers/Admin/UserController.php

namespace App\Http\Controllers;

use App\Http\Controllers;
use App\Models\User; // or your Associate model
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $associates = User::all();
        return view('user.index', compact('associates'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,approved',
        ]);

        $user = User::findOrFail($id);
        $user->status = $request->status;
        $user->save();

        return redirect()->route('user.index')
                         ->with('success', 'User status updated successfully.');
    }

    // other existing methods like create, store, etc.
}
