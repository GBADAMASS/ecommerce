<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    public function login()
    {
        return view('client.login');
    }

    public function loginPost(Request $request)
    {
        try {
            // Validation des données
            $validated = $request->validate([
                'email' => 'required|string|email',
                'password' => 'required|string',
            ]);

            // Tentative d'authentification
            if (Auth::attempt([
                'email' => $validated['email'],
                'password' => $validated['password']
            ], $request->filled('remember'))) {
                $request->session()->regenerate();

                // Redirection selon le rôle
                $user = Auth::user()->load('role');
                if ($user->role && $user->role->libelle === 'ADMIN') {
                    return redirect()->route('admin.dashboard')
                        ->with('success', 'Connexion réussie! Bienvenue administrateur.');
                }

                return redirect()->route('dashboard')
                    ->with('success', 'Connexion réussie! Bienvenue ' . $user->prenom . '.');
            }

            return back()->withInput()
                ->with('error', 'Les identifiants fournis sont incorrects.');
        } catch (\Exception $e) {
            return back()->withInput()
                ->with('error', 'Une erreur est survenue : ' . $e->getMessage());
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('client.login')
            ->with('success', 'Vous avez été déconnecté avec succès.');
    }

    public function dashboard()
    {
        $user = Auth::user()->load('role');
        return view('client.dashboard', compact('user'));
    }

    public function register()
    {
        return view('client.register');
    }

    public function registerPost(Request $request)
    {
        try {
            // Validation des données
            $validated = $request->validate([
                'nom' => 'required|string|max:255',
                'prenom' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
            ]);

            // Création du nouvel utilisateur
            $user = new \App\Models\User();
            $user->nom = $validated['nom'];
            $user->prenom = $validated['prenom'];
            $user->email = $validated['email'];
            $user->password = bcrypt($validated['password']);
            $user->role_id = 2; // ID pour le rôle "CLIENT"

            if($user->save()) {
                return redirect()->route('client.login')
                    ->with('success', 'Inscription réussie! Vous pouvez maintenant vous connecter.');
            }

            return back()->withInput()
                ->with('error', 'Une erreur est survenue lors de l\'enregistrement.');
        } catch (\Exception $e) {
            return back()->withInput()
                ->with('error', 'Une erreur est survenue : ' . $e->getMessage());
        }
    }
}
