<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;
use App\Mail\SeriesCreated;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', [SeriesController::class, 'index'])->middleware(['auth'])->name('dashboard');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::get('/email', function() {
    return new SeriesCreated('Série de teste', 1, 5, 10);
});

require __DIR__.'/auth.php';
