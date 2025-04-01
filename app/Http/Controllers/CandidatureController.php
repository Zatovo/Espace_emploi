<?php

namespace App\Http\Controllers;

use App\Models\Candidature;
use App\Models\Offre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidatureController extends Controller
{
    // Affiche les offres et l'historique des candidatures du candidat connecté
    public function index()
    {
        $offres = Offre::all();
        $candidatures = Candidature::where('id_cand', Auth::id())->get();

        return view('dashboardCan', compact('offres', 'candidatures'));
    }

    // Stocke une nouvelle candidature
    public function store(Request $request)
    {
        $request->validate([
            'offre_id' => 'required|exists:offres,id',
            'cv' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'lm' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'adresse' => 'required|string',
            'niveau' => 'required|string',
            'exp' => 'required|string',
            'date_naiss' => 'required|date',
        ]);

        $cvPath = $request->file('cv')->store('cvs');
        $lmPath = $request->file('lm') ? $request->file('lm')->store('lettres') : null;

        Candidature::create([
            'id_cand' => Auth::id(),
            'cv' => $cvPath,
            'lm' => $lmPath,
            'adresse' => $request->adresse,
            'niveau' => $request->niveau,
            'exp' => $request->exp,
            'date_naiss' => $request->date_naiss,
        ]);

        return redirect()->route('dashboard.candidat')->with('success', 'Candidature envoyée avec succès !');
    }
}
