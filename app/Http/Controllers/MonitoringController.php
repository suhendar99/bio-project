<?php

namespace App\Http\Controllers;
use App\Mqtt;
 
 
use Validator;
use App\Satuan;
use App\Setapp;
use App\Ruangan;
use App\Operator;
use App\Log_alert;
use App\Monitoring;
use App\Mail\sendEmail;
use App\Mail\VerifyMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class MonitoringController extends Controller
{
    public function getData(Request $req)
    {

        $data = Monitoring::whereBetween('date',[$req->startDate, $req->endDate])->limit(10)->latest()->get();
        // $data = Monitoring::whereBetween('date',[$req->awal, $req->akhir])->latest()->get();
        // $data = Monitoring::whereBetween('date',[$req->awal, $req->akhir])->get();
        // dd($data);
        // return response()->json([
        //     'response'=>$data
        // ]);
        // dd($data);
        return response()->json($data);


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
    	$data->save();

        $suhu = Satuan::where('parameter','Suhu')->first();
        $smax = $suhu->max;
        $smin = $suhu->min;

        $kelembapan = Satuan::where('parameter','Kelembapan')->first();
        $kmax = $kelembapan->max;
        $kmin = $kelembapan->min;

        $tekanan = Satuan::where('parameter','Tekanan')->first();
        $tmax = $tekanan->max;
        $tmin = $tekanan->min; 

        if ($req->suhu > $smax) {
            $log = new Log_alert;
            $log->status = 'Hight presure';
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
            $log->status = 'Hight presure';
            $log->keterangan = $req->kelembapan.'% lebih tinggi dari '.$smax.'%';
            $log->monitoring_id = $data->id;
            $log->time = $req->time;
            $log->save();

        }

        if($req->kelembapan < $kmin){
            $log = new Log_alert;
            $log->status = 'Low presure';
            $log->keterangan = $req->kelembapan.'% lebih rendah dari '.$smin.'%';
            $log->monitoring_id = $data->id;
            $log->time = $req->time;
            $log->save();
        }

        if($req->tekanan > $tmax){
            $log = new Log_alert;
            $log->status = 'Hight presure';
            $log->keterangan = $req->tekanan.'Pa lebih tinggi dari '.$smax.'Pa';
            $log->monitoring_id = $data->id;
            $log->time = $req->time;
            $log->save();

        }

        if($req->tekanan < $tmin){
            $log = new Log_alert;
            $log->status = 'Low presure';
            $log->keterangan = $req->tekanan.'Pa lebih rendah dari '.$smin.'Pa';
            $log->monitoring_id = $data->id;
            $log->time = $req->time;
            $log->save();
        }

        // dd($data->alarm);
        if ($data->alarm == 1) {
            Mail::to("faliq.kintara14@gmail.com")->send(new VerifyMail(Auth::user()));

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
}
