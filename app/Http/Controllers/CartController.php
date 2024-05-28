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
            $total += $item->quantity * $item->product->quantity;
        }
    }

    return view('cart', compact('cart_items', 'total'));
}
public function updateQuantity(Request $request)
{
    $request->validate([
        'id' => 'required|integer|exists:carts,id',
        'quantity' => 'required|integer|min:1',
    ]);

    $cart = Cart::findOrFail($request->input('id'));
    
    // Update quantity
    $cart->quantity = $request->input('quantity');

    // Update price if needed
    $product = $cart->product; // Assuming there's a relationship between Cart and Product models
    if ($product) {
        $cart->price = $product->price * $cart->quantity;
    }

    $cart->save();

    return response()->json(['success' => true, 'quantity' => $cart->quantity, 'price' => $cart->price]);
}

public function checkout(Request $request)
{
    // Get the current user
    $user = $request->user();

    // Get the user's cart items
    $cartItems = $user->carts()->with('product')->get();

    // Calculate the total amount
    $totalAmount = $cartItems->sum(function ($item) {
        return $item->product->price * $item->quantity;
    });

    // Pass the cart items and total amount to the checkout view
    return view('checkout', [
        'cartItems' => $cartItems,
        'totalAmount' => $totalAmount,
    ]);
}
   public function deleteItem(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:carts,id',
        ]);

        $cart = Cart::findOrFail($request->input('id'));
        $cart->delete();

        return response()->json(['success' => true]);
    }
    public function updatePrice(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:carts,id',
            'price' => 'required|numeric|min:0'
        ]);

        try {
            $cart = Cart::findOrFail($request->input('id'));
            $cart->price = $request->input('price');
            $cart->save();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to update cart item price.'], 500);
        }
    }



}