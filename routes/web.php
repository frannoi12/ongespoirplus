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
use App\Http\Controllers\MobileMoneyController;
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
    // Route::get('/menage', [MenageExportController::class, 'exportPdf'])->name('menages.pdf');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::middleware(['auth','admin'])->group(function(){
    Route::resource('personnels', PersonnelController::class);
    Route::resource('menages', MenageController::class);
    Route::resource('ordures', OrdureController::class);
    Route::resource('politiques', PolitiqueController::class);
    // Route::resource('liquides', LiquideController::class);
    Route::resource('secteurs', SecteurController::class);
    Route::resource('tariffs', TariffController::class);
    Route::resource('services', ServiceController::class);
    // Route::resource('paiements', PaiementController::class);

    Route::get('/liquides/create', [LiquideController::class, 'create'])->name('liquides.create_or_update');
    Route::post('/liquides/store', [LiquideController::class,'store'])->name('liquides.store');
    Route::get('/liquide/{id}', [LiquideController::class, 'show'])->name('liquides.show');
    Route::get('/liquides/pdf/{id}', [LiquideController::class, 'generatePdf'])->name('pdf.generate');
    Route::put('/liquides/{id}', [LiquideController::class, 'update'])->name('liquides.update');
    Route::get('/liquides/{id}/edit', [LiquideController::class, 'edit'])->name('liquides.edit');


    Route::get('/mobileMoneys/create', [MobileMoneyController::class, 'create'])->name('mobiles.create_or_update');
    Route::post('/mobileMoneys/store', [MobileMoneyController::class,'store'])->name('mobiles.store');
    Route::get('/mobileMoney/{id}', [MobileMoneyController::class, 'show'])->name('mobiles.show');
    Route::get('/mobilMoneys/pdf/{id}', [MobileMoneyController::class, 'generatePdf'])->name('pdf_ligne.generate');
    Route::put('/mobilMoneys/{id}', [MobileMoneyController::class, 'update'])->name('mobiles.update');
    Route::get('/mobilMoneys/{id}/edit', [MobileMoneyController::class, 'edit'])->name('mobiles.edit');




    Route::post('/paiements/store', [PaiementController::class, 'store'])->name('paiements.store');
    Route::get('/paiements/create/{menageId}', [PaiementController::class, 'create'])->name('paiements.create');


    Route::get('/menage', [MenageExportController::class, 'export'])->name('menages.export');
});


Route::middleware(['auth','client'])->group(function(){

    Route::post('/paiements/store', [PaiementController::class, 'store'])->name('paiements.store');

    Route::get('/paiements/create/{menageId}', [PaiementController::class, 'createMenageLigne'])->name('paiements.create');

    Route::get('/payment', [CinetPayController::class, 'showPaymentForm'])->name('cinetpay.payment');

    Route::post('/payment/process', [CinetPayController::class, 'processPayment'])->name('cinetpay.process');

    Route::get('/payment/callback', [CinetPayController::class, 'callback'])->name('cinetpay.callback');

    Route::post('/payment/notify', [CinetPayController::class, 'notify'])->name('cinetpay.notify');


    Route::get('/mobileMoneys/create', [MobileMoneyController::class, 'createEnligne'])->name('mobiles.create_or_update');
});




// Route::prefix('menages')->group(function () {
//     Route::get('/', [MenageController::class, 'indexGrid'])->name('menage.index');
//     Route::get('/L',[MenageController::class,'indexList'])->name('menage.index.list');
//     Route::get('/create', [MenageController::class, 'create'])->name('menage.create');
//     Route::post('/save', [MenageController::class, 'store'])->name('menage.store');
//     Route::delete('/delete/{menage}', [MenageController::class, 'destroy'])->name('menage.delete');
//     Route::get('/edit/{menage}', [MenageController::class, 'edit'])->name('menage.edit');
//     Route::get('/show/{menage}', [MenageController::class, 'show'])->name('menage.show');
//     Route::patch('/update/{menage}', [MenageController::class, 'update'])->name('menage.update');
// });
