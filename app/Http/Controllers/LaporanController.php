<?php

namespace App\Http\Controllers;

use App\KirimAlarm;
use App\Imports\LaporanImport;
use App\Exports\LaporanExport;
use App\Exports\ExportLaporan;
use App\Aktivasi;
use Excel;
use PDF;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
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
    	

        // set_time_limit(99999);
        $v = Validator::make($req->all(), [
            'awal' => 'required|date',
            'akhir' => 'required|date',
            'ruang' => 'required',
            'satuan' => 'required'
        ]);
        $awal = $req->awal;
        $akhir = $req->akhir;
        $data2 = [];
        $set = Laporan::find(1)->first();

        // dd($req->all());

        if ($v->fails()) {
            return back()->withErrors($v)->withInput();
        }
        if ($awal > $akhir) {
        	
             return back()->with('failed','Tanggal Awal Dilarang Melampaui Tanggal Akhir');
        }
        if ($req->ruang === "all" && $req->satuan === "allper") {
            // Data monitoring
            $data = Monitoring::whereBetween('date',[$req->awal, $req->akhir])->latest()->get();
        	// dd($data);
            if(count($data) == 0){
                return back()->with('failed', "Tidak ada data dari ".$req->awal." sampai ".$req->akhir);
            }
            // dd($req->all());
            $pos = 'Ruangan';
            $kirim = 1;
            $sumber = "Semua Ruangan dan Parameter";
        	// dd($sumber);
        } elseif ($req->ruang !== "all" && $req->satuan ==="allper"){
            // Data monitorign berdasarkan ID ruangan
            $data = Monitoring::whereBetween('date',[$req->awal, $req->akhir])->where('ruangan_id', $req->ruang)->latest()->get();

            if(count($data) == 0){
                return back()->with('failed', "Tidak ada data untuk ruangan dari ".$req->awal." sampai ".$req->akhir);
            }

            $parameter = Monitoring::where('ruangan_id', $req->ruang)->first();

            // dd($data);

            if(!isset($parameter)){
                return back()->with('failed', "Tidak ada ruangan");
            }

            $pos = 'Ruangan';
            $kirim = 2;
            $sumber = $parameter->ruangan->nama;
        } elseif ($req->ruang === "all" && $req->satuan !=="allper"){

            $data = Monitoring::whereBetween('date',[$req->awal, $req->akhir])->latest()->get();

            if(count($data) == 0){
                return back()->with('failed', "Tidak ada data dari ".$req->awal." sampai ".$req->akhir);
            }

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
            $kirim = 2;
            $sumber = $parameter;
        } elseif ($req->ruang !== "all" && $req->satuan !=="allper"){
            $data = Monitoring::whereBetween('date',[$req->awal, $req->akhir])->where('ruangan_id', $req->ruang)->latest()->get();
			// dd($data);
            if(count($data) == 0){
                return back()->with('failed', "Tidak ada data untuk ruangan dari ".$req->awal." sampai ".$req->akhir);
            }

            $rooms = Monitoring::where('ruangan_id', $req->ruang)->first();

            if(!isset($rooms)){
                return back()->with('failed', "Tidak ada ruangan");
            }

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
            $kirim = 2;
            $sumber = $parameter." & ".$rooms->ruangan->nama;
        }
    	// dd($data);

            // dd($count);
            $pdf = app('dompdf.wrapper');
			// dd($pdf);
            $pdf->getDomPDF()->set_option("enable_php", true);
            if ($kirim == 1 && $pos == "Ruangan"){
            	// dd($kirim);
                $pdf = PDF::loadview('Admin.Laporan.laporan_pdf',['data'=>$data, 'pos'=>$pos, 'parameter'=>"Semua", 'sumber' => $sumber, 'set'=>$set, 'awal'=>$awal, 'akhir'=>$akhir]);
				// dd($pdf);
            }elseif ($kirim == 2 && $pos == 'Ruangan') {
            	// dd($pos);
                $pdf = PDF::loadview('Admin.Laporan.laporan_pdf',['data'=>$data, 'pos'=>$pos, 'parameter'=>$parameter->ruangan->nama, 'sumber' => $sumber, 'set'=>$set, 'awal'=>$awal, 'akhir'=>$akhir]);

            }elseif($kirim == 2 && $pos == 'Parameter'){
            	// dd($kirim,$pos);
                $pdf = PDF::loadview('Admin.Laporan.laporan_pdf',['data'=>$data, 'pos'=>$pos, 'parameter'=>$parameter, 'sumber' => $sumber, 'set'=>$set, 'awal'=>$awal, 'akhir'=>$akhir]);
            }
    		// dd($pdf);
    		// return $pdf->download();
            return $pdf->stream('Monitoring-Report-'.$req->akhir);
    	
            // return view('Admin.Laporan.laporan_pdf',['data'=>$data, 'set'=>$set, 'awal'=>$awal, 'akhir'=>$akhir]);

            // return back();

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
        if (!$request->file('icon')) {
            $v = Validator::make($request->all(),[
                'header_img' => 'required|',
                'icon' => 'image|mimes:jpeg,png,jpg|max:2048',
            ]);
        } else {
            $v = Validator::make($request->all(),[
                'header_img' => 'required|',
                'icon' => 'image|mimes:jpeg,png,jpg|max:2048',
                'footer' => 'required|',
            ]);
        }
        if ($v->fails()) {
            return back()->withErrors($v)->withInput();
        } else {
            if ($request->file('icon')) {
                // Delete
                $foto_public = Laporan::find($id);
                File::delete($foto_public->foto);

                // Update foto
                $foto = $request->file('icon');
                $name = time().'_'.$foto->getClientOriginalName();
                $foto->move('foto/laporan/set', $name);

                Laporan::find($id)->update(
                    array_merge($request->only('header_img','footer'),
                        ['icon'=> 'foto/laporan/set/'.$name]
                    )
                );
                return back()->with('success','Setting Laporan berhasil di update');
            } else {
                Laporan::findOrFail($id)->update($request->only('header_img','footer')
            );
                return back()->with('success','Setting Laporan berhasil di update');
            }
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
        $kirimalarm = KirimAlarm::all();
        return view('Admin.Laporan.tab_set_kirim',compact('setkirim','kirimalarm'));
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
        ]);

        if ($v->fails()) {
            // dd($v->errors()->all());
            return back()->withErrors($v)->withInput();
        }else {

            $employee = SetKirim::create([
                'id_operator' => $req->email,
                'status_kirim' => $req->status,
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
        ]);

        if ($v->fails()) {
            // dd($v->errors()->all());
            return back()->withErrors($v)->withInput();
        }else {

            $operator = SetKirim::find($id);

            $operator->update([
                'id_operator' => $req->email,
                'status_kirim' => $req->status,
            ]);

            //  LogUser::create([
            //     'user_id' => Auth::user()->id,
            //     'detail' => 'added new category  product : '.$request->name
            // ]);

            return back()->with('success', 'Data berhasil diedit');
        }
    }
                // Kirim Alarm

    public function delete_alarm($id)
    {
        $data = KirimAlarm::findOrFail($id);
        $data->delete();
        return redirect()->back();
    }

    public function add_kirim_alarm()
    {
        $operator = Operator::all();
        return view('Admin.Laporan.Alarm.create',compact('operator'));
    }
    public function aksi_add_alarm(Request $req)
    {
        $v = Validator::make($req->all(), [
            'email' => 'required|',
            'custom' => 'required|'
        ]);

        if ($v->fails()) {
            // dd($v->errors()->all());
            return back()->withErrors($v)->withInput();
        }else {

            $employee = KirimAlarm::create([
                'id_operator' => $req->email,
                'custom_teks' => $req->custom,

            ]);


            //  LogUser::create([
            //     'user_id' => Auth::user()->id,
            //     'detail' => 'added new category  product : '.$request->name
            // ]);

            return back()->with('success', 'Data berhasil ditambahkan');
        }
    }
    public function edit_kirim_alarm($id)
    {
        $operator = Operator::all();
        $kirimalarm = KirimAlarm::findOrFail($id);
        return view('Admin.Laporan.Alarm.edit',compact('kirimalarm','operator'));
    }
    public function aksi_edit_alarm(Request $req, $id)
    {
        $v = Validator::make($req->all(), [
            'email' => 'required|',
            'custom' => 'required|'
        ]);

        if ($v->fails()) {
            // dd($v->errors()->all());
            return back()->withErrors($v)->withInput();
        }else {

            $operator = KirimAlarm::find($id);

            $operator->update([
                'id_operator' => $req->email,
                'custom_teks' => $req->custom,
            ]);

            //  LogUser::create([
            //     'user_id' => Auth::user()->id,
            //     'detail' => 'added new category  product : '.$request->name
            // ]);

            return back()->with('success', 'Data berhasil diedit');
        }
    }
    public function importview()
    {
        return view('Admin.Laporan.Aktivitas.excel');
    }
    public function export(Request $req)
    {
        $v = Validator::make($req->all(), [
            'awal' => 'required|date',
            'akhir' => 'required|date',
        ]);
        if ($req->awal > $req->akhir) {
             return back()->with('failed','Tanggal Awal Dilarang Melampaui Tanggal Akhir');
        }
        if ($v->fails()) {
            return back()->withErrors($v)->withInput();
        }else {
            $input = $req->all();
            set_time_limit(99999);
            return(new LaporanExport($input))->download('Aktivitas-'.$req->akhir.'.xlsx');
        }
    }
    public function ExportExcel(Request $req)
    {
        return view('Admin.Laporan.cetakexcel');
    }
    public function downloadExcel(Request $req)
    {
        $v = Validator::make($req->all(), [
            'awal' => 'required|date',
            'akhir' => 'required|date',
        ]);
        if ($req->awal > $req->akhir) {
             return back()->with('failed','Tanggal Awal Dilarang Melampaui Tanggal Akhir');
        }
        if ($v->fails()) {
            return back()->withErrors($v)->withInput();
        }else {
            $input = $req->all();
            set_time_limit(99999);
            return(new ExportLaporan($req->awal, $req->akhir,$req->satuan,$req->ruang))->download('Laporan-'.$req->akhir.'.xlsx');
        }
    }
    public function import()
    {
        Excel::import(new LaporanImport,request()->file('file'));
        return back();
    }
}
