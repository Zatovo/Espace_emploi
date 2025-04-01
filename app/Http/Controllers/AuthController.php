<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Enregistrement d'un utilisateur
    public function register(Request $request)
    {
        $validated = $request->validate([
            'role' => 'required|string|in:recruteur,candidat,admin', // Ajoute les rôles acceptés
            'name' => 'required|string',
            'lastname' => 'required|string',
            'tel' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'role' => $validated['role'],
            'name' => $validated['name'],
            'lastname' => $validated['lastname'],
            'tel' => $validated['tel'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        $token = $user->createToken('authToken')->plainTextToken;

        return response()->json([
            'message' => 'Utilisateur enregistré avec succès',
            'user' => $user,
            'token' => $token,
            'redirect_to' => $this->redirectPath($user) // Redirection en fonction du rôle
        ], 201);
    }

    // Connexion de l'utilisateur
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
    
        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Identifiants incorrects'], 401);
        }
    
        // 🔴 Forcer la récupération de l'utilisateur depuis la DB
        $user = User::where('email', $request->email)->first(); 
    
        if (!$user->role) {
            return response()->json([
                'message' => 'Rôle inconnu, contactez un administrateur',
                'user' => $user
            ], 403);
        }
    
        $token = $user->createToken('authToken')->plainTextToken;
    
        return response()->json([
            'message' => 'Connexion réussie',
            'user' => $user,
            'role' => $user->role, // Vérifie si le rôle est bien retourné
            'token' => $token,
            'redirect_to' => $this->redirectPath($user)
        ]);
    }

    // Récupération des informations de l'utilisateur authentifié
    public function profile(Request $request)
    {
        return response()->json([
            'user' => $request->user(),
        ]);
    }

    // Déconnexion
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json(['message' => 'Déconnexion réussie']);
    }

    // Fonction pour définir la redirection après connexion
    private function redirectPath($user)
    {
        if ($user->role === 'recruteur') {
            return '/dashboard/recruteur';
        } elseif ($user->role === 'candidat') {
            return '/dashboard/candidat';
        } elseif ($user->role === 'admin') {
            return '/admin/dashboard';
        }
        return '/home';
    }

    protected function redirectTo()
    {
        if (Auth::check()) {
            if (Auth::user()->role === 'candidat') {
                return '/dashboardCan';
            }
        }
        return '/home';
    }
}
