<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Email atau password salah.');
        }

        if ($user->status !== 'aktif') {
            return back()->with('error', 'Akun tidak aktif.');
        }

        session([
            'user_id' => $user->id_user,
            'user_nama' => $user->nama,
            'user_email' => $user->email,
            'role_id' => $user->role_id,
        ]);

        return redirect('/dashboard');
    }

    public function logout()
    {
        session()->flush();

        return redirect('/login');
    }
}