<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

// Import the Product model
class OrderController
{
// app/Http/Controllers/OrderController.php
    public function create()
    {
        $products = Product::all();
        return view('order-form', ['products' => $products]);
    }

    public function store(Request $request)
    {
        $product = $request->input('product');


        $clientData = $request->only(['client_name', 'contact_number', 'client_address']);
        // Create a new instance of the Client model and set its attributes
        $clients = new Clients();
        $clients->name = $clientData['client_name'];
        $clients->contact = $clientData['contact_number'];
        $clients->address = $clientData['client_address'];

        // Save the new client to the database
        $clients->save();
        $clientId = $clients->id;

        $orderData = $request->all();

        $orders = new Order();
        $product = $orderData['product'];
        $productArr = json_decode($product, true);


        $orders->productId = $productArr['productId'];

        if ($productArr['description'] == "Lechon") {
            $orders->price = $orderData['price'];
            $addOns['meat'] = $orderData["dinuguan_with_meat_count"];
            $addOns['dinuguan'] = $orderData["dinuguan_only_count"];
            $addOns['paklay'] = $orderData ["paklay_count"];
        } else {
            $orders->price = $productArr['price'];
        }

        $orders->amountPaid = $orderData['amount_paid'];
        $orders->balance = $orderData['balance'];
        $orders->deliveryFee = $orderData['delivery_fee'];
        $orders->deliveryDatetime = $orderData['delivery_datetime'];

        $orders->save();
        dd($orderData, $request->all(), $productArr);
    }

}
