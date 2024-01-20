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
Route::get('/developers/update/{author}', [DeveloperController::class, 'update']);
Route::post('/developers/patch/{author}', [DeveloperController::class, 'patch']);
Route::post('/developers/delete/{author}', [DeveloperController::class, 'delete']);
// Game routes
Route::get('/books', [GameController::class, 'list']);
Route::get('/books/create', [GameController::class, 'create']);
Route::post('/books/put', [GameController::class, 'put']);
Route::get('/books/update/{book}', [GameController::class, 'update']);
Route::post('/books/patch/{book}', [GameController::class, 'patch']);
Route::post('/books/delete/{book}', [GameController::class, 'delete']);