<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PertanahanController;
use App\Http\Controllers\AuthController;

Route::get('/auth', [AuthController::class, 'index']);
Route::post('/auth/login', [AuthController::class, 'login']);

Route::get('/index', function (){
    return view('guest.index');
})->name('index');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pertanahan', [PertanahanController::class, 'index']);

