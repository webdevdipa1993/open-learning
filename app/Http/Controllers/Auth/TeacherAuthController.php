<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeacherAuthController extends Controller
{
    // Handle teacher login form submission
    public function loginPost(Request $request)
    {
        // Validate the login input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        
        // Log the credentials for debugging
        \Log::info('Login attempt:', $request->only('email', 'password'));

        // Attempt to log in the teacher
        if (auth()->guard('teacher')->attempt($request->only('email', 'password'))) {
            return redirect()->route('teacher.dashboard')->with('success', 'Welcome to the teacher Dashboard');
        }

        // Redirect back with an error if authentication fails
        return redirect()->route('teacher.login')->withErrors(['email' => 'Invalid email or password']);
    }

    // Handle teacher logout
    public function logout()
    {
        auth()->guard('teacher')->logout(); // Log out the teacher user
        return redirect()->route('teacher.login')->with('success', 'Logged out successfully');
    }//
}
