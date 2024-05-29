<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(Request $request)
{
    // Validate request data
    $validated = $request->validate([
        'payment_method' => 'required|string',
        'bank_name' => 'nullable|string',
        'beneficiary_name' => 'nullable|string',
        'swift_code' => 'nullable|string|min:8|max:11',
        'cartItems' => 'required|array', // Validate cart items array
        'cartItems.*.product_id' => 'required|integer|exists:products,id', // Validate product id
        'cartItems.*.quantity' => 'required|integer|min:1', // Validate quantity
    ]);

    // Calculate the total amount
    $totalAmount = collect($validated['cartItems'])->sum(function ($item) {
        $product = Product::findOrFail($item['product_id']);
        return $item['quantity'] * $product->price;
    });

    // Store the order in the database
    $order = new Order();
    $order->user_id = Auth::id();
    $order->payment_method = $validated['payment_method'];
    $order->bank_name = $validated['bank_name'] ?? null;
    $order->beneficiary_name = $validated['beneficiary_name'] ?? null;
    $order->swift_code = $validated['swift_code'] ?? null;
    $order->total_amount = $totalAmount;
    $order->save();

    // Store cart items if needed
    foreach ($validated['cartItems'] as $item) {
        $product = Product::findOrFail($item['product_id']);
        Cart::create([
            'user_id' => Auth::id(),
            'product_id' => $item['product_id'],
            'quantity' => $item['quantity'],
            'price' => $product->price, // Ensure price is included here
        ]);
    }

    // Remove cart items from the cart table
    Cart::where('user_id', Auth::id())
        ->whereIn('product_id', array_column($validated['cartItems'], 'product_id'))
        ->delete();

    return response()->json(['message' => 'Payment successful'], 200);
}

    
public function orderDetails()
{
    $orders = Order::where('user_id', Auth::id())
        ->with('orderItems.product')
        ->get();

    return view('order-items', compact('orders'));
}
}
