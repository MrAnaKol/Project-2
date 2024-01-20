<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\GameController;
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