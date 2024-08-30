<?php

use App\Http\Controllers\CinetPayController;
use App\Http\Controllers\LiquideController;
use App\Http\Controllers\MenageController;
use App\Http\Controllers\OrdureController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\PolitiqueController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SecteurController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TariffController;
use App\Http\Controllers\MenageExportController;
use App\Http\Controllers\Auth\GoogleAuthController;


use App\Http\Controllers\PaiementController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::get('auth/google', [GoogleAuthController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback']);

Route::middleware('auth')->group(function () {

    Route::resource('personnels', PersonnelController::class);
    Route::resource('menages', MenageController::class);
    Route::resource('ordures', OrdureController::class);
    Route::resource('politiques', PolitiqueController::class);
    // Route::resource('liquides', LiquideController::class);
    Route::resource('secteurs', SecteurController::class);
    Route::resource('tariffs', TariffController::class);
    Route::resource('services', ServiceController::class);
    // Route::resource('paiements', PaiementController::class);

    Route::get('/liquides/create/{menageId}', [LiquideController::class, 'create'])->name('liquides.create');
    Route::post('/liquides/store', [LiquideController::class,'store'])->name('liquides.store');



    Route::post('/paiements/store', [PaiementController::class, 'store'])->name('paiements.store');
    Route::get('/paiements/create/{menageId}', [PaiementController::class, 'create'])->name('paiements.create');
<<<<<<< HEAD

=======
>>>>>>> 0690e4f (fin de liquide et reçu en cours)

    
    Route::get('/menage', [MenageExportController::class, 'export'])->name('menages.export');
    // Route::get('/menage', [MenageExportController::class, 'exportPdf'])->name('menages.pdf');

    Route::get('/payment', [CinetPayController::class, 'showPaymentForm'])->name('cinetpay.payment');

    Route::post('/payment/process', [CinetPayController::class, 'processPayment'])->name('cinetpay.process');

    Route::get('/payment/callback', [CinetPayController::class, 'callback'])->name('cinetpay.callback');

    Route::post('/payment/notify', [CinetPayController::class, 'notify'])->name('cinetpay.notify');






    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
