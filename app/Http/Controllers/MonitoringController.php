<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Operator;
use App\Monitoring;
use App\Satuan;
use App\Ruangan;
use App\Mqtt;
use App\Setapp;
use Validator;
use Mail;


class MonitoringController extends Controller
{
    public function index()
    {
        // dd($mqtt->topic);
        $data = Monitoring::orderBy('created_at','desc')->limit(10)->get();
        return view('Admin.Monitoring.raw',['data'=>$data,]);
    }


    public function room()
    {   
        $app = Setapp::where('id',1)->first();
        return view('Admin.Dashboard.monitoring',compact('app'));
    }

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


        // if ($data->alarm == 1) {
        //     $user = Operator::all();
        //     $subject = 'Alert!!!';
        //     $data = array('email' => $user->email, 'subject' => $subject);
        //     Mail::send('Admin.Monitoring.mail', $data, function ($message) use ($data) {
        //     $message->from('biofarma@gmail.com', 'BIOFARMA');
        //     $message->to($data['email']);
        //     $message->subject($data['subject']); 
        //     });
        // }

        // if ($data->suhu > $smax || $data->suhu < $smin || $data->kelembapan > $kmax || $data->kelembapan < $kmin || $data->tekanan < $tmin || $data->tekanan > $tmax ) {
        //     Mail::raw('Alert!!! Something Wrong on The Rooms', function($mail) {
        //         $mail->from('biofarma@gmail.com', 'BIOFARMA');
        //         $mail->to($user->email, $user->name);
        //     });
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

            $employee = Satuan::create([
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
