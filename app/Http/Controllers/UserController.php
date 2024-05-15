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
            ], [
                'name.required' => 'The name field is required.',
                'email.required' => 'The email field is required.',
                'email.email' => 'The email must be a valid email address.',
                'email.unique' => 'The email has already been taken.',
                'password.required' => 'The password field is required.',
                'password.min' => 'The password must be at least 8 characters.',
                'password.confirmed' => 'The password confirmation does not match.',
            ]);
    
            $user = User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => bcrypt($validatedData['password']),
            ]);
    
            // Additional actions after user creation, such as sending email confirmation, etc.
    
            // Show success pop-up message
            echo "<script>
                Swal.fire('Registration Successful', 'You have been successfully registered.', 'success').then(function() {
                    window.location.href = '/login'; // Redirect to the login page after the pop-up is closed
                });
            </script>";
        } else {
            // Show create account form
            return view('register');
        }
        return redirect('/login'); // Redirect to the login page if the request method is 'post'
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
        $user = User::where('email', $validatedData['email'])->first();

        if ($user && Hash::check($validatedData['password'], $user->password)) {
            // Authentication successful
            Auth::login($user);
            return redirect()->intended('/'); // Redirect to the desired page after login
        } else {
            // Authentication failed
            if (!$user) {
                return back()->withErrors(['email' => 'Email is not valid or does not exist.']);
            } else {
                return back()->withErrors(['password' => 'Incorrect password.']);
            }
        }
    } else {
        // Show login form
        return view('login');
    }
}
public function profile(Request $request)
{
    // Your login logic here

    // Assuming the user is authenticated successfully
    $user = auth()->user();
    return redirect()->route('index')->with('userName', $user->name);
}

public function carts()
{
    return $this->hasMany(Cart::class);
}
}