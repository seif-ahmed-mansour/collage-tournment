<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
        if (auth()->attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/');
        }
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
