<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Session\Session as SessionSession;

class LoginController extends Controller
{


    public function index()
    {
        return view('auth.login');
    }

    public function registers()
    {

        return view('auth.register');
    }
    public function validasi()
    {
        return redirect('dashboard');
    }


    public function register(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'Nik' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);

        $data = [
            'name' => $request->name,
            'Nik' => $request->Nik,
            'password' => Hash::make($request->password), // Menggunakan kolom 'password' dan melakukan hashing
        ];

        User::create($data);

        $login = [
            'Nik' => $request->Nik,
            'password' => $request->password,
        ];

        if (Auth::attempt($login)) {
            return redirect('login');
        } else {
            return redirect('register')->with('failed', 'Email atau password salah');
        }
    }

    protected $attributes = [];
    public function flush()
    {
        $this->attributes = [];
    }


    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
