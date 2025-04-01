<?php

namespace App\Http\Controllers;

use App\Models\Offre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OffreController extends Controller
{
    // Afficher la liste des offres créées par le recruteur
    public function index()
    {
          // Récupérer les offres créées par le recruteur connecté
    $offres = Offre::where('id_recru', Auth::id())->with('candidatures')->get();

    // Envoyer les données à la vue
    return view('dashboardRecru', compact('offres'));
    }
    public function create()
{
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Vous devez être connecté pour créer une offre.');
    }

    return view('offres.create');
}

    // Créer une nouvelle offre
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string',
            'date_limit' => 'required|date',
            'entreprise' => 'required|string',
            'contrat' => 'required|string',
        ]);

        Offre::create([
            'description' => $request->description,
            'date_limit' => $request->date_limit,
            'entreprise' => $request->entreprise,
            'contrat' => $request->contrat,
            'id_recru' => Auth::id(),
        ]);

        return redirect()->route('dashboard.recruteur')->with('success', 'Offre créée avec succès !');
    }

    // Supprimer une offre
    public function destroy($id)
    {
        $offre = Offre::where('id_recru', Auth::id())->findOrFail($id);
        $offre->delete();

        return redirect()->route('dashboard.recruteur')->with('success', 'Offre supprimée.');
    }

    public function dashboardRecru()
{
    $user = Auth::user();

    if (!$user || $user->role !== 'Recruteur') {
        return redirect()->route('login')->with('error', 'Accès non autorisé.');
    }

    $offres = Offre::where('id_recru', $user->id)->get(); 

    return view('dashboardRecru', compact('offres'));
}
}
