<?php

namespace App\Http\Controllers;

use App\Models\Offre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OffreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Vérifie que l'utilisateur est connecté
        $this->middleware('recruteur')->only(['store', 'offresRecruteur', 'update', 'destroy']);
    }

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
        $request->validate([
            'date_limit' => 'required|date|after:today',
            'description' => 'required|string',
            'entreprise' => 'required|string|max:50',
            'contrat' => 'required|string|max:10',
        ]);

        $offre = Offre::create([
            'id_recru' => Auth::id(),
            'date_limit' => $request->date_limit,
            'description' => $request->description,
            'entreprise' => $request->entreprise,
            'contrat' => $request->contrat,
        ]);

        return redirect()->route('dashboard.recru')->with('success', 'Offre créée avec succès');
    }

    /**
     * Afficher les offres du recruteur connecté
     */
    public function offresRecruteur()
    {
        $offres = Offre::where('id_recru', Auth::id())->get();
        return view('dashboardRecru', compact('offres'));
    }

    /**
     * Modifier une offre
     */
    public function update(Request $request, $id)
    {
        $offre = Offre::where('id_recru', Auth::id())->findOrFail($id);

        $request->validate([
            'date_limit' => 'sometimes|date|after:today',
            'description' => 'sometimes|string',
            'entreprise' => 'sometimes|string|max:50',
            'contrat' => 'sometimes|string|max:10',
        ]);

        $offre->update($request->all());

        return redirect()->route('dashboard.recru')->with('success', 'Offre mise à jour avec succès');
    }

    /**
     * Supprimer une offre
     */
    public function destroy($id)
    {
        $offre = Offre::where('id_recru', Auth::id())->findOrFail($id);
        $offre->delete();

        return redirect()->route('dashboard.recru')->with('success', 'Offre supprimée avec succès');
    }
    public function dashboardRecruteur()
{
    // Vérifie si l'utilisateur est authentifié
    if (Auth::check()) {
        // Récupérer les offres du recruteur connecté
        $offres = Offre::where('recruteur_id', Auth::id())->get(); // Assure-toi de lier avec le bon champ

        return view('dashboardRecru', compact('offres')); // Passer les offres à la vue
    }

    // Rediriger si l'utilisateur n'est pas connecté
    return redirect()->route('login');
}



}
