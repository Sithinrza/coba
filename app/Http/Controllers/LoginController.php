<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
        public function index()
        {
            return view('login');
        }
        public function login_proses(Request $request)
    {
        $validasi = $request->validate([
            'email'     => 'required|email',
            'password'  => 'required'
        ]);

        //cara baca function dari auth untuk mencek email dan password apakah ada didalam db
        if (Auth::attempt($validasi)){
            //session untuk login
        //buat session
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
        return back()->with('error', 'Gagal Login, Ulangi!');

    }
        public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
