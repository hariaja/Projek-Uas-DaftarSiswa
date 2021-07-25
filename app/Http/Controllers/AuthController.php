<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect('dashboard');
        }

        return view('auth.login');
    }

    public function prosesLogin(Request $request)
    {
        $aturan = [
            'email' => 'required|email',
            'password' => 'required'
        ];

        $pesan = [
            'email.required' => 'Email Wajib Diisi',
            'email.email' => 'Email Tidak Valid',
            'password.required' => 'Password Wajib Diisi'
        ];

        $validasi = Validator::make($request->all(), $aturan, $pesan);
        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput($request->all());
        }

        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];

        Auth::attempt($data);
        if (Auth::check()) {
            return redirect('dashboard');
        } else {
            return redirect('login')->with('warning', 'Email atau Password Salah');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
