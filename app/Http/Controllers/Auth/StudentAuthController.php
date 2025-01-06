<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentAuthController extends Controller
{
    // Handle student login form submission
    public function login(Request $request)
    {
        // Validate the login input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        
        // Log the credentials for debugging
        \Log::info('Login attempt:', $request->only('email', 'password'));

        // Attempt to log in the student
        if (auth()->guard('student')->attempt($request->only('email', 'password'))) {
            return redirect()->route('dashboard.student')->with('success', 'Welcome to the student Dashboard');
        }

        // Redirect back with an error if authentication fails
        return redirect()->route('auth.student.login')->withErrors(['email' => 'Invalid email or password']);
    }

    // Handle student logout
    public function logout()
    {
        auth()->guard('student')->logout(); // Log out the student user
        return redirect()->route('auth.student.login')->with('success', 'Logged out successfully');
    }
}
