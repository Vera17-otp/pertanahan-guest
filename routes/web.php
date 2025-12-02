<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PertanahanguestController;
use App\Http\Controllers\GuestUserController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\PersilController;
use App\Http\Controllers\PetaPersilController;


Route::prefix('guest')->group(function () {
    Route::resource('user', GuestUserController::class, ['as' => 'guest']);
});

Route::resource('persil', PersilController::class);


Route::get('/login', [AuthController::class, 'index'])->name('login');


Route::prefix('guest')->group(function () {
    Route::get('/pertanahan', [PertanahanguestController::class, 'index'])->name('pertanahanguest.index');
    Route::get('/pertanahan/create', [PertanahanguestController::class, 'create'])->name('pertanahanguest.create');
    Route::post('/pertanahan', [PertanahanguestController::class, 'store'])->name('pertanahanguest.store');
    Route::get('/pertanahan/{dokumen_persil}/edit', [PertanahanguestController::class, 'edit'])->name('pertanahanguest.edit');
    Route::put('/pertanahan/{dokumen_persil}', [PertanahanguestController::class, 'update'])->name('pertanahanguest.update');
    Route::delete('/pertanahan/{id}', [PertanahanguestController::class, 'destroy'])->name('pertanahanguest.destroy');
});



Route::prefix('persil')->group(function () {
    Route::get('/', [PersilController::class, 'index'])->name('persil.index');
    Route::get('/create', [PersilController::class, 'create'])->name('persil.create');
    Route::post('/', [PersilController::class, 'store'])->name('persil.store');
    Route::get('/edit/{persil_id}', [PersilController::class, 'edit'])->name('persil.edit');
    Route::put('/{persil_id}', [PersilController::class, 'update'])->name('persil.update');
    Route::delete('/{id}', [PersilController::class, 'destroy'])->name('persil.destroy');
});


Route::prefix('warga')->group(function (){
    Route::get('/warga', [WargaController::class, 'index'])->name('warga.index');
    Route::get('/warga/create', [WargaController::class, 'create'])->name('warga.create');
    Route::post('/warga', [WargaController::class, 'store'])->name('warga.store');
    Route::get('/warga/edit/{warga}', [WargaController::class, 'edit'])->name('warga.edit');
    Route::put('/warga/{warga}', [WargaController::class, 'update'])->name('warga.update');
    Route::delete('/warga/{id}', [WargaController::class, 'destroy'])->name('warga.destroy');
});

Route::prefix('user')->group(function (){
    Route::get('/user', [GuestUserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [GuestUserController::class, 'create'])->name('user.create');
    Route::post('/user', [GuestUserController::class, 'store'])->name('user.store');
    Route::get('/user/edit/{user}', [GuestUserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{user}', [GuestUserController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}', [GuestUserController::class, 'destroy'])->name('user.destroy');
});

Route::prefix('peta_persil')->group(function () {
    Route::get('/', [PetaPersilController::class, 'index'])->name('peta_persil.index');
    Route::get('/create', [PetaPersilController::class, 'create'])->name('peta_persil.create');
    Route::post('/', [PetaPersilController::class, 'store'])->name('peta_persil.store');
    Route::get('/edit/{id}', [PetaPersilController::class, 'edit'])->name('peta_persil.edit');
    Route::put('/{id}', [PetaPersilController::class, 'update'])->name('peta_persil.update');
    Route::delete('/{id}', [PetaPersilController::class, 'destroy'])->name('peta_persil.destroy');
});


Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



Route::get('/', [PertanahanGuestController::class, 'index'])->name('datapertanahan');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

Route::get('/user', [UserController::class, 'index'])->name('user');
