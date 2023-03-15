<?php

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
        Route::post('create', 'create');
        Route::post('delete', 'delete');
        Route::post('update', 'update');
    });
});
