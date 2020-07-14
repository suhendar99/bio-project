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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/operatorStore','OperatorController@store')->name('operator.store');

Route::post('/monitoringStore','MonitoringController@store')->name('monitoring.store');

Route::get('/get-data-monitoring','MonitoringController@data')->name('monitoring.data');

Route::get('/getData','MonitoringController@getData');

Route::get('/checkSeri','MonitoringController@checkSeri');