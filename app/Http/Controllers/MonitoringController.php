<?php

namespace App\Http\Controllers;

use App\Mqtt;

use PDF;


use Mqtt as Broker;
use Validator;
use App\Satuan;
use App\Setapp;
use App\Ruangan;
use App\Operator;
use App\Log_alert;
use App\KirimAlarm;
use App\Monitoring;
use App\Mail\sendEmail;
use App\Mail\VerifyMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Telegram\Bot\Laravel\Facades\Telegram;
use Telegram\Bot\FileUpload\InputFile;
use App\Perangkat;
use App\Jobs\Mqttjob;


class MonitoringController extends Controller
{
    public function checkSeri(Request $req)
    {
        $data = Perangkat::where('no_seri',$req->no_seri)->first();
        if ($data === null) {
           echo "Gagal";
        } else {
            $status = 1;
            return response()->json([
                'status' => $status
            ]);
        }
    }
    public function getData(Request $req)
    {
        $room = Ruangan::where('id', $req->room)->first();
        $data = Monitoring::whereBetween('date',[$req->startDate, $req->endDate])->where('ruangan_id', $req->room)->limit(10)->latest()->get();
        $ruang = Ruangan::where('id', $req->room)->first();
        $smax = $ruang->smax;
        $smin = $ruang->smin;

        $kmax = $ruang->kmax;
        $kmin = $ruang->kmin;

        $tmax = $ruang->tmax;
        $tmin = $ruang->tmin;

          return response()->json([
              'smax' => $smax,
              'smin' => $smin,
              'kmax' => $kmax,
              'kmin' => $kmin,
              'tmax' => $tmax,
              'tmin' => $tmin,
              'data' => $data,
          ]);

        // if ($req->room == "all") {
        //     if($req->parameter == "allpar"){
        //         $data = Monitoring::whereBetween('date',[$req->startDate, $req->endDate])->limit(10)->latest()->get();
        //         return response()->json($data);
        //     } elseif($req->parameter != "allpar"){
        //         if ($req->parameter == "suhu") {
        //             $parameter = $req->parameter;
        //         } elseif($req->parameter == "kelembapan"){
        //             $parameter = $req->parameter;
        //         } elseif($req->parameter == "tekanan"){
        //             $parameter = $req->parameter;
        //         }
        //         return response()->json($data);

        //     }
        // } elseif($req->room != "all") {
        //     if($req->parameter == "allpar"){
        //         $data = Monitoring::whereBetween('date',[$req->startDate, $req->endDate])->where('ruangan_id',$req->room)->limit(10)->latest()->get();
        //         return response()->json($data);

        //     } elseif($req->parameter != "allpar"){
        //         if ($req->parameter == "suhu") {
        //             $data = Monitoring::select('suhu')->whereBetween('date',[$req->startDate, $req->endDate])->where('ruangan_id',$req->room)->limit(10)->latest()->get();
        //         } elseif ($req->parameter == "kelembapan"){
        //             $data = Monitoring::select('kelembapan')->whereBetween('date',[$req->startDate, $req->endDate])->where('ruangan_id',$req->room)->limit(10)->latest()->get();
        //         } elseif ($req->parameter == "tekanan"){
        //             $data = Monitoring::select('tekanan')->whereBetween('date',[$req->startDate, $req->endDate])->where('ruangan_id',$req->room)->limit(10)->latest()->get();
        //         }
        //         // dd($data);
        //         return response()->json($data);

        //     }
        // }

        // if ($req->room == "all") {
        //     $data = Monitoring::whereBetween('date',[$req->startDate, $req->endDate])->limit(10)->latest()->get();
        // } else {
        //     $data = Monitoring::whereBetween('date',[$req->startDate, $req->endDate])->where('ruangan_id',$req->room)->limit(10)->latest()->get();
        // }
        // $data = Monitoring::whereBetween('date',[$req->awal, $req->akhir])->latest()->get();
        // $data = Monitoring::whereBetween('date',[$req->awal, $req->akhir])->get();
        // dd($data);
        // return response()->json([
        //     'response'=>$data
        // ]);
        // $data = Monitoring::where('ruangan_id',$req->ruangan)->limit(20)->get();
        // dd($data);

    }
    public function index()
    {
        // dd($mqtt->topic);
        $data = Monitoring::orderBy('created_at','desc')->limit(10)->get();
        return view('Admin.Monitoring.raw',['data'=>$data,]);
    }

