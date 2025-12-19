<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DokumenPersilController;
use App\Http\Controllers\GuestUserController;
use App\Http\Controllers\JenisPenggunaanController;
use App\Http\Controllers\PersilController;
use App\Http\Controllers\PetaPersilController;
use App\Http\Controllers\SengketaPersilController;
use App\Http\Controllers\WargaController;
use Illuminate\Support\Facades\Route;

Route::prefix('sengketapersil')->group(function () {
    Route::group(['middleware' => ['checkrole:admin']], function () {
        // List Route yang ingin diterapkan
        Route::get('/edit/{sengketa}', [SengketaPersilController::class, 'edit'])->name('sengketapersil.edit')->middleware('checkislogin');
        Route::put('/{sengketa}', [SengketaPersilController::class, 'update'])->name('sengketapersil.update')->middleware('checkislogin');
        Route::delete('/{id}', [SengketaPersilController::class, 'destroy'])->name('sengketapersil.destroy')->middleware('checkislogin');
    });
    Route::get('/', [SengketaPersilController::class, 'index'])->name('sengketapersil.index')->middleware('checkislogin');
    Route::get('/create', [SengketaPersilController::class, 'create'])->name('sengketapersil.create')->middleware('checkislogin');
    Route::post('/', [SengketaPersilController::class, 'store'])->name('sengketapersil.store')->middleware('checkislogin');
});

Route::prefix('guest')->group(function () {
    Route::resource('user', GuestUserController::class, ['as' => 'guest']);
});

// Route::resource('persil', PersilController::class);
// Route::resource('media', MediaController::class);

Route::get('/login', [AuthController::class, 'index'])->name('login');

Route::prefix('guest')->group(function () {
    Route::group(['middleware' => ['checkrole:admin']], function () {
        // List Route yang ingin diterapkan
        Route::get('/pertanahan/{dokumen_persil}/edit', [DokumenPersilController::class, 'edit'])->name('pertanahanguest.edit')->middleware('checkislogin');
        Route::put('/pertanahan/{dokumen_persil}', [DokumenPersilController::class, 'update'])->name('pertanahanguest.update')->middleware('checkislogin');
        Route::delete('/pertanahan/{id}', [DokumenPersilController::class, 'destroy'])->name('pertanahanguest.destroy')->middleware('checkislogin');
    });
    Route::get('/pertanahan', [DokumenPersilController::class, 'index'])->name('pertanahanguest.index')->middleware('checkislogin');
    Route::get('/pertanahan/create', [DokumenPersilController::class, 'create'])->name('pertanahanguest.create')->middleware('checkislogin');
    Route::post('/pertanahan', [DokumenPersilController::class, 'store'])->name('pertanahanguest.store')->middleware('checkislogin');
});

Route::prefix('persil')->group(function () {
    Route::group(['middleware' => ['checkrole:admin']], function () {
        Route::get('/edit/{persil_id}', [PersilController::class, 'edit'])->name('persil.edit')->middleware('checkislogin');
        Route::put('/{persil_id}', [PersilController::class, 'update'])->name('persil.update')->middleware('checkislogin');
        Route::delete('/{id}', [PersilController::class, 'destroy'])->name('persil.destroy')->middleware('checkislogin');
    });

    Route::get('/', [PersilController::class, 'index'])->name('persil.index')->middleware('checkislogin');
    Route::get('/create', [PersilController::class, 'create'])->name('persil.create')->middleware('checkislogin');
    Route::post('/', [PersilController::class, 'store'])->name('persil.store')->middleware('checkislogin');

    // Tambahkan route show ini
    Route::get('/{persil_id}', [PersilController::class, 'show'])
        ->name('persil.show')
        ->middleware('checkislogin');
});

