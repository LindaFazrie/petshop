<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartItems = session('cart', []);

        $totalPrice = 0;
    
        foreach ($cartItems as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }
    
        return view('checkout.index', compact('cartItems', 'totalPrice'));
    }

    public function process(Request $request)
{
    // Retrieve the cart items and total price
    $cartItems = session('cart', []);
    $totalPrice = 0;

    foreach ($cartItems as $item) {
        $totalPrice += $item['price'] * $item['quantity'];
    }

    $transactionId = 'TX' . now()->timestamp . '-' . uniqid();

    // Create a new transaction record with cart information


    // Clear the cart after creating the transaction
    session(['cart' => []]);

    // Redirect the user to a thank you page or order summary page
    return view('checkout.order-summary', compact('transactionId'));
}


        public function showOrderSummary($transactionId)
        {
            return view('checkout.order-summary', compact('transactionId'));
        }
}
