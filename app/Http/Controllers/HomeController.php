<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;


class HomeController extends Controller
{
    /**
     * Show the application's home page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $authUser = Auth::user();
        $products = Product::all();
        $users = User::all();
    
        return view('index', compact('authUser', 'products', 'users'));
    }
}