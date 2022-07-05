<?php

use Illuminate\Http\Request;
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

Route::group(['as' => 'api.'], function () {
    Route::get('healthz', 'Controller@healthz');
    Route::get('config', 'Controller@config');

    Route::post('auth', 'AuthController@login')->name('login');

    Route::group([
        'middleware' => 'auth:sanctum',
    ], function () {
        Route::get('auth/logout', 'AuthController@logout')->name('logout');
    
        Route::group (['prefix' => 'books'], function () {
            Route::get('', 'BookController@list');
            Route::get('/{book_id}', 'BookController@getByID');
        });
    
        Route::group (['prefix' => 'trans'], function () {
            Route::get('', 'TransController@getByUser');
            Route::post('', 'TransController@rentBook')->name('rentBook');
        });
        
        Route::group(['prefix' => 'me'], function () {
            Route::get('', 'UserController@getProfile')->name('getProfile');
            Route::put('', 'UserController@updateProfile')->name('updateProfile');
        });
    });
});