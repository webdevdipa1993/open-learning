<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    // Handle admin login form submission
    public function login(Request $request)
    {
        // Validate the login input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        
        // Log the credentials for debugging
        \Log::info('Login attempt:', $request->only('email', 'password'));

        // Attempt to log in the admin
        if (auth()->guard('admin')->attempt($request->only('email', 'password'))) {
            return redirect()->route('dashboard.admin')->with('success', 'Welcome to the admin Dashboard');
        }

        // Redirect back with an error if authentication fails
        return redirect()->route('auth.admin.login')->withErrors(['email' => 'Invalid email or password']);
    }

    // Handle admin logout
    public function logout()
    {
        auth()->guard('admin')->logout(); // Log out the admin user
        return redirect()->route('auth.admin.login')->with('success', 'Logged out successfully');
    }
}
