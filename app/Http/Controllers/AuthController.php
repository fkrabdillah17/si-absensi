<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;




class AuthController extends Controller
{
    public function index()
    {
        if (Auth::user() != null) {
            return back();
        } else {
            return view('welcome');
        }
    }

    public function login(Request $request)
    {
        $rules = [
            'username' => 'required|string|exists:users',
            'password' => 'required|string'
        ];

        $message = [
            'username.required' => 'Username harus diisi!',
            'username.exists' => 'Username tidak terdaftar!',
            'password.required' => 'Password harus diisi!',
        ];
        $validate = $this->validate($request, $rules, $message);

        if ($validate) {
            $check = User::where('username', $request->username)->value('role');
            if (Auth::attempt($request->only('username', 'password'))) {
                $request->session()->regenerate();
                if ($check == 0 ) {
                    return redirect()->route('dashboard')->with('success', 'Selamat datang di Menu Admin');
                } else {
                    return redirect()->route('dashboard')->with('success', 'Anda berhasil login');
                }
            } else {
                return redirect()->route('login')->with('info', 'Periksa kembali email atau password anda!');
            }
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    public function register()
    {
        return view('login.register');
    }
}
