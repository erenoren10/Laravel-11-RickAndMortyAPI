<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\RMDataController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::controller(RMDataController::class)->group(function () {
    Route::get('/characters','getCharacters');
    Route::get('/episodes','getEpisodes');
    Route::get('/locations','getLocations');
    Route::get('/characters/{id}','getCharacter');
    Route::get('/locations/{id}','getLocation');
    Route::get('/episodes/{id}','getEpisode');
});