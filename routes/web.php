<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PertanahanController;
use App\Http\Controllers\PertanahanguestController;

Route::prefix('guest')->group(function () {
    Route::get('/pertanahan', [PertanahanguestController::class, 'index'])->name('pertanahanguest.index');
    Route::get('/pertanahan/create', [PertanahanguestController::class, 'create'])->name('pertanahanguest.create');
    Route::post('/pertanahan', [PertanahanguestController::class, 'store'])->name('pertanahanguest.store');
    Route::get('/pertanahan/{id}/edit', [PertanahanGuestController::class, 'edit'])->name('pertanahanguest.edit');
    Route::put('/pertanahan/{id}', [PertanahanGuestController::class, 'update'])->name('pertanahanguest.update');

    Route::delete('pertanahan/hapus/{id}', [PertanahanguestController::class, 'destroy'])->name('pertanahan.destroy');
});



Route::get('/index', function (){
    return view('guest.index');
})->name('index');

Route::get('/datapertanahan', function (){
    return view('guest.datapertanahan');
})->name('datapertanahan');

Route::get('/create', function (){
    return view('guest.create');
})->name('create');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/pertanahan', [PertanahanController::class, 'index']);

