<?php

use Illuminate\Http\Request;

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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::post('/login',function(Request $request){
    $username = $request->get('username') ;
    $password = $request->get('password') ;
//    Auth::attempt();
   return response()->json(['canlogin'=>false]);
})->middleware('api');

Route::post('/getTableData','Meeting\MeetingController@getTableData')->middleware('api');
