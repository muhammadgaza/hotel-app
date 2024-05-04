<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function loginStore(Request $request)
    {
        $req = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]); // cek pengiriman harus ada email dan password

        if(Auth::attempt($req)){
            $request->session()->regenerate();
            Alert::success('Success', 'Login successfully');
            return redirect()->route('hotels'); // Berhasil
        }
        Alert::error('Failed', 'Login failed');
        return redirect()->route('login'); // gagal
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Alert::success('Success', 'Logout successfully');
        return redirect()->route('login');
    }

    
}
