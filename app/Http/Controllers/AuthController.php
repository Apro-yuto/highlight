<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function redirectLoginPage()
    {
        return Inertia::location(route('login.index'));
    }

    public function showLoginPage()
    {
        return view('login');
    }

    public function login(LoginRequest $request)
    {
        $request->authenticate();
        $request->session()->regenerate();

        return redirect()->intended(route('top'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.redirect');
    }
}
