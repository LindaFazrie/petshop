<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        // Retrieve the authenticated user
        $user = Auth::user();

        // Retrieve all products
        $products = Product::all();

        // Pass the user's name and products to the view
        return view('home', compact('user', 'products'));
    }
}
