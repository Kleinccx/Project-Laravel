<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
  public function register(Request $request)
{
    if ($request->isMethod('post')) {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'mobile_number' => 'required|string|max:20',
            'address' => 'required|string|max:255',
        ], [
            // Error messages
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'mobile_number' => $validatedData['mobile_number'],
            'address' => $validatedData['address'],
        ]);

        // Show success message and redirect to login page
        return redirect()->route('login')->with('success', 'Registration successful. Please log in.');
    } else {
        // Show create account form
        return view('register');
    }
}
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            // Handle login form submission
            $credentials = $request->only('email', 'password');
    
            // Validate the user input
            $validatedData = $request->validate([
                'email' => 'required|email',
                'password' => 'required|string|min:8',
            ], [
                'email.required' => 'Email is required.',
                'email.email' => 'Email is not valid.',
                'password.required' => 'Password is required.',
                'password.min' => 'Password must be at least 8 characters long.',
            ]);
    
            // Check if the user exists in the database
            if (Auth::attempt($validatedData)) {
                return redirect(route('index'))->with('success', 'Welcome, you are logged in');
            }
        }
    
        return view('login');
    }
        public function profile(request $request) {
            return view ('profile');
        }

        public function carts()
        {
            return $this->hasMany(Cart::class);
        }
        public function logout(Request $request)
        {
 
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/login');
        }
        public function showProfile()
        {
            if (auth()->check()) {
                $user = auth()->user();
                return view('profile.show', compact('user'));
            } else {
                // Redirect or display an error message if the user is not authenticated
                return redirect()->route('login');
            }
        }

            /**
             * Show the form for editing the user's profile.
             *
             * @return \Illuminate\View\View
             */
            public function editProfile()
            {
                $user = Auth::user();
                return view('profile.edit', compact('user'));
            }

            /**
             * Update the user's profile.
             *
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\RedirectResponse
             */
            public function updateProfile(Request $request)
            {
                $user = Auth::user();
                $user->update($request->all());
                return redirect()->route('profile.show');
            }
            
                
                }