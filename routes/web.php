<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['namespace' => 'Meeting'], function () {
    Route::post('/login', 'AuthController@login');
    Route::post('/register', 'AuthController@register');
    Route::post('/logout', 'AuthController@logout');

});

Route::group(['namespace' => 'Meeting','middleware' => 'auth'], function () {
    Route::post('getTableData', 'MeetingController@getTableData');
    Route::get('getDept', 'DeptController@getDept');
    Route::post('getUsers', 'UserController@getUsers');
    Route::post('getEmptyRooms','RoomController@getEmptyRooms') ;
    Route::post('createMeeting','MeetingController@createMeeting') ;
    Route::post('getUserInfo','UserController@getUserInfo') ;
});


