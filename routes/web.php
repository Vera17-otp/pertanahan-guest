<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PertanahanguestController;
use App\Http\Controllers\GuestUserController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\PersilController;


Route::prefix('guest')->group(function () {
    Route::resource('user', GuestUserController::class, ['as' => 'guest']);
});



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
    Route::get('/edit/{persil}', [PersilController::class, 'edit'])->name('persil.edit');
    Route::put('/{persil}', [PersilController::class, 'update'])->name('persil.update');
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
