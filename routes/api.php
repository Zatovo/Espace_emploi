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


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::post('/store', [OffreController::class, 'store']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

// Afficher toutes les offres
Route::get('/offres', [OffreController::class, 'index']);

// Créer une nouvelle offre (réservé aux recruteurs)
Route::post('/offres', [OffreController::class, 'store'])->middleware('auth:sanctum');

// Récupérer les offres d’un recruteur spécifique
Route::get('/offres/recruteur', [OffreController::class, 'offresRecruteur'])->middleware('auth:sanctum');

// Modifier une offre
Route::put('/offres/{id}', [OffreController::class, 'update'])->middleware('auth:sanctum');

// Supprimer une offre
Route::delete('/offres/{id}', [OffreController::class, 'destroy'])->middleware('auth:sanctum');

