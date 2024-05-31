<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the application's home page.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Get the authenticated user
            $user = Auth::user();
    
            // If the user is an admin
            if ($user->hasRole('admin')) {
                // Redirect the admin to the admin dashboard
                return redirect()->route('admin.dashboard');
            } else {
                // Fetch the products and users
                $products = Product::all();
                $users = User::all();
    
                // Return the index view with the data
                return view('index')->with('products', $products)->with('users', $users);
            }
        } else {
            // If the user is not authenticated, redirect them to the login page
            return redirect()->route('login');
        }
    }
    public function contact(Request $request)
    {
      
        if (auth()->check()) {
        
            $user = auth()->user();
    
  
            if ($user->hasRole('admin')) {
              
                return redirect()->route('admin.dashboard');
            } else {
          
                return view('contact', compact('user'));
            }
        } else {
            return redirect()->route('login');
        }
    }
       
    public function about(Request $request)
    {
        if (auth()->check() && auth()->user()->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        }

        return view('about');
    }
    }
