<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    function index(){
        return view('auth.index');
    }

    function registrasi(){
        return view('auth.registrasi');
    }

    function create(Request $request){
        $request->validate([
            'nama'      => 'required',
            'email'     => 'required|email|unique:users',
            'pass'      => 'required|confirmed|min:4',
            'pass_confirmation' => 'required'  
        ],[
            'nama.required'     => 'Nama harus diisi..',
            'email.required'    => 'Email harus diisi..',
            'email.email'       => 'Masukkan alamat email yang valid..',
            'email.unique'      => 'Email sudah terdaftar..',
            'pass.required'     => 'Password harus diisi..',
            'pass.confirmed'    => 'Konfirmasi password tidak sama..',
            'pass.min'          => 'Password minimal 4 karakter',
            'pass_confirmation.required'  => 'Konfirmasi password harus diisi..'
        ]);

        $data_registrasi = [
            'name'  => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->pass)
        ];

        User::create($data_registrasi);

        return redirect('/')->with('info', 'Registrasi berhasil, silahkan login..');
    }

    function login(Request $request){
        Session::flash('username', $request->username);

        $request->validate([
            'username'  => 'required',
            'password'  => 'required',
        ],[
            'username.required' => 'email harus diisi..',
            'password.required' => 'password harus diisi..',
        ]);

        $data_login = [
            'email'     => $request->username,
            'password'  => $request->password,
        ];

        if (Auth::attempt($data_login)) {
            return redirect('warga')->with('info', 'Anda berhasil login..');
        } else {
            return redirect('/')->withErrors('Email atau password tidak valid');
        }
    }

    function logout(){
        Auth::logout();
        return redirect('/')->with('info', "Anda telah logout..");
    }
}
