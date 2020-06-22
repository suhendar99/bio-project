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
Auth::routes();

Route::get('/room','monitoringController@room')->name('room.monitor');

Route::middleware(['auth'])->group(function () {
    Route::get('/','Dashboard@index')->name('dashboard');
    Route::get('/a','Dashboard@test');
    // Master Data
        // Setting Account
    Route::get('/profile/{id}','AccountController@index');
    Route::get('/editProfile/{id}','AccountController@edit');
    Route::post('/updateProfile/{id}','AccountController@update');
    Route::get('/editPassword/{id}','AccountController@editPass');
    Route::post('/updatePassword/{id}','AccountController@updatePass');
        // Data Perangkat
    Route::get('/dataper','OperatorController@dataper')->name('data.perangkat');
    Route::get('/tambah_per','OperatorController@create_per')->name('tambah.data.per');
    Route::post('/per_tambah','OperatorController@store_per')->name('tambah.per');
    Route::get('/edit_per/{id}','OperatorController@edit_per')->name('edit.data.per');
    Route::put('/per_edit/{id}','OperatorController@update_per')->name('edit.per');
    Route::delete('/per_delete/{id}','OperatorController@delete_per')->name('delete.per');
    Route::get('/operator','OperatorController@index')->name('operator');
    Route::get('/operator_add','OperatorController@create')->name('tambah.data.op');
    Route::post('/op_tambah','OperatorController@store')->name('tambah.op');
    Route::get('/operator_edit/{id}','OperatorController@edit')->name('edit.data.op');
    Route::put('/op_edit/{id}','OperatorController@update');
    Route::delete('/operator_delete/{id}','OperatorController@delete');
        // Data Perangkat
    Route::get('/dataper','OperatorController@dataper')->name('data.perangkat');
        // Data Ruangan
    Route::resource('/data_ruang','RuanganController');
        // Data Satuan
    Route::resource('/satuan','SatuanController');
    // monitoring
        // raw data
    Route::get('/monitoring','monitoringController@index')->name('monitoring');
        // pengaturan Monitoring
    Route::get('/set_monitoring','Dashboard@set_monitoring')->name('setting.monitoring');
    // laporan
        // cetak laporan
    Route::get('/cetak_laporan','Dashboard@cetak_laporan')->name('cetak.laporan');
        // Pengaturan Laporan
    Route::get('/set_laporan','LaporanController@set_laporan')->name('setting.laporan');

    // Pengaturan Kirim Laporan
    Route::get('/set_kirim_laporan','Dashboard@set_kirim_laporan')->name('setting.kirim.laporan');
    // pengaturan
        // Pengaturan Aplikasi
    Route::get('/set_app','AppController@index')->name('pengaturan.app');
    Route::post('/updateApp/{id}','AppController@update');
        // Pengaturan MQTT
    Route::get('/set_mqtt/','MqttController@edit')->name('pengaturan.mqtt');
    Route::put('/set_mqtt_update/{id}','MqttController@update')->name('edit.mqtt');


    Route::get('/home', 'HomeController@index')->name('home');
});

