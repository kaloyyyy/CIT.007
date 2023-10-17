<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{


    public function showLoginForm()
    {
        if (auth()->check()) {
            return redirect('/dashboard');
        } else {
            return view('login');
            // User is not authenticated
        }

    }

    public function login(Request $request): \Illuminate\Http\RedirectResponse
    {
        $credentials = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($credentials)) {
            // Authentication passed
            return redirect()->intended('/dashboard'); // Redirect to the intended page
        }

        // Authentication failed, redirect back with an error message
        return redirect()->back()->withErrors(['username' => 'Invalid credentials']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
