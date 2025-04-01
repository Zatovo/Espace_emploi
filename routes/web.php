<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OffreController;
use App\Http\Controllers\RecruteurController;
use App\Http\Controllers\CandidatureController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Page de connexion
Route::get('/', function () {
    return view('login');
})->name('login');

// Déconnexion
Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('login'); // Redirige vers la page de login
})->name('logout');

// Page d'inscription
Route::get('/signup', function () {
    return view('signup');
})->name('signup');

// Dashboard Recruteur
Route::get('/dashboardRecru', function () {
    return view('dashboardRecru');
})->name('dashboardRecru');

// Inscription et connexion
Route::post('/register', [AuthController::class, 'register'])->name('register');

// Routes accessibles uniquement aux utilisateurs authentifiés
Route::middleware(['auth'])->group(function () {
    Route::resource('offres', OffreController::class);
    Route::get('/dashboardCan', [CandidatureController::class, 'index'])->name('dashboard.candidat');
    Route::post('/candidatures', [CandidatureController::class, 'store'])->name('candidature.store');
});

// Routes spécifiques aux recruteurs
Route::middleware(['auth', 'recruteur'])->group(function () {
    Route::get('/offres/create', [OffreController::class, 'create'])->name('offres.create')->middleware('auth');
    Route::get('/dashboard/recruteur', [OffreController::class, 'index'])->name('dashboard.recruteur');
    Route::post('/offres', [OffreController::class, 'store'])->name('offres.store');
    Route::delete('/offres/{id}', [OffreController::class, 'destroy'])->name('offres.destroy');
});
use Illuminate\Support\Facades\Session;

Route::get('/test-auth', function () {
    return Auth::user() ?? 'Non connecté';
});
Route::get('/test-login', function () {
    $user = \App\Models\User::first(); // Récupère le premier utilisateur
    Auth::login($user); // Connecte cet utilisateur
    return redirect('/test-auth');
});


