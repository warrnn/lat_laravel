<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Error;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function register(Request $r)
    {
        $name = $r->name;
        $umur = $r->umur;
        $telp = $r->phone;
        $email = $r->email;
        $password = $r->password;

        $isAnggotaExist = Anggota::where('email', $email)->first();
        if ($isAnggotaExist) {
            return redirect()->route('login')->with('error', 'Akun Sudah Ada');
        } else {
            Anggota::create([
                'nama' => $name,
                'umur' => $umur,
                'telp' => $telp,
                'email' => $email,
                'password' => $password
            ]);

            $anggota = Anggota::where('email', $email)->first();

            $r->session()->put('anggota', $anggota);
            return redirect()->route('home')->with('success', 'Register Berhasil');
        }
    }

    public function login(Request $r)
    {
        try {
            $r->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);
        } catch (Error $e) {
            return redirect()->route('home')->with('error', $e->getMessage());
        }

        $email = $r->email;
        $password = $r->password;

        $isAnggotaExist = Anggota::where('email', $email)->first();
        if ($isAnggotaExist) {
            $anggotaPassword = $isAnggotaExist->password;
            if ($anggotaPassword == $password) {
                $r->session()->put('anggota', $isAnggotaExist);
                return redirect()->route('home')->with('success', 'Login Berhasil');
            } else {
                return redirect()->route('login')->with('error', 'Login Gagal');
            }
        } else {
            return redirect()->route('login')->with('error', 'Login Gagal');
        }
    }

    public function logout(Request $r)
    {
        $r->session()->invalidate();
        $r->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'Logout Berhasil');
    }
}
