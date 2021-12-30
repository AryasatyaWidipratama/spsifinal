<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $validateRequest = $request->validate([
            'login' => ['required'],
            'password' => ['required'],
        ]);

        $userMahasiswa = User::where('nim', $validateRequest['login'])->first();
        if ($userMahasiswa) {
            Auth::attempt(['nim' => $validateRequest['login'], 'password' => $validateRequest['password']]);
        } else {
            Auth::attempt(['nip' => $validateRequest['login'], 'password' => $validateRequest['password']]);
        }

        if (Auth::check()) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
