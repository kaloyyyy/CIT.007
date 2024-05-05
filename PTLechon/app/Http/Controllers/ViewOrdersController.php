<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ViewOrdersController extends Controller
{
    //
    public function viewOrders()
    {
        $orders = Order::with('items.product', 'client')
            ->orderBy('deliveryDatetime') // Sort by delivery datetime
            ->get();

        foreach ($orders as $order) {
            $order->deliveryDatetime = Carbon::parse($order->deliveryDatetime);
        }

        return view('view-order', compact('orders'));
    }

    public function filterOrders(Request $request)
    {
        $selectedDate = $request->input('date');
        // Example: Fetch orders from the database based on the selected date
        $filteredOrders = Order::with('items.product', 'client')
            ->whereDate('deliveryDatetime', $selectedDate)
            ->orderBy('deliveryDatetime') // Sort by delivery datetime
            ->get();

        // Return the filtered data as JSON
        return response()->json($filteredOrders);
    }
}


