<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CardsController;
use App\Http\Controllers\ColunasController;
use App\Http\Controllers\QuadrosController;
use App\Http\Controllers\ProfileController;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth'])->group(function () {
    //Quadros
    Route::get('/quadros', [QuadrosController::class,'index'])->name('quadros.index');
    Route::get('/quadros/create', [QuadrosController::class, 'create'])->name('quadros.create');
    Route::post('/quadros/create', [QuadrosController::class, 'store'])->name('quadros.store');
    Route::get('/quadros/{quadro}', [QuadrosController::class, 'show'])->name('quadros.show');
    Route::post('/quadros/{quadro}', [QuadrosController::class, 'show'])->name('quadros.show');
    Route::get('/quadros/{quadro}/edit', [QuadrosController::class, 'edit'])->name('quadros.edit');
    Route::patch('/quadros/{quadro}/edit', [QuadrosController::class, 'update'])->name('quadros.update');
    Route::delete('/quadros/delete/{quadro}', [QuadrosController::class, 'destroy'])->name('quadros.destroy');
    // Colunas
    Route::get('/colunas/create/{quadro_id}', [ColunasController::class, 'create'])->name('colunas.create');
    Route::post('/colunas/create/{quadro_id}', [ColunasController::class, 'store'])->name('colunas.store');
    Route::get('/colunas/{coluna}/edit', [ColunasController::class, 'edit'])->name('colunas.edit');
    Route::patch('/colunas/{coluna}/edit', [ColunasController::class, 'update'])->name('colunas.update');
    Route::delete('/colunas/delete/{coluna}', [ColunasController::class,'destroy'])->name('colunas.destroy');
    // Cards
    Route::get('/cards/create/{coluna_id}', [CardsController::class, 'create'])->name('cards.create');
    Route::post('/cards/create/{coluna_id}', [CardsController::class, 'store'])->name('cards.store');
    Route::get('/cards/{card}/edit/{quadro_id}', [CardsController::class, 'edit'])->name('cards.edit');
    Route::patch('/cards/{card}/edit/{quadro_id}', [CardsController::class, 'update'])->name('cards.update');
    Route::post('/cards/{card}/increment', [CardsController::class, 'increment'])->name('cards.increment');
    Route::post('/cards/{card}/decrement', [CardsController::class, 'decrement'])->name('cards.decrement');
    Route::delete('/cards/delete/{card}', [CardsController::class,'destroy'])->name('cards.destroy');
    //Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'logout'])->name('profile.logout');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';
