<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\ProductCategoryApiController;

Route::group(
    [
        'as' => 'api.product-category.',
        'middleware' => ['throttle:global', 'auth:api'],
        'prefix' => 'product-category',
    ],
    function () {
        Route::get('', [ProductCategoryApiController::class, 'index'])
            ->name('index');

        Route::get('{product_category_id}', [ProductCategoryApiController::class, 'show'])
            ->name('show');

        Route::post('', [ProductCategoryApiController::class, 'create'])
            ->name('create');

        Route::put('{product_category_id}', [ProductCategoryApiController::class, 'update'])
            ->name('update');

        Route::delete('{product_category_id}', [ProductCategoryApiController::class, 'destroy'])
            ->name('destroy');
    }
);
