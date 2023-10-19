<?php

namespace App\Http\Controllers;


use App\Models\Order;
use App\Models\Product;
use App\Models\Client;
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


        $clientData = $request->only(['client_name', 'contact_number', 'client_address']);


        $checkClientName = $clientData['client_name']; // Replace with the client name you want to check


        $existingClient = Client::whereRaw("LOWER(name) = ?", [strtolower($checkClientName)])->first();
        $clientId = 0;
        if ($existingClient) {
            // The client already exists in the database
            // You can access the existing client's details using $existingClient
            $existingClient->address = $clientData['client_address'];
            $existingClient->contact = $clientData['contact_number'];
            $clientId = $existingClient->clientId;
        } else {
            // The client does not exist in the database
            $newClient = new Client();
            $newClient->name = $checkClientName;
            $newClient->address = $clientData['client_address'];
            $newClient->contact = $clientData['contact_number'];

            $newClient->save();
            $clientId = $newClient;
        }

        dd($request->all());
        $orderData = $request->all();

        $orders = new Order();
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
