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
            ]);

            $user = User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => bcrypt($validatedData['password']),
                'mobile_number' => $validatedData['mobile_number'],
                'address' => $validatedData['address'],
            ]);

            return redirect()->route('login')->with('success', 'Registration successful. Please log in.');
        } else {
            return view('register');
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
                // Retrieve the authenticated user
                $user = Auth::user();
    
                // Update user's status to 1 upon successful login
                $user->update(['status' => 1]);
    
                // Redirect users based on their status
                if ($user->status == 2) {
                    // Admin user, redirect to admin dashboard
                    return redirect(route('admin.dashboard'))->with('success', 'Welcome, you are logged in as admin');
                } else {
                    // Regular user, redirect to index page
                    return redirect(route('index'))->with('success', 'Welcome, you are logged in');
                }
            } else {
                // Authentication failed
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

    public function profile()
    {
        if (auth()->check()) {
            $user = auth()->user();
            return view('profile', compact('user'));
        } else {
            return redirect()->route('login');
        }
    }
    
}
