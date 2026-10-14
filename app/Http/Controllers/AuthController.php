<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Peserta;
use App\Models\Skema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            // Pengecekan role admin
            if ($user->role === 'admin') {
                return redirect()->route('dashboard');
            }

            // Disesuaikan dengan enum 'peserta' di database
            if ($user->role === 'peserta') {
                return redirect()->route('peserta.dashboard');
            }

            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return back()->withErrors([
                'email' => 'Role akun belum diatur.',
            ])->onlyInput('email');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function showRegister()
    {
        $skemas = Skema::orderBy('nama_skema')->get();

        return view('auth.register', compact('skemas'));
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'no_peserta' => ['required', 'string', 'max:255', 'unique:pesertas,no_peserta'],
            'nik' => ['required', 'string', 'max:255', 'unique:pesertas,nik'],
            'jenis_kelamin' => ['required', 'in:L,P'], // Disesuaikan dengan enum 'L','P' di database
            'no_telepon' => ['nullable', 'string', 'max:20'],
            'alamat' => ['nullable', 'string'],
            'skema_id' => ['required', 'exists:skemas,id'],
        ]);

        DB::transaction(function () use ($validated) {
            $user = new User();
            $user->name = $validated['name'];
            $user->email = $validated['email'];
            $user->password = Hash::make($validated['password']);
            $user->role = 'peserta'; // Disesuaikan dengan enum 'peserta'
            $user->save();

            $peserta = new Peserta();
            $peserta->user_id = $user->id;
            $peserta->no_peserta = $validated['no_peserta'];
            $peserta->nama = $validated['name'];
            $peserta->nik = $validated['nik'];
            $peserta->jenis_kelamin = $validated['jenis_kelamin'];
            $peserta->no_telepon = $validated['no_telepon'] ?? null;
            $peserta->alamat = $validated['alamat'] ?? null;
            $peserta->skema_id = $validated['skema_id'];
            $peserta->save();
        });

        return redirect()
            ->route('login')
            ->with('success', 'Pendaftaran berhasil. Silakan login.');
    }
}