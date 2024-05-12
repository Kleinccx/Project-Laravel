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
            'product_name' => 'required|unique:products,product_name',
            'price' => 'required',
            'quantity' => 'required',
            'description' => 'required',
            'imageUrl' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

            $product = new Product;
            $product->product_name = $validatedData['product_name'];
            $product->price = $validatedData['price'];
            $product->quantity = $validatedData['quantity'];
            $product->description = $validatedData['description'];

            if ($request->hasFile('imageUrl')) {
                $image = $request->file('imageUrl');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images'), $imageName);
                $imageUrl = asset('images/' . $imageName);
                $product->imageUrl = $imageUrl;
            }

            $product->save();

    return redirect()->route('index')->with('success', 'Product added successfully');
}
        public function shop()
        {
            $products = Product::all();
            $users = User::all();

            return view('shop', compact('products', 'users'));
        }


        public function category()
        {
            $products = Product::all();
            $users = User::all();
        
            return view('product-category', compact('products', 'users'));
        }

}    
