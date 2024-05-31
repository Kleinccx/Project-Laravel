<?php

// app/Http/Controllers/OrderController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Cart;
use App\Models\OrderItem;
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

        // Calculate the total amount and check product availability
        $totalAmount = 0;
        foreach ($validated['cartItems'] as $item) {
            $product = Product::findOrFail($item['product_id']);
            
            // Check if enough stock is available
            if ($product->quantity < $item['quantity']) {
                return response()->json(['message' => 'Not enough stock for ' . $product->product_name], 400);
            }

            $totalAmount += $item['quantity'] * $product->price;
        }

        // Store the order in the database
        $order = new Order();
        $order->user_id = Auth::id();
        $order->payment_method = $validated['payment_method'];
        $order->bank_name = $validated['bank_name'] ?? null;
        $order->beneficiary_name = $validated['beneficiary_name'] ?? null;
        $order->swift_code = $validated['swift_code'] ?? null;
        $order->total_amount = $totalAmount;
        $order->save();

        // Store order items and update product quantity
        foreach ($validated['cartItems'] as $item) {
            $product = Product::findOrFail($item['product_id']);
            
            // Deduct the product quantity
            $product->quantity -= $item['quantity'];
            $product->save();

            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'price' => $product->price,
                'product_name' => $product->product_name,
                'imageUrl' => $product->imageUrl, 
            ]);
        }

        Cart::where('user_id', Auth::id())
            ->whereIn('product_id', array_column($validated['cartItems'], 'product_id'))
            ->delete();

        return response()->json(['message' => 'Payment successful'], 200);
    }

    public function checkout(Request $request)
    {
        if (auth()->check()) {
            $user = auth()->user();
    
            if ($user->hasRole('admin')) {
                return redirect()->route('admin.dashboard');
            } else {
                $cartItems = $user->carts()->with('product')->get();
                $totalAmount = $cartItems->sum(function ($item) {
                    return $item->product->price * $item->quantity;
                });
    
                return view('checkout', [
                    'cartItems' => $cartItems,
                    'totalAmount' => $totalAmount,
                ]);
            }
        } else {
            return redirect()->route('login');
        }
    }
    public function orderDetails(Request $request)
    {
 
    if (!$request->user()) {
      
        return redirect()->route('login');
    }
    $user = $request->user();

    $orders = Order::where('user_id', $user->id)
        ->with('orderItems.product')
        ->get();

    return view('order-items', compact('orders'));
}
}
