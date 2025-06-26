<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class OrderController extends Controller
{
    public function thankyou($serviceId = null)
    {
        $service = null;
        if ($serviceId) {
            $service = Service::find($serviceId); // Get the service if passed
        }

        return view('user.thankyou', compact('service'));
    }
    public function thankYouPage($orderId) {
    $order = Order::with('service')->findOrFail($orderId);
    return view('your-thankyou-view', ['service' => $order->service]);
}

}