    public function data()
    {
        $data = Monitoring::orderBy('created_at','desc')->limit(9)->get();
        return response()->json($data);
    }


    public function room($id)
    {
        // dd($id);
        $id = $id;
        $app = Setapp::where('id',1)->first();
        $room = Ruangan::where('id',$id)->first();
        $dataMonitoring = Monitoring::where('ruangan_id', $room->id)->get();
        if(count($dataMonitoring) == 0){
            return redirect()->back()->with('alert', "Ruang ".$room->nama." tidak memiliki data");
        }

        return view('Admin.Dashboard.monitoring',compact('app','id','room'));
    }

    public function sendEmail()
    {
        // Mail::to("aguspadilah30@gmail.com")->send(new sendEmail());
        Mail::to("faliq.kintara14@gmail.com")->send(new VerifyMail("Hello"));
         return response()->json([
            'status' => true,
        ]);

        // return "Email telah dikirim";
    }
    // public function sendmail()
    // {
    //     try{
    //         Mail::send('email', ['nama' => 'John Doe', 'pesan' => 'Alarm Actived'], function ()
    //         {
    //             $message->subject('This is Title');
    //             $message->from('donotreply@biofarma.com', 'Biofarma');
    //             $message->to('faliq.kintara14@gmail.com');
    //         });
    //         return back()->with('alert-success','Berhasil Kirim Email');
    //     }
    //     catch (Exception $e){
    //         return response (['status' => false,'errors' => $e->getMessage()]);
    //     }
    // }



    public function store(Request $req)
    {
    	# code...
    	$data = new Monitoring;

    	$data->date = $req->date;
    	$data->time = $req->time;
    	$data->suhu = $req->suhu;
    	$data->tekanan = $req->tekanan;
    	$data->kelembapan = $req->kelembapan;
    	$data->alarm = $req->alarm;
    	$data->perangkat_id = $req->perangkat_id;
    	$data->ruangan_id = $req->ruangan_id;
        $data->cvc = $req->cvc;
        $data->vvc = $req->vvc;
    	$data->save();

        $ruang = Ruangan::where('id', $req->ruangan_id)->first();
        $smax = $ruang->smax;
        $smin = $ruang->smin;

        $kmax = $ruang->kmax;
        $kmin = $ruang->kmin;

        $tmax = $ruang->tmax;
        $tmin = $ruang->tmin;

        $toMail = KirimAlarm::all();

        if ($req->suhu > $smax) {
            $log = new Log_alert;
            $log->status = 'High presure';
            $log->keterangan = $req->suhu.'C lebih tinggi dari '.$smax.'C';
            $log->monitoring_id = $data->id;
            $log->time = $req->time;
            $log->save();
        }

        if($req->suhu < $smin){
            $log = new Log_alert;
            $log->status = 'Low presure';
            $log->keterangan = $req->suhu.'C lebih rendah dari '.$smin.'C';
            $log->monitoring_id = $data->id;
            $log->time = $req->time;
            $log->save();

        }

        if($req->kelembapan > $kmax){
            $log = new Log_alert;
            $log->status = 'High presure';
            $log->keterangan = $req->kelembapan.'% lebih tinggi dari '.$kmax.'%';
            $log->monitoring_id = $data->id;
            $log->time = $req->time;
            $log->save();

        }

        if($req->kelembapan < $kmin){
            $log = new Log_alert;
            $log->status = 'Low presure';
            $log->keterangan = $req->kelembapan.'% lebih rendah dari '.$kmin.'%';
            $log->monitoring_id = $data->id;
            $log->time = $req->time;
            $log->save();
        }

        if($req->tekanan > $tmax){
            $log = new Log_alert;
            $log->status = 'High presure';
            $log->keterangan = $req->tekanan.'Pa lebih tinggi dari '.$tmax.'Pa';
            $log->monitoring_id = $data->id;
            $log->time = $req->time;
            $log->save();

        }

        if($req->tekanan < $tmin){
            $log = new Log_alert;
            $log->status = 'Low presure';
            $log->keterangan = $req->tekanan.'Pa lebih rendah dari '.$tmin.'Pa';
            $log->monitoring_id = $data->id;
            $log->time = $req->time;
            $log->save();
        }

            

        // dd($data->alarm);
        if ($data->alarm == 1) {
            foreach ($toMail as $send) {
                Mail::to(Operator::where('id', $send->id_operator)->first())->send(new sendEmail($send->custom_teks));
            }

            $awal = date("Y-m-d");
            $akhir = date("Y-m-d");
            
            $text = "Alert!!!\n"
            . "<b>Somethings wrong is hapening</b>\n"
            . "Check the monitoring\n"
            . "<b>Message: </b>\n"
            . "Hello there";

        

             Telegram::sendMessage([
                'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001237937318'),
                'parse_mode' => 'HTML',
                'text' => $text
            ]);

        //        Telegram::sendDocument([
        //     'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001237937318'),
        //      'document' => InputFile::create('report/sample.pdf'),
        //      'caption' => 'This is a document',
        // ]);

            

            
            // dd($send);

        }

