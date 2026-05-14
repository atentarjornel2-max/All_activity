<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

Route::get('/items', [ItemController::class, 'index']);
Route::get('/items/{id}', [ItemController::class, 'show']);

Route::get('/add', [ItemController::class, 'create']);
Route::post('/add', [ItemController::class, 'store']);

Route::get('/items/{id}/edit', [ItemController::class, 'edit']);
Route::post('/items/{id}/update', [ItemController::class, 'update']);

Route::post('/vote/{id}', [ItemController::class, 'vote']);

Route::delete('/items/{id}', [ItemController::class, 'destroy']);
