<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidature;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CandidatureController extends Controller
{
    // Vérifie que seul un candidat peut accéder à ces routes
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!Auth::check() || !Auth::user()->hasRole('candidat')) {
                abort(403, 'Accès non autorisé');
            }
            return $next($request);
        });
    }

    // Afficher la page du dashboard avec les candidatures
    public function index()
    {
        $candidatures = Candidature::where('id_cand', Auth::id())->get();
        return view('dashboardCan', compact('candidatures'));
    }

    // Enregistrer une candidature
    public function store(Request $request)
    {
        $request->validate([
            'cv' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'lm' => 'required|string',
            'adresse' => 'required|string',
            'niveau' => 'required|string',
            'exp' => 'nullable|string',
            'date_naiss' => 'required|date',
        ]);

        // Upload du CV
        $cvPath = $request->file('cv')->store('cvs', 'public');

        Candidature::create([
            'id_cand' => Auth::id(),
            'cv' => $cvPath,
            'lm' => $request->lm,
            'adresse' => $request->adresse,
            'niveau' => $request->niveau,
            'exp' => $request->exp,
            'date_naiss' => $request->date_naiss,
        ]);

        return redirect()->route('dashboardCan')->with('success', 'Candidature envoyée avec succès.');
    }

    // Supprimer une candidature
    public function destroy($id)
    {
        $candidature = Candidature::where('id_cand', Auth::id())->findOrFail($id);

        // Supprimer le fichier CV
        if ($candidature->cv) {
            Storage::disk('public')->delete($candidature->cv);
        }

        $candidature->delete();

        return redirect()->route('dashboardCan')->with('success', 'Candidature supprimée.');
    }
}
