<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\Chartline;
use Lava;
use DB;
use App\Ruangan;
use App\Perangkat;
use App\Setting;
use App\Monitoring;
use App\Satuan;
use Auth;
use PDF;
class Dashboard extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Ruangan::all();
        $alarm = Monitoring::where('alarm',1)->latest()->limit(10)->get();          
        // dd($alarm);
        $suhu = Satuan::where('parameter','Suhu')->first();
        return view('Admin.Dashboard.index',['data'=>$data, 'suhu'=>$suhu, 'alarm'=>$alarm]);
    }

    public function login()
    {
        return view('login');
    }
    public function raw()
    {
        return view('Admin.Monitoring.raw');
    }
    public function set_monitoring()
    {
        return view('Admin.Monitoring.set');
    }
    public function set_app()
    {
        return view('Admin.App.set');
    }
    public function set_mqtt()
    {
        return view('Admin.App.set_mqtt');
    }
    
    public function ukur(Request $request)
    {
        $setting = Setting::latest('id_setting')->first();
       
        $suhu = (float) $setting->suhu;
        $kelembapan = (float) $setting->kelembapan;
        $tekanan = (float) $setting->tekanan;
        $cahaya = (float) $setting->cahaya;

        $suhu_alat = (float) $request->suhu;
        $kelembapan_alat = (float) $request->kelembapan;
        $tekanan_alat = (float) $request->tekanan_darah;
        $cahaya_alat = (float) $request->cahaya;

        // if($suhu_alat == $suhu){
        if($suhu_alat > $suhu and $kelembapan_alat > $kelembapan and $tekanan_alat > $tekanan and $cahaya_alat > $cahaya){
            Mail::to('aditpucuk76@gmail.com')->send(new Notification($suhu_alat, $kelembapan_alat, $tekanan_alat,$cahaya_alat));
        }

        $ukur = new Datapengukuran;

        $ukur->suhu          = $request->suhu;
        $ukur->kelembapan    = $request->kelembapan;
        $ukur->tekanan_darah = $request->tekanan_darah;
        $ukur->cahaya        = $request->cahaya;
        $ukur->alarm         = $request->alarm;
        $ukur->perangkat_id  = $request->perangkat_id;
        $ukur->save();

        return response()->json([
            'pesan' => 'Pesan',
            'type' => gettype($request->suhu)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
