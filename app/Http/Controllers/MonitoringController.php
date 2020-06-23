<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Monitoring;
use App\Satuan;
use App\Ruangan;
use App\Mqtt;
use App\Setapp;
use Validator;

class MonitoringController extends Controller
{
    public function index()
    {

        // dd($mqtt->topic);
        $data = Monitoring::orderBy('created_at','desc')->paginate(10);
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
