<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlaceController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/places/', [PlaceController::class, 'api1'])->name('places');
Route::get('/places/{detail}', [PlaceController::class, 'details'])->name('places.details');
