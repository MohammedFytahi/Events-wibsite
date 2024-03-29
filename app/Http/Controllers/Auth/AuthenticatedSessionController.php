<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Authentifier l'utilisateur
        $request->authenticate();

        // Régénérer la session
        $request->session()->regenerate();

        // Vérifier si l'utilisateur est bloqué
        if ($request->user()->isBlocked()) {
            // Déconnecter l'utilisateur et rediriger avec un message d'erreur
            Auth::logout();
            return redirect()->route('login')->with('error', 'Votre compte est bloqué. Veuillez contacter l\'administrateur.');
        }

        // Rediriger l'utilisateur en fonction de son rôle
        $url = '';
        if ($request->user()->role === 'admin') {
            $url = 'admin/dashboard';
        } elseif ($request->user()->role === 'organisateur') {
            $url = 'organisation/dashboard';
        } elseif ($request->user()->role === 'utilisateur') {
            $url = '/evnts';
        }

        return redirect()->intended($url);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

