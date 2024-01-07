<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{
    public function addToCart($productId)
    {
        $product = Product::find($productId);

        if (!$product) {
            return back()->with('error', 'Product not found.');
        }

        $cartItems = session('cart', []);

        // Check if the product is already in the cart
        $existingItem = collect($cartItems)->firstWhere('id', $productId);

        if ($existingItem) {
            // Increment the quantity if the product is already in the cart
            $existingItem['quantity']++;
        } else {
            // Add a new item to the cart
            $cartItems[] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
            ];
        }

        // Update the session data with the new cart items
        session(['cart' => $cartItems]);

        // Redirect to the cart index page
        return redirect()->route('cart.index');
    }

    public function index()
    {
        // Retrieve the user's cart items from the session
        $cartItems = session('cart', []);

        // Calculate the total price
        $totalPrice = 0;
        foreach ($cartItems as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }

        // Pass the cart items and total price to the view
        return view('cart.index', compact('cartItems', 'totalPrice'));
    }

    public function removeFromCart($productId)
    {
        // Retrieve the user's cart items from the session
        $cartItems = session('cart', []);

        // Check if the product is in the cart
        $cartItemIndex = $this->findCartItemIndex($cartItems, $productId);

        if ($cartItemIndex !== false) {
            // Remove the product from the cart
            unset($cartItems[$cartItemIndex]);

            // Update the session data with the modified cart
            session(['cart' => array_values($cartItems)]);

            // Calculate the total price again (optional)
            $totalPrice = $this->calculateTotalPrice($cartItems);

            return redirect()->route('cart.index')->with('success', 'Product removed from cart.');
        }

        // If the product is not in the cart, redirect with an error message
        return redirect()->route('cart.index')->with('error', 'Product not found in cart.');
    }

    // Helper method to find the index of a cart item by product ID
    private function findCartItemIndex($cartItems, $productId)
    {
        foreach ($cartItems as $index => $item) {
            if ($item['id'] == $productId) {
                return $index;
            }
        }

        return false;
    }

    // Helper method to calculate the total price of the items in the cart
    private function calculateTotalPrice($cartItems)
    {
        $totalPrice = 0;

        foreach ($cartItems as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }

        return $totalPrice;
    }
}
