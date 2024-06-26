<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Admin\RegisterMahasiswaController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Admin\MatakuliahController;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
    Route::group(['prefix' => 'admin/mahasiswa'], function () {
        Route::get('/', [RegisterMahasiswaController::class, 'index'])->name('admin.mahasiswa.index');
        Route::get('create', [RegisterMahasiswaController::class, 'create'])->name('admin.mahasiswa.create');
        Route::post('store', [RegisterMahasiswaController::class, 'store'])->name('admin.mahasiswa.store');
        Route::get('{user}', [RegisterMahasiswaController::class, 'show'])->name('admin.mahasiswa.show');
        Route::get('{user}/edit', [RegisterMahasiswaController::class, 'edit'])->name('admin.mahasiswa.edit');
        Route::put('{user}', [RegisterMahasiswaController::class, 'update'])->name('admin.mahasiswa.update');
        Route::delete('{user}', [RegisterMahasiswaController::class, 'destroy'])->name('admin.mahasiswa.destroy');
    });
    Route::group(['prefix' => 'admin/matakuliah'], function () {
        Route::get('/', [MatakuliahController::class, 'index'])->name('admin.matakuliah.index');
        Route::get('create', [MatakuliahController::class, 'create'])->name('admin.matakuliah.create');
        Route::post('store', [MatakuliahController::class, 'store'])->name('admin.matakuliah.store');
        Route::get('{matakuliah}', [MatakuliahController::class, 'show'])->name('admin.matakuliah.show');
        Route::get('{matakuliah}/edit', [MatakuliahController::class, 'edit'])->name('admin.matakuliah.edit');
        Route::get('{matakuliah}/mahasiswa/{nim}', [MatakuliahController::class, 'editNilai'])->name('admin.matakuliah.editNilai');
        Route::put('{matakuliah}', [MatakuliahController::class, 'update'])->name('admin.matakuliah.update');
        Route::put('{matakuliah}/nilai/{nim}', [MatakuliahController::class, 'updateNilai'])->name('admin.matakuliah.updateNilai');
        Route::delete('{matakuliah}', [MatakuliahController::class, 'destroy'])->name('admin.matakuliah.destroy');
    });
});
