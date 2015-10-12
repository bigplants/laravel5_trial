<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', 'ArticlesController@getIndex');
Route::controller('articles', 'ArticlesController');
Route::get('/api/ping', function () {
    return Response::json('pong');
});

Route::filter('api_auth', 'App\Filter\ApiAuthFilter');
Route::group(['before' => 'api_token'], function () {
    $controller = 'App\Http\Controllers\ReservationController';
    Route::post('/api/reservation', $controller . '@create');
    Route::get('/api/reservations', $controller . '@index');
    Route::put('/api/reservation/{reservation_code}', $controller . '@update');
    Route::delete('/api/reservation/{reservation_code}', $controller . '@delete');
});
