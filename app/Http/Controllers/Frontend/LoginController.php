<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('frontend.auth.login');
    }
    
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            return redirect()->route('frontend.home');
        }
    
        return redirect('/login')->with('error', 'Invalid credentials. Please try again.');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
