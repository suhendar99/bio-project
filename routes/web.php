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


Route::middleware(['auth'])->group(function () {
	Route::get('/room/{id}','MonitoringController@room')->name('room.monitor');
    Route::get('/','Dashboard@index')->name('dashboard');
    Route::get('/a','AppController@test');
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
    Route::resource('/satuan','SatuanController')->middleware('admin');
    // monitoring
        // raw data
    Route::get('/monitoring','monitoringController@index')->name('monitoring');
        // pengaturan Monitoring
    Route::get('/set_monitoring','MonitoringController@set_monitoring')->middleware('admin')->name('setting.monitoring');
    Route::get('/set_add_monitor','MonitoringController@add_monitor')->middleware('admin')->name('tambah.set.monitor');
    Route::post('/add_monitor','MonitoringController@add_aksi')->middleware('admin')->name('tambah.monitor');
    Route::get('/set_edit_monitor/{id}','MonitoringController@edit');
    Route::put('/edit_monitor/{id}','MonitoringController@update');
    Route::delete('/delete_monitor/{id}','MonitoringController@delete');

    // laporan
        // cetak laporan
    Route::get('/cetak_laporan','LaporanController@cetak_laporan')->name('cetak.laporan');
    Route::post('/downloadLaporan','LaporanController@downloadLaporan')->name('downloadLaporan');

        // Pengaturan Laporan
    Route::get('/set_laporan','LaporanController@set_laporan')->name('setting.laporan');
    Route::post('/storeSetlaporan','LaporanController@store')->name('tambah.setlaporan');
    Route::get('/editSetlaporan/{id}','LaporanController@edit')->name('edit.setlaporan');
    Route::post('/updateSetlaporan/{id}','LaporanController@update')->name('update.setlaporan');

    // Pengaturan Kirim Laporan
    Route::get('/set_kirim_laporan','LaporanController@set_kirim')->name('setting.kirim.laporan');
    Route::get('/add_kirim','LaporanController@add_kirim')->name('add.kirim');
    Route::post('/aksi_add','LaporanController@aksi_add')->name('aksi.add');
    Route::get('/edit_kirim/{id}','LaporanController@edit_kirim')->name('edit.kirim');
    Route::put('/aksi_edit/{id}','LaporanController@aksi_edit')->name('aksi.edit');
    Route::delete('/delete_kirim/{id}','LaporanController@delete')->name('delete');
    // pengaturan
        // Pengaturan Aplikasi
    Route::get('/set_app','AppController@index')->name('pengaturan.app');
    Route::post('/updateApp/{id}','AppController@update');
        // Pengaturan MQTT
    Route::get('/set_mqtt/','MqttController@edit')->name('pengaturan.mqtt');
    Route::put('/set_mqtt_update/{id}','MqttController@update')->name('edit.mqtt');


    Route::get('/home', 'HomeController@index')->name('home');
});

