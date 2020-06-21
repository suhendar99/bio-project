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
Route::get('/log','Dashboard@login')->middleware('auth'); 
// Dashboard
Route::get('/dashboard','Dashboard@index')->name('dashboard')->middleware('auth');
Route::get('/room','monitoringController@room')->name('room.monitor')->middleware('auth');;
// Master Data
    // Data Op
Route::get('/operator','OperatorController@index')->name('operator')->middleware('auth');
Route::get('/operator_add','OperatorController@create')->name('tambah.data.op')->middleware('auth');
    // Data Perangkat
Route::get('/dataper','OperatorController@dataper')->name('data.perangkat')->middleware('auth');
    // Data Ruangan
Route::get('/data_ruang','RuanganController@index')->name('data.ruang')->middleware('auth');
    // Data Satuan
Route::get('/data_satuan','SatuanController@index')->name('data.satuan')->middleware('auth');
// monitoring
    // raw data
Route::get('/monitoring','monitoringController@index')->name('monitoring')->middleware('auth');
    // pengaturan Monitoring
Route::get('/set_monitoring','Dashboard@set_monitoring')->name('setting.monitoring')->middleware('auth');
// laporan
    // cetak laporan
Route::get('/cetak_laporan','Dashboard@cetak_laporan')->name('cetak.laporan')->middleware('auth');
    // Pengaturan Laporan
Route::get('/set_laporan','Dashboard@set_laporan')->name('setting.laporan')->middleware('auth');
    // Pengaturan Kirim Laporan
Route::get('/set_kirim_laporan','Dashboard@set_kirim_laporan')->name('setting.kirim.laporan')->middleware('auth');
// pengaturan
    // Pengaturan Aplikasi
Route::get('/set_app','AppController@index')->name('pengaturan.app')->middleware('auth');
    // Pengaturan MQTT
Route::get('/set_mqtt','Dashboard@set_mqtt')->name('pengaturan.mqtt')->middleware('auth');


Route::get('/operatorEdit/{id}','OperatorController@edit')->name('operatorEdit/{id}')->middleware('auth');
Route::post('/operatorUpdate/{id}','OperatorController@update')->name('operatorUpdate/{id}')->middleware('auth');
Route::get('/operatorDelete/{id}','OperatorController@delete')->name('operatorDelete/{id}')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

// Route::get('satuan','SatuanController@index')->middleware('auth');;
// Route::post('satuan','SatuanController@store')->name('satuan.store')->middleware('auth');;
// Route::get('satuan/{id}/edit', 'SatuanController@edit')->name('satuan.edit')->middleware('auth');;
// Route::post('satuan/update', 'SatuanController@update')->name('satuan.update')->middleware('auth');;
// Route::get('satuan/{id}/delete', 'SatuanController@destroy')->name('satuan.delete')->middleware('auth');;