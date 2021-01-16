<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use\App\Http\Controllers\Api\UserController;

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

Route::group(['namespace' => 'Api'], function () {
    // Guest
    Route::group(['prefix' => 'guest'], function () {
        Route::post('register', 'UserController@register');
    });
    // Callback
    Route::group(['prefix' => 'callback'], function () {
    });
    // Authorized
    Route::group(['prefix' => 'authorized', 'middleware' => ['auth:api']], function () {
        Route::get('auth', [UserController::class, 'auth']);
    });
});

Route::fallback(function () {
    abort(404, 'Page Not Found. If error persists, contact info@mysms.ph');
});

