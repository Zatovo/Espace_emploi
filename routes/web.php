<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OffreController;
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

Route::get('/', function () {
    return view('home');
})->middleware('auth')->name('home');

// Route::post('/logout', function () {
//     Auth::logout();
//     return redirect()->route('login'); // Redirige vers la page de login
// })->name('logout');

Route::get('/signup', function () {
    return view('auth.signup');
})->name('signup');

Route::post('/register', [AuthController::class, 'register'])->name('register');

// Route::get('/dashboardRecru', function () {
//     return view('dashboardRecru');
// })->name('dashboardRecru');

Route::resource('offres', OffreController::class)->middleware('auth');

Route::resource('candidatures', CandidatureController::class)->middleware('auth');

// Route::post('/store', [OffreController::class, 'store'])->name('store');
// Route::middleware(['auth', 'recruteur'])->group(function () {
//     Route::get('/dashboard/recruteur', [OffreController::class, 'offresRecruteur'])->name('dashboard.recru');
//     Route::post('/offres', [OffreController::class, 'store'])->name('offres.store');
//     Route::put('/offres/{id}', [OffreController::class, 'update'])->name('offres.update');
//     Route::delete('/offres/{id}', [OffreController::class, 'destroy'])->name('offres.destroy');
// });
// Route::middleware(['auth:sanctum'])->group(function () {
//     Route::get('/dashboard/recruteur', function () {
//         return view('dashboardRecru');
//     })->name('dashboard.recru');

//     Route::get('/dashboard/candidat', function () {
//         return view('dashboardCandidat');
//     })->name('dashboard.candidat');

// });

// Route::middleware('auth')->group(function () {
//     // Toutes les routes nécessitant une connexion
//     Route::resource('offres', OffreController::class);
// });

// Route::middleware('auth')->group(function () {
//     Route::get('/offres', [OffreController::class, 'index'])->name('offres.index');
//     Route::get('/offres/create', [OffreController::class, 'create'])->name('offres.create');
//     Route::post('/offres', [OffreController::class, 'store'])->name('offres.store');
//     Route::put('/offres/{id}', [OffreController::class, 'update'])->name('offres.update');
//     // Ajoute d'autres routes protégées ici si nécessaire
// });

// Route::middleware(['auth'])->group(function () {
//     Route::get('/dashboardCan', [CandidatureController::class, 'index'])->name('dashboardCan');
//     Route::post('/candidatures', [CandidatureController::class, 'store'])->name('candidatures.store');
//     Route::delete('/candidatures/{id}', [CandidatureController::class, 'destroy'])->name('candidatures.destroy');
// });
