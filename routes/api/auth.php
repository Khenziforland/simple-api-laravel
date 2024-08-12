<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthApiController;

Route::group(
    [
        'as' => 'api.auth.',
        'middleware' => ['throttle:global'],
        'prefix' => 'auth',
    ],
    function () {
        Route::post('register', [AuthApiController::class, 'register'])
            ->name('register');

        Route::post('login', [AuthApiController::class, 'login'])
            ->name('login');

        Route::post('logout', [AuthApiController::class, 'logout'])
            ->middleware('auth:api')
            ->name('logout');
    }
);
