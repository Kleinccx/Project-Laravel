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

    public function shop()
    {
        $products = Product::all();
        $users = User::all();

        return view('templates.shop')->with('products', $products)->with('users', $users);
    }

}
