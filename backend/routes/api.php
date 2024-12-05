<?php

use App\Http\Controllers\PandaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/pandas', [PandaController::class, "index"])->name("pandas.index")->middleware('auth:sanctum');
Route::get('/pandas/{id}', [PandaController::class, "show"])->name("pandas.show")->middleware('auth:sanctum');
