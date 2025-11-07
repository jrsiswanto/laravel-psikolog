<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArtikelController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\InfografisController;

// route public

Route::get('/', function () {return view('index');})->name('home');
//view konsultasi
Route::view('/konsultasi', 'fitur.konsultasi');

//masih jadi satu
//view artikel
Route::resource('artikel',ArtikelController::class);
//video video
Route::resource('video', VideoController::class);
//route infografis
Route::resource('infografis',InfografisController::class);   
//route tanya jawab
Route::resource('tanya-jawab', \App\Http\Controllers\TanyaJawabController::class);

// route breeze
Route::middleware('auth')->group(function () {

    // Profile routes breeze
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
