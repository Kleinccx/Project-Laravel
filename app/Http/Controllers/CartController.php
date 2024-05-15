<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart; 

class CartController extends Controller
{
    // in CartController.php
// PHP (Laravel) code
// in CartController.php
public function addToCart(Request $request, $id)
{
    $product = Product::findOrFail($id);
    $user = auth()->user();

    // Check if the product is already in the user's cart
    $cartItem = $user->carts()->where('product_id', $id)->first();

    if ($cartItem) {
        // Increment the quantity of the existing cart item
        $cartItem->quantity++;
        $cartItem->save();
    } else {
        // Create a new cart item
        $cartItem = $user->carts()->create([
            'product_id' => $id,
            'quantity' => 1,
            'price' => $product->price,
        ]);
    }

    // Return a success message instead of a JSON response
    return redirect()->back()->with('success', 'Product added to cart successfully');
}

public function view()
{
    $user = auth()->user();
    $cart_items = $user ? $user->carts()->with('product')->get() : [];

    $total = 0;
    if ($cart_items instanceof Countable && count($cart_items) > 0) {
        foreach ($cart_items as $item) {
            $total += $item->quantity * $item->price;
        }
    }

    return view('cart', compact('cart_items', 'total'));
}
}