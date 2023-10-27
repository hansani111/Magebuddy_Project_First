<?php

use App\Http\Controllers\EmpAuth\AuthenticatedSessionController;
use App\Http\Controllers\EmpAuth\ConfirmablePasswordController;
use App\Http\Controllers\EmpAuth\EmailVerificationNotificationController;
use App\Http\Controllers\EmpAuth\EmailVerificationPromptController;
use App\Http\Controllers\EmpAuth\NewPasswordController;
use App\Http\Controllers\EmpAuth\PasswordController;
use App\Http\Controllers\EmpAuth\PasswordResetLinkController;
use App\Http\Controllers\EmpAuth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest:emp')->group(function () {

    Route::get('emp/login', [AuthenticatedSessionController::class, 'create'])
        ->name('emp.login');

    Route::post('emp/login', [AuthenticatedSessionController::class, 'store']);

    Route::get('emp/forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('emp.password.request');

    Route::post('emp/forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('emp.password.email');

    Route::get('emp/reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('emp.password.reset');

    Route::post('emp/reset-password', [NewPasswordController::class, 'store'])
        ->name('emp.password.store');
});

Route::middleware('auth:emp')->group(function () {
    Route::get('emp/verify-email', EmailVerificationPromptController::class)
        ->name('emp.verification.notice');

    Route::get('emp/verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('emp.verification.verify');

    Route::post('emp/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('emp.verification.send');

    Route::get('emp/confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('emp.password.confirm');

    Route::post('emp/confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('emp/password', [PasswordController::class, 'update'])->name('emp.password.update');

    // Route::post('emp/logout', [AuthenticatedSessionController::class, 'destroy'])
    //     ->name('emp.logout');

    Route::get('emp/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('emp.logout');

    Route::post('emp/logout', [AuthenticatedSessionController::class, 'destroy']);
});