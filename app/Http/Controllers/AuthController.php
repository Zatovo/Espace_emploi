<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Inscription d'un utilisateur
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'role' => 'required|in:recruteur,candidat',
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'tel' => 'required|string|max:15',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'role' => $validated['role'],
            'nom' => $validated['nom'],
            'prenom' => $validated['prenom'],
            'tel' => $validated['tel'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return response()->json([
            'message' => 'Inscription réussie',
            'user' => $user
        ], 201);
    }

    /**
     * Connexion d'un utilisateur
     */
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $validated['email'])->first();

        if (!$user || !Hash::check($validated['password'], $user->password)) {
            return response()->json(['message' => 'Email ou mot de passe incorrect'], 401);
        }

        Auth::login($user); // Authentifier l'utilisateur dans la session

        return response()->json([
            'message' => 'Connexion réussie',
            'user' => $user,
            'token' => $user->createToken('auth_token')->plainTextToken,
            'role' => $user->role
        ]);
    }

    /**
     * Déconnexion d'un utilisateur
     */
    public function logout(Request $request)
    {
        if ($request->user()) {
            $request->user()->tokens()->delete();
            Auth::logout(); // Détruire la session Laravel aussi

            return response()->json([
                'message' => 'Déconnexion réussie'
            ]);
        }

        return response()->json(['message' => 'Aucun utilisateur authentifié'], 400);
    }

    /**
     * Récupérer l'utilisateur authentifié
     */
    public function me(Request $request)
    {
        return response()->json($request->user());
    }
}
