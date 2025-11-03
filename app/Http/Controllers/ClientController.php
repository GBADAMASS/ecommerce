<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function login()
    {
        return view('client.login');
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
