<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Validation\Rules;

class AuthController
{
   /**
    *  Views
    */ 
    public function showLogin(): View
    {
        return view('login');
    }

    public function showRegister(): View
    {
        return view('register');
    }

    /**
     * Handle Requests
     */
    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            //return redirect()->intended('user-dashboard');
            return redirect()->action([UserController::class, 'index']);
        }

        return back()->withErrors([
            'email' => 'Email is not contained within our records',
        ])->onlyInput('email'); 
    }

    public function register(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => 'name',
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        Auth::login($user);
        //return redirect()->intended('user-dashboard');
        return redirect()->action([UserController::class, 'index']);
    }
}
