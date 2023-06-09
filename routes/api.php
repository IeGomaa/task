<?php

use App\Http\Controllers\CarouselController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'post'], function () {
    Route::controller(PostController::class)->group(function () {
        Route::get('index', 'index');
        Route::get('getPost/{id}', 'getPost');
        Route::post('create', 'create');
        Route::post('delete', 'delete');
        Route::post('update', 'update');
    });
});

Route::group(['prefix' => 'carousel'], function () {
    Route::controller(CarouselController::class)->group(function () {
        Route::get('index', [CarouselController::class, 'index']);
        Route::get('getCarousel/{id}', [CarouselController::class, 'getCarousel']);
        Route::post('create', [CarouselController::class, 'create']);
        Route::post('delete', [CarouselController::class, 'delete']);
        Route::post('update', [CarouselController::class, 'update']);
    });
});
