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
// */
Route::get('/cek','MonitoringController@cek');
route::get('/publish/{topic}/{message}','MonitoringController@sendMsgViaMqtt');
route::post('/subscribe/{topic}','MonitoringController@subscribeToTopic');
Auth::routes();
Route::get('/phpinfo', function() {
    // /App/Models/
    // phpinfo();
});
Route::middleware(['auth'])->group(function () {
	Route::get('/room/{id}','MonitoringController@room')->name('room.monitor');
    Route::get('/','Dashboard@index')->name('dashboard');
    Route::get('/a','AppController@test');
    Route::get('/b','Auth\LoginController@tampilan');
    // Master Data
        // Setting Account
    Route::get('/profile/{id}','AccountController@index');
    Route::get('/editProfile/{id}','AccountController@edit');
    Route::post('/updateProfile/{id}','AccountController@update');
    Route::get('/editPassword/{id}','AccountController@editPass');
    Route::post('/updatePassword/{id}','AccountController@updatePass');
        // Data Perangkat
    Route::get('/dataper','OperatorController@dataper')->name('data.perangkat');
    Route::get('/tambah_per','OperatorController@create_per')->middleware('admin')->name('tambah.data.per');
    Route::post('/per_tambah','OperatorController@store_per')->middleware('admin')->name('tambah.per');
    Route::get('/edit_per/{id}','OperatorController@edit_per')->middleware('admin')->name('edit.data.per');
    Route::put('/per_edit/{id}','OperatorController@update_per')->middleware('admin')->name('edit.per');
    Route::delete('/per_delete/{id}','OperatorController@delete_per')->middleware('admin')->name('delete.per');
    Route::get('/operator','OperatorController@index')->name('operator');
    Route::get('/operator_add','OperatorController@create')->middleware('admin')->name('tambah.data.op');
    Route::post('/op_tambah','OperatorController@store')->middleware('admin')->name('tambah.op');
    Route::get('/operator_edit/{id}','OperatorController@edit')->middleware('admin')->name('edit.data.op');
    Route::put('/op_edit/{id}','OperatorController@update')->middleware('admin');
    Route::delete('/operator_delete/{id}','OperatorController@delete')->middleware('admin');
        // Data Perangkat
    Route::get('/dataper','OperatorController@dataper')->name('data.perangkat');
        // Data Ruangan
    Route::get('/data_ruang','RuanganController@index')->name('data_ruang.index');
    Route::get('/data_ruang/create','RuanganController@create')->middleware('admin')->name('data_ruang.create');
    Route::post('/data_ruang/store','RuanganController@store')->middleware('admin')->name('data_ruang.store');
    Route::get('/data_ruang/delete/{id}','RuanganController@destroy')->middleware('admin');
    Route::get('/data_ruang/form/edit/{id}','RuanganController@edit')->middleware('admin')->name('data_ruang.edit');
    Route::put('/data_ruang/update/{id}','RuanganController@update')->middleware('admin')->name('data_ruang.update');
        // Data Satuan
    Route::get('/satuan','SatuanController@index')->name('satuan.index');
    Route::get('/satuan/create','SatuanController@create')->middleware('admin')->name('satuan.create');
    Route::post('/satuan/store','SatuanController@store')->middleware('admin')->name('satuan.store');
    Route::get('/satuan/edit/{id}','SatuanController@edit')->middleware('admin')->name('satuan.edit');
    Route::put('/satuan/update/{id}','SatuanController@update')->middleware('admin')->name('satuan.update');


    // Aktivasiper
    Route::get('/aktivasiper','AktivasiPerController@index')->name('aktivasiper.index');
    Route::get('/aktivasiper/create','AktivasiPerController@create')->middleware('admin')->name('aktivasiper.create');
    Route::post('/aktivasiper/store','AktivasiPerController@store')->middleware('admin')->name('aktivasiper.store');
    Route::get('/aktivasiper/edit/{id}','AktivasiPerController@edit')->middleware('admin')->name('aktivasiper.edit');
    Route::put('/aktivasiper/update/{id}','AktivasiPerController@update')->middleware('admin')->name('aktivasiper.update');
    Route::get('/aktivasiper/delete/{id}','AktivasiPerController@destroy')->middleware('admin');

    // monitoring
        // raw data
    Route::get('/monitoring','MonitoringController@index')->name('monitoring');
        // pengaturan Monitoring
    Route::get('/set_monitoring','MonitoringController@set_monitoring')->middleware('admin')->name('setting.monitoring');
    Route::get('/set_add_monitor','MonitoringController@add_monitor')->middleware('admin')->name('tambah.set.monitor');
    Route::post('/add_monitor','MonitoringController@add_aksi')->middleware('admin')->name('tambah.monitor');
    Route::get('/set_edit_monitor/{id}','MonitoringController@edit')->middleware('admin');
    Route::put('/edit_monitor/{id}','MonitoringController@update')->middleware('admin');
    Route::delete('/delete_monitor/{id}','MonitoringController@delete')->middleware('admin');

    Route::get('/aktivasi','Dashboard@data')->middleware('admin')->name('aktivasi.data');

    Route::get('/pdfLog','Dashboard@pdfLog');
    Route::post('/pdfLogPrint','Dashboard@pdfLogPrint');
    Route::get('/excelLog','LaporanController@importview');
    Route::post('/excelLogPrint','LaporanController@export');

    // laporan
        // cetak laporan
    Route::get('/cetak_laporan','LaporanController@cetak_laporan')->name('cetak.laporan');
    Route::post('/downloadLaporan','LaporanController@downloadLaporan')->name('downloadLaporan');
    Route::get('/export_laporan', 'LaporanController@ExportExcel');
    Route::post('/export_excel','LaporanController@downloadExcel')->name('download.excel');
        // Cetak Log
    Route::get('/export','LaporanController@export')->name('export');
    Route::get('/importview','LaporanController@importview');
    Route::post('/import','LaporanController@import')->name('import');
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
    Route::delete('/delete_kirim/{id}','LaporanController@delete');

    Route::get('/add_kirim_alarm','LaporanController@add_kirim_alarm')->name('add.kirim.alarm');
    Route::post('/aksi_add_alarm','LaporanController@aksi_add_alarm')->name('aksi.add.alarm');
    Route::get('/edit_kirim_alarm/{id}','LaporanController@edit_kirim_alarm')->name('edit.kirim.alarm');
    Route::put('/aksi_edit_alarm/{id}','LaporanController@aksi_edit_alarm')->name('aksi.edit.alarm');
    Route::delete('/delete_kirim_alarm/{id}','LaporanController@delete_alarm')->name('delete.alarm');

    // pengaturan
        // Pengaturan Aplikasi
    Route::get('/set_app','AppController@index')->name('pengaturan.app');
    Route::post('/updateApp/{id}','AppController@update');
        // Pengaturan MQTT
    Route::get('/set_mqtt/','MqttController@edit')->name('pengaturan.mqtt');
    Route::put('/set_mqtt_update/{id}','MqttController@update')->name('edit.mqtt');


    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/updated-activity', 'TelegramBotController@updatedActivity');
    Route::get('/send-telegram', 'TelegramBotController@sendMessage');
});

Route::get('/ahu', function() {
    return view('Admin.Dashboard.ahu');
});


Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('route:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});
