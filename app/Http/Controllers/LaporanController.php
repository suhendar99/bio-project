<?php

namespace App\Http\Controllers;

use PDF;
use Validator;
use App\Laporan;
use App\Operator;
use App\SetKirim;
use App\Monitoring;
use App\Ruangan;
use App\Satuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function index()
    {
        // 
    }

    public function cetak_laporan()
    {
        $data = Ruangan::all();
        $data2 = Satuan::all();
        return view('Admin.Laporan.cetak', ['ruang' => $data, 'satuan' => $data2]);
    }
    public function downloadLaporan(Request $req)
    {

        set_time_limit(99999);
        $v = Validator::make($req->all(), [             
            'awal' => 'required|date',            
            'akhir' => 'required|date',         
            'ruang' => 'required',
            'satuan' => 'required',
        ]);
        $awal = $req->awal;
        $akhir = $req->akhir;
        $data2 = [];
        $set = Laporan::find(1)->first();
        
        // dd($req->ckck);
        
        

        if ($awal > $akhir) {
             return back()->with('failed','Tanggal Awal Dilarang Melampaui Tanggal Akhir');
        }
        if ($req->ruang === "all" && $req->satuan === "allper") {
            echo "all";
            $data = Monitoring::whereBetween('date',[$req->awal, $req->akhir])->latest()->get();
            // dd($data);
            $pos = 'Semua ruangan & parameter';
        } elseif ($req->ruang !== "all" && $req->satuan ==="allper"){
            echo "ruang".$req->ruang;
            $data = Monitoring::whereBetween('date',[$req->awal, $req->akhir])->where('ruangan_id', $req->ruang)->latest()->get();
            $parameter = Monitoring::where('ruangan_id', $req->ruang)->first();
            // dd($data);
            $pos = 'Ruangan';
        } elseif ($req->ruang === "all" && $req->satuan !=="allper"){
            echo "satuan".$req->satuan;
            $data = Monitoring::whereBetween('date',[$req->awal, $req->akhir])->latest()->get();
            
                if ($req->satuan == "suhu") {
                    $parameter = 'Suhu';
                    // echo "satuan".$req->satuan;
                } elseif ($req->satuan == "kelembapan") {
                    $parameter = 'Kelembapan';
                    // echo "satuan".$req->satuan;
                } elseif ($req->satuan == "tekanan"){
                    $parameter = 'Tekanan';
                    // echo "satuan".$req->satuan;
                }
                
            
            
            
            // dd($data);
            $pos = 'Parameter';
        } elseif ($req->ruang !== "all" && $req->satuan !=="allper"){
            echo "satuan".$req->satuan;
            $data = Monitoring::whereBetween('date',[$req->awal, $req->akhir])->where('ruangan_id', $req->ruang)->latest()->get();
            
                if ($req->satuan == "suhu") {
                    $parameter = 'Suhu';
                    // echo "satuan".$req->satuan;
                } elseif ($req->satuan == "kelembapan") {
                    $parameter = 'Kelembapan';
                    // echo "satuan".$req->satuan;
                } elseif ($req->satuan == "tekanan"){
                    $parameter = 'Tekanan';
                    // echo "satuan".$req->satuan;
                }
                
            
            
            
            // dd($data);
            $pos = 'Parameter';
        }
        // dd($data);
        // if ($req->satuan == "allpar") {
        //     // $data = Monitoring::whereBetween('date',[$req->awal, $req->akhir])->where('ruangan_id', $req->ruang)->pluck($req->satuan);
        //     // dd($data);
        //     $data = Monitoring::whereBetween('date',[$req->awal, $req->akhir])->latest()->get();
        // } else {
        //     $data2 = Monitoring::select($req->satuan)->whereBetween('date',[$req->awal, $req->akhir])->where('ruangan_id', $req->ruang)->get();
            
        // }

        // if($req->ruang == "all" && $req->satuan == "allpar"){
        //     $data = Monitoring::whereBetween('date',[$req->awal, $req->akhir])->latest()->get();
        // }

        if ($v->fails()) {
            return back()->withErrors($v)->withInput();
        }else {

            // dd($count,$suhumax);
            $pdf = app('dompdf.wrapper');
            $pdf->getDomPDF()->set_option("enable_php", true);
            if ($pos == 'Ruangan') {
                $pdf = PDF::loadview('Admin.Laporan.laporan_pdf',['data'=>$data, 'pos'=>$pos, 'parameter'=>$parameter->ruangan->nama, 'set'=>$set, 'awal'=>$awal, 'akhir'=>$akhir]);

            }elseif($pos == 'Parameter'){
                $pdf = PDF::loadview('Admin.Laporan.laporan_pdf',['data'=>$data, 'pos'=>$pos, 'parameter'=>$parameter, 'set'=>$set, 'awal'=>$awal, 'akhir'=>$akhir]);
            }
            set_time_limit(300);
            return $pdf->stream('Monitoring-Report-'.$req->akhir);
            return view('Admin.Laporan.laporan_pdf',['data'=>$data, 'set'=>$set, 'awal'=>$awal, 'akhir'=>$akhir]);
            
            return back();
        }
        
    }

    public function set_laporan()
    {
        $data = Laporan::where('id',1)->first();
        return view('Admin.Laporan.Setting.index', ['data'=>$data]);
    }

    public function store(Request $request)
    {
    	$v = Validator::make($request->all(), [             
            'header_img' => 'required|',            
            'icon' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'footer' => 'required|'
        ]);

        if ($v->fails()) {
            return back()->withErrors($v)->withInput();
        }else {
            

            if($request->has('icon'))
            {                
                $name = rand(). '.' . $request->icon->getClientOriginalExtension();           
                $request->icon->move(public_path("foto/laporan/set"), $name);                                       
                $icon = 'foto/laporan/set'.$name;
            }

            $employee = Laporan::create([
                'header_img' => $header_img,
                'icon' => $icon,
                'footer' => $footer,
            ]);

            
            //  LogUser::create([
            //     'user_id' => Auth::user()->id,
            //     'detail' => 'added new category  product : '.$request->name
            // ]);
            
            return back()->with('success', 'Setting Laporan berhasil ditambahkan');
        }
    }

    public function edit($id)
    {
    	# code...
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
    	$v = Validator::make($request->all(), [             
            'header_img' => 'required|',            
            'icon' => 'image|mimes:jpeg,png,jpg|max:2048',
            'footer' => 'required|',
        ]);

        if ($v->fails()) {
            return back()->withErrors($v)->withInput();
        }else {
            $setlaporan = Laporan::find($id);
            $setlaporan->update([
                'header_img' => $request->header_img,
                'footer' => $request->footer,
            ]);

            if($request->hasfile('icon'))
            {                
                $name = rand(). '-HEADER-' . $request->icon->getClientOriginalExtension();           
                $request->icon->move(public_path("foto/laporan/set"), $name);                                       
                $icon = 'foto/laporan/set/'.$name;
                if(is_writable(public_path($setlaporan->icon))) {                    
                    unlink(public_path($setlaporan->icon));
                }     
                $icon = 'foto/laporan/set/'.$name;

                $setlaporan->update([
                    'icon' => $icon,
                ]);
            } 
            return back()->with('success', 'Setting Laporan berhasil di update');
        }
    }

    public function delete($id)
    {
        $data = SetKirim::findOrFail($id);
        $data->delete();
        return redirect()->back();
    }

    public function set_kirim()
    {
        $setkirim = SetKirim::all();
        return view('Admin.Laporan.tab_set_kirim',compact('setkirim'));
    }
    public function add_kirim()
    {
        $operator = Operator::all();
        return view('Admin.Laporan.Setting_kirim.create',compact('operator'));   
    }
    public function aksi_add(Request $req)
    {
        $v = Validator::make($req->all(), [
            'email' => 'required|unique:set_kirims,id_operator',
            'status' => 'required|',
            'waktu' => 'required|'
        ]);

        if ($v->fails()) {
            // dd($v->errors()->all());
            return back()->withErrors($v)->withInput();
        }else {
            
            $employee = SetKirim::create([
                'id_operator' => $req->email,
                'status_kirim' => $req->status,
                'waktu_kirim' => $req->waktu,
                
            ]);

            
            //  LogUser::create([
            //     'user_id' => Auth::user()->id,
            //     'detail' => 'added new category  product : '.$request->name
            // ]);
            
            return back()->with('success', 'Data berhasil ditambahkan');
        }
    }
    public function edit_kirim($id)
    {
        $operator = Operator::all();
        $setkirim = SetKirim::findOrFail($id);
        return view('Admin.Laporan.Setting_kirim.edit',compact('setkirim','operator'));
    }
    public function aksi_edit(Request $req, $id)
    {
        $v = Validator::make($req->all(), [
            'email' => 'required|unique:set_kirims,id_operator,'.$id,
            'status' => 'required|',
            'waktu' => 'required|'
        ]);

        if ($v->fails()) {
            // dd($v->errors()->all());
            return back()->withErrors($v)->withInput();
        }else {
            
            $operator = SetKirim::find($id);

            $operator->update([
                'id_operator' => $req->email,
                'status_kirim' => $req->status,
                'waktu_kirim' => $req->waktu,
            ]);

            //  LogUser::create([
            //     'user_id' => Auth::user()->id,
            //     'detail' => 'added new category  product : '.$request->name
            // ]);
            
            return back()->with('success', 'Data berhasil diedit');
        }        
    }
}
