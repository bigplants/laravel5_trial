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
use App\Task;

Route::post('/task', function () {
    $validator = Validator::make(Request::all(), [
        'name' => 'required|max:10',
    ]);
    if ($validator->fails()) {
        return redirect('/task')
            ->withInput()
            ->withErrors($validator);
    }

    $task = new Task();
    $task->name = Request::get('name');
    $task->save();

    return redirect('/task');
});
Route::get('/task', function () {
    $task = new Task();
    $tasks = $task->all();
//    $tasks = $task::orderBy('created_at', 'asc')->get();

    return view('tasks.index', compact('tasks'));
});
Route::delete('/task/{id}', function ($id) {
    //
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