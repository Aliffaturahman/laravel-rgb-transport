<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function loginForm()
    {
        return view('admin.login');
    }
    
    public function login(Request $request)
    {
        $hardcodedUsers = [
            'admin01' => 'admin01',
            'admin02' => 'admin02'
        ];

        $username = $request->username;
        $password = $request->password;

        // Cek apakah username ada dan password sesuai
        if (array_key_exists($username, $hardcodedUsers)) {
            if ($password === $hardcodedUsers[$username]) {
                // Simpan username di session
                session(['username' => $username]);
                
                // Redirect ke halaman yang diinginkan
                return redirect()->route('admin.dashboard')->with('success', 'Login berhasil!');
            }
        }

        // Jika gagal
        return back()->withErrors([
            'username' => 'Username atau password salah!',
        ])->withInput($request->except('password'));
    }

    public function logout(Request $request)
    {
        session()->forget('username');
        return redirect('/admin/login')->with('success', 'Anda telah logout');
    }
}