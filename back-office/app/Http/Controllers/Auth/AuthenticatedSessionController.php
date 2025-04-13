<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthenticatedSessionController extends Controller
{
    /**
     * Show the login form.
     */
    public function create()
    {
        return view('login'); // resources/views/login.blade.php
    }

    /**
     * Handle the login submission.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');

        // Check hardcoded password
        if ($credentials['password'] !== 'password123') {
            return redirect()->route('login')->withErrors([
                'password' => 'Mot de passe incorrect.'
            ])->withInput();
        }

        // Check if email exists
        $user = User::where('email', $credentials['email'])->first();

        if (!$user) {
            return redirect()->route('login')->withErrors([
                'email' => 'Adresse email introuvable.'
            ])->withInput();
        }

        // Log the user in
        Auth::login($user);
        $request->session()->regenerate();

        // Redirect to admin panel if user is authorized
        if ($user->is_admin) {
            return redirect()->route('admin.panel'); // admin.panel → panel.blade.php
        }

        // Else, send to basic dashboard
        return redirect('/dashboard');
    }

    /**
     * Logout the user.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
