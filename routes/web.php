<?php

use App\Http\Controllers\LiquideController;
use App\Http\Controllers\MenageController;
use App\Http\Controllers\OrdureController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\PolitiqueController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SecteurController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TariffController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::resource('personnels',PersonnelController::class);
    Route::resource('menages',MenageController::class);
    Route::resource('ordures',OrdureController::class);
    Route::resource('politiques',PolitiqueController::class);
    Route::resource('liquides',LiquideController::class);
    Route::resource('secteurs',SecteurController::class);
    Route::resource('tariffs',TariffController::class);
    Route::resource('services',ServiceController::class);






    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
