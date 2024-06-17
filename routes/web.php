<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\krsController;


Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('mahasiswa/dashboard', [HomeController::class, 'mahasiswa'])->middleware(['auth'])->name('mahasiswa.dashboard');

Route::get('admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard')->middleware(['auth', 'admin']);


Route::middleware(['auth', 'verified'])->group(function () {
    Route::group(['prefix', 'mahasiswa'], function () {
        route::get('/krs', [krsController::class, 'index'])->name('users.krs.index');
        route::get('/krs/create', [krsController::class, 'create'])->name('users.krs.create');
        route::post('/krs/store', [krsController::class, 'store'])->name('users.krs.store');
        route::get('/khs', [krsController::class, 'show'])->name('users.khs.show');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
