<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //login
    public function showLoginForm()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        // Validate request
        $credentials = $request->only('email', 'password');
        // Check if the user is an admin
        if (Auth::guard('admin')->attempt($credentials)) {
            // Authentication passed for admin...
            return redirect()->intended('/admin');
        }
        // Check if the user is a regular user
        if (Auth::attempt($credentials)) {
            // Authentication passed for regular user...
            return redirect()->intended('/');
        }
        // If authentication fails, redirect back with error message
        return redirect()->back()->withInput()->withErrors(['email' => 'Invalid credentials']);
    }
    //end login
    //register
    public function showRegistrationForm()
    {
        return view('register');
    }
    public function register(Request $request)
    {
        // Validate request
        $user = User::create([
            'name' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);
        // Authenticate user after registration
        auth()->login($user);
        return redirect('/');
    }

}
