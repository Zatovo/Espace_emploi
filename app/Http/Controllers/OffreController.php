<?php

namespace App\Http\Controllers;

use App\Models\Offre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OffreController extends Controller
{
    /**
     * Afficher toutes les offres
     */
    public function index()
    {
        $offres = Offre::with('user')->get();
        return response()->json($offres);
    }

    /**
     * Créer une nouvelle offre (réservé aux recruteurs)
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        if ($user->role !== 'recruteur') {
            return response()->json(['message' => 'Accès refusé. Seuls les recruteurs peuvent créer des offres.'], 403);
        }

        $request->validate([
            'date_limit' => 'required|date|after:today',
            'description' => 'required|string',
            'entreprise' => 'required|string|max:50',
            'contrat' => 'required|string|max:10',
        ]);

        $offre = Offre::create([
            'id_recru' => $user->id,
            'date_limit' => $request->date_limit,
            'description' => $request->description,
            'entreprise' => $request->entreprise,
            'contrat' => $request->contrat,
        ]);

        return response()->json(['message' => 'Offre créée avec succès', 'offre' => $offre], 201);
    }

    /**
     * Récupérer les offres d’un recruteur spécifique
     */
    public function offresRecruteur()
    {
        $user = Auth::user();

        if ($user->role !== 'recruteur') {
            return response()->json(['message' => 'Accès refusé'], 403);
        }

        $offres = Offre::where('id_recru', $user->id)->get();
        return response()->json($offres);
    }

    /**
     * Modifier une offre (réservé au recruteur qui l’a créée)
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $offre = Offre::find($id);

        if (!$offre || $offre->id_recru !== $user->id) {
            return response()->json(['message' => 'Offre introuvable ou accès refusé'], 403);
        }

        $request->validate([
            'date_limit' => 'sometimes|date|after:today',
            'description' => 'sometimes|string',
            'entreprise' => 'sometimes|string|max:50',
            'contrat' => 'sometimes|string|max:10',
        ]);

        $offre->update($request->all());
        return response()->json(['message' => 'Offre mise à jour avec succès', 'offre' => $offre]);
    }

    /**
     * Supprimer une offre (réservé au recruteur qui l’a créée)
     */
    public function destroy($id)
    {
        $user = Auth::user();
        $offre = Offre::find($id);

        if (!$offre || $offre->id_recru !== $user->id) {
            return response()->json(['message' => 'Offre introuvable ou accès refusé'], 403);
        }

        $offre->delete();
        return response()->json(['message' => 'Offre supprimée avec succès']);
    }
}
