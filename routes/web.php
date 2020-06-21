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
<<<<<<< HEAD
<<<<<<< HEAD
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
=======
Route::get('/log','Dashboard@login');
=======

Route::get('/log','Dashboard@log')->middleware('auth');
>>>>>>> 0fca31439feafd262ba85ff93b724df719818601

Auth::routes();
// Menu
// Dashboard
<<<<<<< HEAD
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
Route::resource('/data_ruang','RuanganController');
>>>>>>> d1b6433a4eb6948840a1cb1553d11736ec509cfb
=======
Route::get('/dashboard','Dashboard@index')->name('dashboard')->middleware('auth');
Route::get('/room','monitoringController@room')->name('room.monitor')->middleware('auth');
// Master Data
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
Route::resource('/data_ruang','RuanganController')->middleware('auth')->middleware('auth');
>>>>>>> 0fca31439feafd262ba85ff93b724df719818601
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
<<<<<<< HEAD
<<<<<<< HEAD
Route::get('/set_laporan','Dashboard@set_laporan')->name('setting.laporan')->middleware('auth');
=======
Route::get('/set_laporan','Dashboard@set_laporan')->name('setting.laporan');
>>>>>>> d1b6433a4eb6948840a1cb1553d11736ec509cfb
=======
Route::get('/set_laporan','Dashboard@set_laporan')->name('setting.laporan')->middleware('auth');

>>>>>>> 0fca31439feafd262ba85ff93b724df719818601
    // Pengaturan Kirim Laporan
Route::get('/set_kirim_laporan','Dashboard@set_kirim_laporan')->name('setting.kirim.laporan')->middleware('auth');
// pengaturan
    // Pengaturan Aplikasi
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 0fca31439feafd262ba85ff93b724df719818601
Route::get('/set_app','AppController@index')->name('pengaturan.app')->middleware('auth');
    // Pengaturan MQTT
Route::get('/set_mqtt','Dashboard@set_mqtt')->name('pengaturan.mqtt')->middleware('auth');

<<<<<<< HEAD
=======
Route::get('/set_app','AppController@index')->name('pengaturan.app');

    // Pengaturan MQTT
Route::get('/set_mqtt','Dashboard@set_mqtt')->name('pengaturan.mqtt');
>>>>>>> d1b6433a4eb6948840a1cb1553d11736ec509cfb
=======
>>>>>>> 0fca31439feafd262ba85ff93b724df719818601

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