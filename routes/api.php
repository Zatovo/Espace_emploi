<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OffreController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/offres', [OffreController::class, 'store']); // Créer une offre
    Route::get('/offres', [OffreController::class, 'index']); // Voir toutes les offres
    Route::get('/offres/recruteur', [OffreController::class, 'offresRecruteur']); // Offres du recruteur connecté
    Route::put('/offres/{id}', [OffreController::class, 'update']); // Modifier une offre
    Route::delete('/offres/{id}', [OffreController::class, 'destroy']); // Supprimer une offre
});

