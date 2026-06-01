<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Karyawan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function create(): View
    {
        return view('Login');
    }

    public function store(LoginRequest $request): RedirectResponse
    {
        $loginId = $request->input('email');
        $user = Karyawan::where('Email', $loginId)->orWhere('Nama', $loginId)->first();

        if ($user && ! $user->status) {
            return back()
                ->withErrors(['email' => 'Akun Anda telah dinonaktifkan.'])
                ->onlyInput('email');
        }

        if (! $this->attemptLogin($request, $user)) {
            return back()
                ->withErrors(['email' => 'Email/Username atau password salah.'])
                ->onlyInput('email');
        }

        $request->session()->regenerate();

        return redirect()->intended(route('dashboard'));
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    private function attemptLogin(LoginRequest $request, ?Karyawan $user): bool
    {
        if (! $user) {
            return false;
        }

        $credentials = [
            'Email' => $user->Email,
            'password' => $request->input('password'),
            'status' => true,
        ];

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            if (strtolower(Auth::user()->Role) !== 'admin') {
                Auth::logout();

                return false;
            }

            return true;
        }

        return false;
    }
}
