<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceOrder;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;

class ServiceOrderController extends Controller
{
    public function create($service_id)
    {
        $service = Service::findOrFail($service_id);
        return view('orders.place', compact('service'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            
            'note' => 'nullable|string|max:1000',
        ]);

        ServiceOrder::create([
            'user_id' => Auth::id(),
            'service_id' => $request->service_id,
            'associate_id' =>$request->associate_id,
            'amount'=>$request->amount,
            'date'=>$request->date,
            'note' => $request->note,
              'status' => 'Pending',
        ]);

        // return redirect()->back()->with('success', 'Order placed successfully!');
        return redirect()->route('user.thankyou');
    }

    public function ordertable()
{
    $user = Auth::user();
    $orders = \App\Models\ServiceOrder::where('user_id', $user->id)->get();

    return view('user.orderuser', compact('orders'));
}
public function updateStatus(Request $request, $id)
{
    $request->validate([
        'status' => 'required|string|in:Pending,Confirmed,Cancelled,Completed',
    ]);

    $order = ServiceOrder::findOrFail($id);
    $order->status = $request->input('status'); // ✅ correctly treated as string
    $order->save();

    return redirect()->route('services.orders')->with('success', 'Order status updated successfully!');
}



    public function index()
    {
        $orders = ServiceOrder::with(['user', 'service'])->latest()->get();
        return view('associate.services.orders', compact('orders'));
    }
}
