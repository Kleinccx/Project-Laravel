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

        public function addProduct() 
        {
            return view ('admin.addProduct');
        }
        public function addProductPost(Request $request)
        {
            \Log::info('Request Data: ', $request->all());
        
            $validatedData = $request->validate([
                'product_name' => 'required|unique:products,product_name',
                'price' => 'required',
                'quantity' => 'required',
                'description' => 'required',
                'imageUrl' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'product_status' => 'required',
                'category_id' => 'required|integer|in:1,2,3,4',
            ]);
        
            \Log::info('Validated Data: ', $validatedData);
        
            $product = new Product;
            $product->product_name = $validatedData['product_name'];
            $product->price = $validatedData['price'];
            $product->quantity = $validatedData['quantity'];
            $product->description = $validatedData['description'];
            $product->product_status = $validatedData['product_status'];
            $product->category_id = $validatedData['category_id'];
        
            if ($request->hasFile('imageUrl')) {
                $image = $request->file('imageUrl');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images'), $imageName);
                $imageUrl = asset('images/' . $imageName);
                $product->imageUrl = $imageUrl;
            }
        
            $product->save();
        
            // Redirect to the admin inventory page
            return redirect()->route('admin.inventory')->with('success', 'Product added successfully');
        }

        public function editProduct($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.editProduct', compact('product'));
    }

    public function updateProduct(Request $request, $id)
    {
        $validatedData = $request->validate([
            'product_name' => 'required|unique:products,product_name,' . $id,
            'price' => 'required',
            'quantity' => 'required',
            'description' => 'required',
            'imageUrl' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'product_status' => 'required',
            'category_id' => 'required|integer|in:1,2,3,4',
        ]);

        $product = Product::findOrFail($id);
        $product->product_name = $validatedData['product_name'];
        $product->price = $validatedData['price'];
        $product->quantity = $validatedData['quantity'];
        $product->description = $validatedData['description'];
        $product->product_status = $validatedData['product_status'];
        $product->category_id = $validatedData['category_id'];

        if ($request->hasFile('imageUrl')) {
            $image = $request->file('imageUrl');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $imageUrl = asset('images/' . $imageName);
            $product->imageUrl = $imageUrl;
        }

        $product->save();

        return redirect()->route('admin.inventory')->with('success', 'Product updated successfully');
    }
    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
    
        return redirect()->route('admin.inventory')->with('success', 'Product deleted successfully');
    }
    


    }        