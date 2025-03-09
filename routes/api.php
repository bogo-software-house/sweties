<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PointController;
use App\Http\Controllers\Api\VochercodeController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/point',[ PointController::class, 'index']);
Route::post('/redeem_point', [PointController::class, 'store']);

Route::ApiResource('/code_voucher', VochercodeController::class);

Route::middleware('guest')->group(function () {
    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});


 //minddleware login
 Route::prefix('auth')->group(function () {

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    // Route yang membutuhkan autentikasi
    Route::middleware('auth:sanctum')->group(function () {
        // Logout
        Route::post('/logout', [AuthController::class, 'logout']);

        // Cek user
        Route::get('/me', [AuthController::class, 'me']);

        // Route khusus admin
        Route::middleware(App\Http\Middleware\CheckRole::class.':admin')->group(function () {
        });

        // Route khusus satff
        Route::middleware(App\Http\Middleware\CheckRole::class.':staff')->group(function () {
        });

        // Route khusus user
        Route::middleware(App\Http\Middleware\CheckRole::class.':pembeli')->group(function () {
         Route::get('/user/dashboard', function () {
                return response()->json(['message' => 'Selamat datang di dashboard pembeli']);
            });

        });
    });
});
