<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;

class ProductController extends Controller
{
    public function index()
    {
     $products = Product::all();
     $users = User::all();
     return view ('index')->with('products', $products)->with('users',$users);
    }

    public function productDetails($id)
    {
        $product = Product::find($id);
        //$products = Product
        $products = Product::inRandomOrder()->take(6)->get();
        return view('product-details')->with('product', $product)->with('products', $products);
    }
    
    public function addProduct() 
    {
        return view ('add_product');
    }
    public function addProductPost(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:products,product_name',
            'price' => 'required',
            'quantity' => 'required',
            'description' => 'required',
        ]);
        
        
        Product::create($validatedData);
}
}
