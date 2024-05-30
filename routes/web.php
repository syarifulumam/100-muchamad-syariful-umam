<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VisitController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('links', App\Http\Controllers\LinkController::class);
});

require __DIR__.'/auth.php';



// Route::resource('themes', App\Http\Controllers\ThemeController::class)->only('index', 'edit', 'update');

Route::post('/visit/{link}', [VisitController::class,'store'])->name('visit.store');

Route::get('/{user:username}', [ProfileController::class, 'index'])->name('profile.index');