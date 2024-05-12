<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart; // Add this import statement

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        // Retrieve the authenticated user
        $user = null; // Set user to null if not using authentication
        
        // Retrieve the product
        $product = Product::find($id);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        // Create the cart
        $cart = Cart::create([
            'product_id' => $product->id,
            'quantity' => 1,
            'price' => $product->price,
            'user_id' => $user ? $user->id : null, // Use null if user is null
        ]);

        return redirect()->route('cart.view')->with('success', 'Product added to cart.');
    }
    
    public function view()
    {
        // Retrieve the user's carts
        $carts = Cart::all();
    
        return view('cart', ['carts' => $carts]);
    }
}