Route::prefix('warga')->group(function () {
    Route::group(['middleware' => ['checkrole:admin']], function () {
        // List Route yang ingin diterapkan
        Route::get('/warga/edit/{warga}', [WargaController::class, 'edit'])->name('warga.edit')->middleware('checkislogin');
        Route::put('/warga/{warga}', [WargaController::class, 'update'])->name('warga.update')->middleware('checkislogin');
        Route::delete('/warga/{id}', [WargaController::class, 'destroy'])->name('warga.destroy')->middleware('checkislogin');
    });
    Route::get('/warga', [WargaController::class, 'index'])->name('warga.index')->middleware('checkislogin');
    Route::get('/warga/create', [WargaController::class, 'create'])->name('warga.create')->middleware('checkislogin');
    Route::post('/warga', [WargaController::class, 'store'])->name('warga.store')->middleware('checkislogin');
});

Route::prefix('user')->group(function () {
    Route::group(['middleware' => ['checkrole:admin']], function () {
        // List Route yang ingin diterapkan
        Route::get('/user/edit/{user}', [GuestUserController::class, 'edit'])->name('user.edit')->middleware('checkislogin');
        Route::put('/user/{user}', [GuestUserController::class, 'update'])->name('user.update')->middleware('checkislogin');
        Route::delete('/user/{id}', [GuestUserController::class, 'destroy'])->name('user.destroy')->middleware('checkislogin');
    });
    Route::get('/user', [GuestUserController::class, 'index'])->name('user.index')->middleware('checkislogin');
    Route::get('/user/create', [GuestUserController::class, 'create'])->name('user.create');
    Route::post('/user', [GuestUserController::class, 'store'])->name('user.store');
});

Route::prefix('peta_persil')->group(function () {
    Route::group(['middleware' => ['checkrole:admin']], function () {
        // List Route yang ingin diterapkan
        Route::get('/edit/{id}', [PetaPersilController::class, 'edit'])->name('peta_persil.edit')->middleware('checkislogin');
        Route::put('/{id}', [PetaPersilController::class, 'update'])->name('peta_persil.update')->middleware('checkislogin');
        Route::delete('/{id}', [PetaPersilController::class, 'destroy'])->name('peta_persil.destroy')->middleware('checkislogin');
    });
    Route::get('/', [PetaPersilController::class, 'index'])->name('peta_persil.index')->middleware('checkislogin');
    Route::get('/create', [PetaPersilController::class, 'create'])->name('peta_persil.create')->middleware('checkislogin');
    Route::post('/', [PetaPersilController::class, 'store'])->name('peta_persil.store')->middleware('checkislogin');
});

Route::prefix('jenis_penggunaan')->group(function () {
    Route::group(['middleware' => ['checkrole:admin']], function () {
        // List Route yang ingin diterapkan
        Route::get('/edit/{id}', [JenisPenggunaanController::class, 'edit'])->name('jenis_penggunaan.edit')->middleware('checkislogin');
        Route::put('/{id}', [JenisPenggunaanController::class, 'update'])->name('jenis_penggunaan.update')->middleware('checkislogin');
        Route::delete('/{id}', [JenisPenggunaanController::class, 'destroy'])->name('jenis_penggunaan.destroy')->middleware('checkislogin');
    });
    Route::get('/', [JenisPenggunaanController::class, 'index'])->name('jenis_penggunaan.index')->middleware('checkislogin');
    Route::get('/create', [JenisPenggunaanController::class, 'create'])->name('jenis_penggunaan.create')->middleware('checkislogin');
    Route::post('/', [JenisPenggunaanController::class, 'store'])->name('jenis_penggunaan.store')->middleware('checkislogin');
});

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', [DokumenPersilController::class, 'index'])->name('datapertanahan')->middleware('checkislogin');

Route::get('/about', function () {
    return view('pages.about');
})->name('about')->middleware('checkislogin');

Route::get('/rumah', function () {
    return view('pages.rumah');
})->name('rumah')->middleware('checkislogin'); // PANGGILAN METHOD LANGSUNG


Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact')->middleware('checkislogin');

Route::get('/home', function () {
    return view('pages.homee');
})->name('home')->middleware('checkislogin');

Route::get('/users/{id}/delete-profile', [GuestUserController::class, 'deleteProfileImage'])
    ->name('user.delete.profile');


Route::get('/identitas-pengembang', function () {
    return view('pages.identitaspengembang');
})->name('identitas.pengembang');