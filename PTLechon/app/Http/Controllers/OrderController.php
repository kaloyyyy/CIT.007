<?php

namespace App\Http\Controllers;


use App\Models\Item;
use App\Models\Order;
use App\Models\Product;
use App\Models\Client;
use Carbon\Carbon;
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

        $currentTimestamp = Carbon::now();
        $existingClient = Client::whereRaw("LOWER(name) = ?", [strtolower($checkClientName)])->first();
        $clientId = 0;
        echo $currentTimestamp;
        if ($existingClient) {
            // The client already exists in the database
            // You can access the existing client's details using $existingClient
            $existingClient->address = $clientData['client_address'];
            $existingClient->contact = $clientData['contact_number'];
            $existingClient->updated_at = $currentTimestamp;
            $existingClient->save();
            $clientId = $existingClient->clientId;
        } else {
            // The client does not exist in the database
            $newClient = new Client();
            $newClient->name = $checkClientName;
            $newClient->address = $clientData['client_address'];
            $newClient->contact = $clientData['contact_number'];
            $newClient->created_at = $currentTimestamp;
            $newClient->updated_at = $currentTimestamp;


            $newClient->save();
            $clientId = $newClient;
        }

        //dd($request->all());
        $orderData = $request->all();

        $orders = new Order();

        $orders->clientId = $clientId;
        $orders->amountPaid = $orderData['amount_paid'];
        $orders->balance = $orderData['balance'];
        $orders->deliveryFee  = $orderData['delivery_fee'];
        $orders->deliveryDatetime  = $orderData['delivery_datetime'];

        $orders->save();
        $orderId = $orders->id;
        // Loop through the request data to associate selected products with the order
        foreach ($request->all() as $productId => $quantity) {
            if (is_numeric($productId) && $quantity > 0) {
                $item = new Item();
                $item->orderId = $orderId; // Set the order ID to the ID of the newly created order
                $item->productId = $productId; // Set the product ID based on your data
                $item->quantity = $quantity; // Set the quantity based on your data
                // Retrieve the price from the request based on the product's field name
                $product = Product::find($productId);
                $productDesc = $product->description;
                $productDesc = str_replace(' ', '_', $productDesc);
                $item->price = $orderData[$productDesc.'_price'];
                $item->save(); // Save the item to the 'items' table
            }
        }
        dd($request->all());
    }

}
