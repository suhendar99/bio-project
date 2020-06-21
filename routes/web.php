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
// Dashboard
Route::get('/dashboard','Dashboard@index')->name('dashboard');
Route::get('/room','monitoringController@room')->name('room.monitor');
// Master Data
    // Data Op
Route::get('/operator','OperatorController@index')->name('operator');
Route::get('/operator_add','OperatorController@create')->name('tambah.data.op');
Route::post('/op_tambah','OperatorController@store')->name('tambah.op');
Route::get('/operator_edit/{id}','OperatorController@edit')->name('edit.data.op');
Route::put('/op_edit/{id}','OperatorController@update');
Route::get('/operator_delete/{id}','OperatorController@delete');
    // Data Perangkat
Route::get('/dataper','OperatorController@dataper')->name('data.perangkat');
    // Data Ruangan
Route::get('/data_ruang','RuanganController@index')->name('data.ruang');
    // Data Satuan
Route::get('/data_satuan','SatuanController@index')->name('data.satuan');
// monitoring
    // raw data
Route::get('/monitoring','monitoringController@index')->name('monitoring');
    // pengaturan Monitoring
Route::get('/set_monitoring','Dashboard@set_monitoring')->name('setting.monitoring');
// laporan
    // cetak laporan
Route::get('/cetak_laporan','Dashboard@cetak_laporan')->name('cetak.laporan');
    // Pengaturan Laporan
Route::get('/set_laporan','Dashboard@set_laporan')->name('setting.laporan');
    // Pengaturan Kirim Laporan
Route::get('/set_kirim_laporan','Dashboard@set_kirim_laporan')->name('setting.kirim.laporan');
// pengaturan
    // Pengaturan Aplikasi
Route::get('/set_app','AppController@index')->name('pengaturan.app');
    // Pengaturan MQTT
Route::get('/set_mqtt','Dashboard@set_mqtt')->name('pengaturan.mqtt');


Route::get('/operatorEdit/{id}','OperatorController@edit')->name('operatorEdit/{id}');
Route::post('/operatorUpdate/{id}','OperatorController@update')->name('operatorUpdate/{id}');
Route::get('/operatorDelete/{id}','OperatorController@delete')->name('operatorDelete/{id}');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
