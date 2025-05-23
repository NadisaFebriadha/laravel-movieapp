<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MovieController;

Route::get('/', function () {
    return redirect()->route('movies.index');
});
Route::resource('movies', MovieController::class);

Route::post('/movies/{movie}/like', [MovieController::class, 'like'])->name('movies.like');
Route::post('/movies/{id}/dislike', [MovieController::class, 'dislike'])->name('movies.dislike');