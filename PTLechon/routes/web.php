<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ViewOrdersController;
use App\Http\Controllers\ItemController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});


Route::get('/test', function () {
    return view('test');
});




Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
});

Route::group(['middleware' => ['auth']], function() {
    // your routes
    // Login and Logout Routes


    Route::get('/newOrders', [OrderController::class, 'create'])->name('newOrders.index');
    Route::get('/viewOrders', [ViewOrdersController::class, 'viewOrders'])->name('viewOrders.index');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'show'])->middleware('auth');
    Route::get('/dashboard',  [DashboardController::class, 'show'])->name('dashboard');
// In routes/web.php
    Route::get('/filter-orders', [ViewOrdersController::class, 'filterOrders']);
// routes/web.php
    Route::get('/items', [ItemController::class,'destroy'])->name('items.destroy');
    //Route::delete('/items/{id}', [ItemController::class, 'destroy'])->name('items.destroy');



// Display the form
    Route::get('/order', [OrderController::class, 'create'])->name('show-order-form');

// Process the form submission
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
});

if (auth()->check()) {
    // User is authenticated
    $user = auth()->user(); // Get the authenticated user
    // You can access user properties, e.g., $user->name
    Route::get('/dashboard', [DashboardController::class, 'show'])->middleware('auth');
    Route::get('/newOrders', [OrderController::class, 'create'])->name('newOrders.index');
} else {
    Route::post('/login', [LoginController::class, 'login']);
    // User is not authenticated
}



