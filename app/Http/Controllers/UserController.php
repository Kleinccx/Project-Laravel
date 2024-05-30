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
                'email' => 'required|email',
                'password' => 'required|string',
            ]);

            $user = User::where('email', $validatedData['email'])->first();

            if (!$user || !Hash::check($validatedData['password'], $user->password)) {
                return redirect()->back()->withInput($request->only('email'))->withErrors([
                    'password' => 'Incorrect email or password.',
                ]);
            }

            if (Auth::attempt($validatedData)) {
                $user->update(['status' => 1]);
                return redirect(route('index'))->with('success', 'Welcome, you are logged in');
            } else {
                return redirect()->back()->withInput($request->only('email'))->withErrors([
                    'password' => 'Incorrect password.',
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
