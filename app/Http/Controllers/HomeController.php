<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Contact;
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

    public function storeContact(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:100',
            'phone' => 'nullable|string|max:15',
            'message' => 'required|string',
        ]);

        $contact = new Contact();
        $contact->fullname = $request->fullname;
        $contact->email = auth()->user()->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;
        $contact->save();

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }

       
    public function about(Request $request)
    {
        if (auth()->check() && auth()->user()->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        }

        return view('about');
    }
    }
