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

Route::get('/dashboard','Dashboard@index')->name('dashboard')->middleware('auth');
Route::get('/room','monitoringController@room')->name('room.monitor')->middleware('auth');
// Master Data
	// Setting Account
Route::get('/profile/{id}','AccountController@index')->middleware('auth');
Route::get('/editProfile/{id}','AccountController@edit')->middleware('auth');
Route::post('/updateProfile/{id}','AccountController@update')->middleware('auth');
    // Data Op
Route::get('/operator','OperatorController@index')->name('operator')->middleware('auth');
Route::get('/operator_add','OperatorController@create')->name('tambah.data.op')->middleware('auth');
Route::post('/op_tambah','OperatorController@store')->name('tambah.op')->middleware('auth');
Route::get('/operator_edit/{id}','OperatorController@edit')->name('edit.data.op')->middleware('auth');
Route::put('/op_edit/{id}','OperatorController@update')->middleware('auth');
Route::get('/operator_delete/{id}','OperatorController@delete')->middleware('auth');
    // Data Perangkat
Route::get('/dataper','OperatorController@dataper')->name('data.perangkat')->middleware('auth');

    // Data Ruangan
Route::resource('/data_ruang','RuanganController')->middleware('auth');
    // Data Satuan
Route::resource('/satuan','SatuanController')->middleware('auth');
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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
