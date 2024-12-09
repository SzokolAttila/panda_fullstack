<?php

use App\Http\Controllers\PandaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/pandas', [PandaController::class, "index"])->name("pandas.index");
Route::get('/pandas/{id}', [PandaController::class, "show"])->name("pandas.show");