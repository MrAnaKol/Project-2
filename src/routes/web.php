<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index']);

// Developer routes
Route::get('/developers', [DeveloperController::class, 'list']);
Route::get('/developers/create', [DeveloperController::class, 'create']);
Route::post('/developers/put', [DeveloperController::class, 'put']);
Route::get('/developers/update/{developer}', [DeveloperController::class, 'update']);
Route::post('/developers/patch/{developer}', [DeveloperController::class, 'patch']);
Route::post('/developers/delete/{developer}', [DeveloperController::class, 'delete']);

// Game routes
Route::get('/games', [GameController::class, 'list']);
Route::get('/games/create', [GameController::class, 'create']);
Route::post('/games/put', [GameController::class, 'put']);
Route::get('/games/update/{game}', [GameController::class, 'update']);
Route::post('/games/patch/{game}', [GameController::class, 'patch']);
Route::post('/games/delete/{game}', [GameController::class, 'delete']);

// Auth routes
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/auth', [AuthController::class, 'authenticate']);
Route::get('/logout', [AuthController::class, 'logout']);

// Genre routes
Route::get('/genres', [GenreController::class, 'list']);
Route::get('/genres/create', [GenreController::class, 'create']);
Route::post('/genres/put', [GenreController::class, 'put']);
Route::get('/genres/update/{genre}', [GenreController::class, 'update']);
Route::post('/genres/patch/{genre}', [GenreController::class, 'patch']);
Route::post('/genres/delete/{genre}', [GenreController::class, 'delete']);

// Data routes
Route::prefix('data')->group(function () {
    Route::get('/get-top-games', [DataController::class, 'getTopGames']);
    Route::get('/get-game/{game}', [DataController::class, 'getGame']);
    Route::get('/get-related-games/{game}', [DataController::class, 'getRelatedGames']);
});