        // if ($data->suhu > $smax || $data->suhu < $smin || $data->kelembapan > $kmax || $data->kelembapan < $kmin || $data->tekanan < $tmin || $data->tekanan > $tmax ) {
        //     Mail::to("aguspadilah30@gmail.com")->send(new sendEmail());
        // }

    }

    public function set_monitoring()
    {
        $monitor = Satuan::all();
        return view('Admin.Monitoring.Setmonitor.set', compact('monitor'));
    }
    public function add_monitor()
    {
        $ruangan = Ruangan::all();
        return view('Admin.Monitoring.Setmonitor.create', compact('ruangan'));
    }
    public function add_aksi(Request $req)
    {
        $v = Validator::make($req->all(), [
            'nama' => 'required|',
            'parameter' => 'required|',
            'max' => 'required|numeric',
            'min' => 'required|numeric'
        ]);

        if ($v->fails()) {
            // dd($v->errors()->all());
            return back()->withErrors($v)->withInput();
        }else {

            if ($req->max <= $req->min) {
                return redirect()->back()->with('maxmin', 'Max tidak bisa lebih kecil dari Min!');
            }
            if ($req->parameter == 'suhu') {
                $satuan = 'C';
            }elseif ($req->parameter == 'kelembapan') {
                $satuan = '%';
            }elseif ($req->parameter == 'tekanan') {
                $satuan = 'Pa';
            }
            $employee = Satuan::create([
                'id_ruangan' => $req->nama,
                'parameter' => $req->parameter,
                'satuan' => $satuan,
                'max' => $req->max,
                'min' => $req->min
            ]);




            //  LogUser::create([
            //     'user_id' => Auth::user()->id,
            //     'detail' => 'added new category  product : '.$request->name
            // ]);

            return back()->with('success', 'Ruangan berhasil ditambahkan');
        }
    }


    public function edit($id)
    {
        $satuan = Satuan::findOrFail($id);
    	$ruangan = Ruangan::all();
        return view('Admin.Monitoring.Setmonitor.edit', compact('ruangan','satuan'));
    }

    public function update(Request $req, $id)
    {
    	$v = Validator::make($req->all(), [
            'nama' => 'required|',
            'parameter' => 'required|',
            'satuan' => 'required|',
            'max' => 'required|numeric',
            'min' => 'required|numeric'
        ]);

        if ($v->fails()) {
            // dd($v->errors()->all());
            return back()->withErrors($v)->withInput();
        }else {
            if ($req->max <= $req->min) {
                return redirect()->back()->with('maxmin', 'Max tidak bisa lebih kecil dari Min!');
            }

            $operator = Satuan::find($id);

            $operator->update([
                'id_ruangan' => $req->nama,
                'parameter' => $req->parameter,
                'satuan' => $req->satuan,
                'max' => $req->max,
                'min' => $req->min
            ]);

            //  LogUser::create([
            //     'user_id' => Auth::user()->id,
            //     'detail' => 'added new category  product : '.$request->name
            // ]);

            return back()->with('success', 'Data berhasil di update');
        }
    }

    public function delete($id)
    {
        $satuan = Satuan::findOrFail($id);
        $satuan->delete();
        return redirect()->back();
    }

    public function sendMsgViaMqtt($topic , $message)
    {
        $client_id = Auth::user()->id;
        $output = Broker::ConnectAndPublish($topic, $message, $client_id);

        if ($output == 'true')
        {
            return "published";
        }
        return "Failed";
    }

    public function subscribeToTopic($topic)
    {
        Mqtt::ConnectAndSubscribe($topic, function($topic, $msg){
            echo "Msg Received: \n";
            echo "Topic: {$topic}\n\n";
            echo "\t$msg\n\n";
        });
    }
    public function cek(Request $request)
    {
        dispatch(new Mqttjob());
        
    }
}
