<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use  App\Models\User;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($credentials,$request->boolean("remember-me"))) {
            $request->session()->regenerate();
            return redirect()->route('games.index');
        }
         return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ])->onlyInput('email');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('welcome');
    }
    public function showRegister()
    {
        return view('register');
    }
    public function register(Request $request)
    {
        $validated = $request->validate([

            'name' => 'required|string|min:3',
            'email' => 'required|email',
            'password' => ['required','string','min:6','confirmed'],

        ]);
       $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'client',
        ]);

        Auth::login($user);
        $request->session()->regenerate();
        return redirect()->route('games.index');
    }
}

