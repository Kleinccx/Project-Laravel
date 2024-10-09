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
        // Check if the user is already logged in
        if (Auth::check()) {
            // If the logged-in user is an admin, redirect them to the admin dashboard
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } else {
                // If the logged-in user is not an admin, redirect them to the appropriate page
                return redirect()->intended('/');
            }
        } else {
            // If the user is not logged in, allow them to register
            if ($request->isMethod('post')) {
                $validatedData = $request->validate([
                    'name' => 'required|string|max:255',
                    'email' => 'required|string|email|max:255|unique:users',
                    'password' => 'required|string|min:8|confirmed',
                    'mobile_number' => 'required|string|max:20',
                    'address' => 'required|string|max:255',
                ]);
        
                $user = User::create([
                    'name' => $validatedData['name'],
                    'email' => $validatedData['email'],
                    'password' => bcrypt($validatedData['password']),
                    'mobile_number' => $validatedData['mobile_number'],
                    'address' => $validatedData['address'],
                    'role' => 'user', // Default role assigned to new users
                ]);
        
                return redirect()->route('login')->with('success', 'Registration successful. Please log in.');
            } else {
                return view('register');
            }
        }
    }
    
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $validatedData = $request->validate([
                'email' => 'required|email|exists:users,email',
                'password' => 'required|string',
            ], [
                'email.exists' => 'This email is not registered.',
            ]);
    
            $credentials = $request->only('email', 'password');
    
            if (Auth::attempt($credentials)) {
                $user = Auth::user();
                $user->update(['status' => 1]);
    
                if ($user->hasRole('admin')) {
                    return redirect(route('admin.dashboard'))->with('success', 'Welcome, you are logged in as admin');
                } else {
                    return redirect(route('index'))->with('success', 'Welcome, you are logged in');
                }
            } else {
                return redirect()->back()->withInput($request->only('email'))->withErrors([
                    'password' => 'Incorrect email or password.',
                ]);
            }
        }
    
        return view('login');
    }
    
    
    public function logout(Request $request)
    {
        $user = Auth::user();
        $user->update(['status' => 'inactive']);

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/login');
    }
    public function profile(Request $request)
    {
        // Check if the user is authenticated
        if (auth()->check()) {
            // Get the current user
            $user = auth()->user();
    
            // Check if the user is an admin
            if ($user->hasRole('admin')) {
                // If the user is an admin, redirect them to the admin dashboard
                return redirect()->route('admin.dashboard');
            } else {
                // Pass the user to the profile view
                return view('profile', compact('user'));
            }
        } else {
            // If the user is not authenticated, redirect them to the login page
            return redirect()->route('login');
        }
    }
    
}
