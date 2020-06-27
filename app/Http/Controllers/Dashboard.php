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
use App\Log_alert;
use App\Aktivasi;
use App\Operator;
use App\Laporan;
use Auth;
use PDF;
use Carbon\Carbon;
use Validator;

class Dashboard extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function test()
    {
        return view('Admin.Dashboard.log');
    }

    public function data()
    {
        $data = Aktivasi::orderBy('created_at','desc')->limit(9)->get();
        return response()->json([
            'response'=>$data
        ]);
        // return response()->json($data);
    }

    public function index()
    {
        $aktivasi = Aktivasi::orderBy('created_at','desc')->limit(10)->get();
        $operator = Operator::all();
        $data = Ruangan::all();
        $alarm = Monitoring::where('alarm',1)->latest()->limit(10)->get();
        // dd($alarm);
        $suhu = Satuan::where('parameter','Suhu')->first();
        // dd($suhu->parameter);
        $kelembapan = Satuan::where('parameter','Kelembapan')->first();
        $tekanan = Satuan::where('parameter','Tekanan')->first();
        $suhu = Satuan::where('parameter','Suhu')->first();
        return view('Admin.Dashboard.index',['data'=>$data, 'suhu'=>$suhu, 'alarm'=>$alarm, 'suhu'=>$suhu, 'kelembapan'=>$kelembapan,'tekanan'=>$tekanan, 'aktivasi'=>$aktivasi,'operator'=>$operator]);
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

    public function pdfLog()
    {
        return view('Admin.Dashboard.pdfLog');
    }

    public function pdfLogPrint(Request $req)
    {
        
        $v = Validator::make($req->all(), [             
            'awal' => 'required|date',            
            'akhir' => 'required|date',   
        ]);
        $awal = $req->awal;
        $akhir = $req->akhir;
        $set = Laporan::find(1)->first();

        if ($awal > $akhir) {
             return back()->with('failed','Tanggal Awal Dilarang Melampaui Tanggal Akhir');
        }

        if ($v->fails()) {
            return back()->withErrors($v)->withInput();
        }else {
            $date1 = new Carbon($req->awal);
            $date2 = new Carbon($req->akhir);
            $date2 = $date2->addDays(1);
            // $data = Aktivasi::whereBetween('created_at',[$date1->format('Y-m-d'),$date2->format('Y-m-d')])->get();
            $data = Aktivasi::where('created_at','>=',$date1->format('Y-m-d'))->where('created_at','<=',$date2->format('Y-m-d'))->latest()->get();
            // dd($req->all(),$data);

            // dd($count,$suhumax);
            $pdf = app('dompdf.wrapper');
            $pdf->getDomPDF()->set_option("enable_php", true);
            set_time_limit(300);
            $pdf = PDF::loadview('Admin.Dashboard.log_pdf',['data'=>$data, 'set'=>$set, 'awal'=>$awal, 'akhir'=>$akhir]);
            return $pdf->stream('Monitoring-Report-'.$req->akhir);
            return view('Admin.Dashboard.log_pdf',['data'=>$data, 'awal'=>$awal, 'akhir'=>$akhir]);
            
            return back();
        }


    }

}
