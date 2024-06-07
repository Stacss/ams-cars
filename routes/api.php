<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('/cars', [CarController::class, 'index']);
Route::get('/cars/1', [CarController::class, 'getOldCars']);
Route::get('/cars/new', [CarController::class, 'currentCarsWithExpensiveWorks']);
