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
Route::get('/log','Dashboard@login');
// Menu
Route::get('/dashboard','Dashboard@index')->name('dashboard');
Route::get('/dataper','OperatorController@dataper')->name('data.perangkat');
Route::get('/data_ruang','Dashboard@data_ruang')->name('data.ruang');
Route::get('/data_satuan','Dashboard@data_satuan')->name('data.satuan');
Route::get('/set_monitoring','Dashboard@set_monitoring')->name('setting.monitoring');
Route::get('/cetak_laporan','Dashboard@cetak_laporan')->name('cetak.laporan');
Route::get('/set_laporan','Dashboard@set_laporan')->name('setting.laporan');
Route::get('/set_app','AppController@index')->name('pengaturan.app');
Route::get('/set_mqtt','Dashboard@set_mqtt')->name('pengaturan.mqtt');
Route::get('/room','monitoringController@room')->name('room.monitor');

Route::get('/operator','OperatorController@index')->name('operator');

Route::get('/operatorEdit/{id}','OperatorController@edit')->name('operatorEdit/{id}');
Route::post('/operatorUpdate/{id}','OperatorController@update')->name('operatorUpdate/{id}');
Route::get('/operatorDelete/{id}','OperatorController@delete')->name('operatorDelete/{id}');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/monitoring','monitoringController@index')->name('monitoring');