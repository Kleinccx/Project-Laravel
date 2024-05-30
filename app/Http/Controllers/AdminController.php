<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\Cart;
use Illuminate\Support\Facades\Log;


class AdminController extends Controller
{
    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
    // Retrieve counts
    $productCount = Product::count();
    $cartCount = Cart::count();
    
    $orders = Order::selectRaw('DATE(created_at) as date, COUNT(*) as total_orders')
                   ->groupBy('date')
                   ->get();
    $userCounts = User::selectRaw('DATE(created_at) as date, COUNT(*) as total_users')
                      ->groupBy('date')
                      ->get();

          
     $users = User::all();
     $userCount = $users->count();
     $orderCount = Order::count();

    return view('Admin.admindashboard', compact('userCount', 'productCount', 'cartCount', 'orders', 'userCounts', 'users', 'orderCount'));
   }
 
    public function show($id)
        {
            $user = User::find($id);
            return response()->json($user);
        }
      
        public function edit(Request $request)
        {
            try {
                $validatedData = $request->validate([
                    'id' => 'required|integer|exists:users,id',
                    'name' => 'required|string|max:255',
                    'email' => 'required|string|email|max:255',
                    'mobile_number' => 'required|string|max:15',
                    'address' => 'nullable|string',
                
                ]);
        
                $user = User::find($validatedData['id']);
                if (!$user) {
                    return response()->json(['success' => false, 'error' => 'User not found.']);
                }
        
                // Update only the provided fields
                $user->fill($validatedData)->save();
        
                return response()->json(['success' => true]);
            } catch (\Exception $e) {
                Log::error('Error updating user:', [
                    'message' => $e->getMessage(),
                    'data' => $request->all(),
                    'stack' => $e->getTraceAsString()
                ]);
                return response()->json(['success' => false, 'error' => 'Error updating user details.']);
            }
        }
        public function delete(Request $request)
        {
            try {
                // Retrieve the user ID from the request
                $id = $request->input('id');
        
                // Log the received request data for debugging
                Log::info('Request data:', $request->all());
        
                // Check if the ID is valid
                if (empty($id) || !is_numeric($id)) {
                    Log::error('Invalid user ID:', ['id' => $id]);
                    return response()->json(['success' => false, 'error' => 'Invalid user ID.']);
                }
        
                // Get the user
                $user = User::find($id);
                if (!$user) {
                    return response()->json(['success' => false, 'error' => 'User not found for ID: ' . $id]);
                }
        
                // Delete the user
                $user->delete();
        
                // Set success message
                return response()->json(['success' => true, 'message' => 'User Deleted']);
            } catch (\Exception $e) {
                // Log the exception for debugging
                Log::error('Error deleting user:', [
                    'message' => $e->getMessage(),
                    'data' => $request->all(),
                    'stack' => $e->getTraceAsString()
                ]);
        
                return response()->json(['success' => false, 'error' => 'An error occurred while deleting the user.']);
            }
        }
      
        public function Inventory()
        {
            // Fetch products from the database
            $products = Product::all();
    
            // Return the view with the products data
            return view('Admin.inventorycontrol', compact('products'));
        }

        
        public function AddProduct()
        {
            // Fetch products from the database
            $products = Product::all();
        
            // Return the view with the products data
            return view('Admin.addproduct', ['products' => $products]);
        }
        
    }        