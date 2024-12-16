<?php

use App\Http\Controllers\PandaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/pandas', [PandaController::class, "index"])->name("pandas.index");
Route::get('/pandas/{id}', [PandaController::class, "show"])->name("pandas.show")->whereNumber("id");
Route::post("/pandas", [PandaController::class, "store"])->name("pandas.store");
Route::delete("/pandas/{id}", [PandaController::class, "destroy"])->name("pandas.destroy")->whereNumber("id");