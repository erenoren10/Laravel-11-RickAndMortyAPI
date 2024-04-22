<?php

use Illuminate\Support\Facades\Route;
use App\Services\RickAndMortyAPIService;
use App\Http\Controllers\CharacterController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\LocationController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/character', [CharacterController::class, 'index']);
Route::get('/episode', [EpisodeController::class, 'index']);
Route::get('/location', [LocationController::class, 'index']);