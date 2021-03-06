<?php

use App\Http\Controllers\AbsenceController;
use App\Http\Controllers\AlerteController;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\PieceJointeController;
use App\Http\Controllers\StageController;
use App\Http\Controllers\StagiaireController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/authenticate', [AuthController::class, 'login']);
// Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('stagiaire', StagiaireController::class);
    Route::apiResource('stage', StageController::class);
    Route::apiResource('tache', TacheController::class);
    Route::apiResource('historique', HistoriqueController::class);
    // Route::apiResource('/alerte', AlerteController::class);
    Route::apiResource('absence', AbsenceController::class);
    // Route::apiResource('/piece-jointe', PieceJointeController::class);
});
