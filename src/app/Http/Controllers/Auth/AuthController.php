<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function login_check(Request $request) {
        $validatedData = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);
  
        $user = User::where('email', $validatedData['email'])->first();
  
        if(!$user)
        {
            return redirect()->route('login')->withErrors([
                'error' => 'User tidak ditemukan...',
            ])->withInput();
        }
  
        if(!Hash::check($validatedData['password'], $user->password))
        {
            return redirect()->route('login')->withErrors([
                'error' => 'Password salah...',
            ])->withInput();
        }
  
        Auth::login($user);

        return redirect()->route('backpanel.dashboard');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }
}
