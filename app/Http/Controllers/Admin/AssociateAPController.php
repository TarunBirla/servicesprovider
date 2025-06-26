<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AssociateAPController extends Controller
{
    public function index()
    {
        $associates = User::all();
        return view('admin.associates.index', compact('associates'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,approved',
        ]);

        $user = User::findOrFail($id);
        $user->status = $request->status;
        $user->save();

        return redirect()->route('admin.associates.index')
            ->with('success', 'User status updated successfully.');
    }
}
