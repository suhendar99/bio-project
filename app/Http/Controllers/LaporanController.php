<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Laporan;
use App\Monitoring;
use App\SetKirim;
use PDF;
use Validator;

class LaporanController extends Controller
{
    public function index()
    {
        // 
    }

    public function cetak_laporan()
    {
        return view('Admin.Laporan.cetak');
    }
    public function downloadLaporan(Request $req)
    {
        $awal = $req->awal;
        $akhir = $req->akhir;
        $set = Laporan::find(1)->first();
        $data = Monitoring::whereBetween('date',[$req->awal, $req->akhir])->latest()->get();
        // dd([$data, $req->all()]);


        // dd($count,$suhumax);
        
        $pdf = PDF::loadview('Admin.Laporan.laporan_pdf',['data'=>$data, 'set'=>$set, 'awal'=>$awal, 'akhir'=>$akhir]);
        // set_time_limit(300);
        return $pdf->download('Monitoring-Report-'.$req->akhir);
        // return view('Admin.Laporan.laporan_pdf',['data'=>$data, 'set'=>$set, 'awal'=>$awal, 'akhir'=>$akhir]);
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
            

            if($request->hasfile('header_img'))
            {                
                $name = rand(). '.' . $request->header_img->getClientOriginalExtension();           
                $request->header_img->move(public_path("foto/laporan/set"), $name);                                       
                $header_img = 'foto/laporan/set'.$name;
            }

            if($request->hasfile('icon'))
            {                
                $name = rand(). '.' . $request->icon->getClientOriginalExtension();           
                $request->icon->move(public_path("foto/laporan/set"), $name);                                       
                $icon = 'foto/laporan/set'.$name;
            }

            if($request->hasfile('footer'))
            {                
                $name = rand(). '.' . $request->footer->getClientOriginalExtension();           
                $request->footer->move(public_path("foto/laporan/set"), $name);                                       
                $footer = 'foto/laporan/set'.$name;
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
        return view('Admin.Laporan.Setting_kirim.index',compact('setkirim'));
    }
    public function add_kirim()
    {
        $setkirim = SetKirim::all();
        return view('Admin.Laporan.Setting_kirim.create',compact('setkirim'));   
    }
    public function aksi_add(Request $req)
    {
        $v = Validator::make($req->all(), [
            'email' => 'required|email|unique:set_kirims',
            'hp' => 'required|',
            'date' => 'required|date',
            'time' => 'required|',
        ]);

        if ($v->fails()) {
            return back()->withErrors($v)->withInput();
        }else {
            
            $employee = SetKirim::create([
                'email' => $req->email,
                'hp' => $req->hp,
                'date' => $req->date,
                'time' => $req->time,
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
        $setkirim = SetKirim::findOrFail($id);
        return view('Admin.Laporan.Setting_kirim.edit',compact('setkirim'));
    }
    public function aksi_edit(Request $req, $id)
    {
        $v = Validator::make($req->all(), [
            'email' => 'required|email|unique:set_kirims,email,'.$id,
            'hp' => 'required|',
            'date' => 'required|date',
            'time' => 'required|',
        ]);

        if ($v->fails()) {
            return back()->withErrors($v)->withInput();
        }else {
            
            $operator = SetKirim::find($id);

            $operator->update([
                'email' => $req->email,
                'hp' => $req->hp,
                'date' => $req->date,
                'time' => $req->time,
            ]);

            //  LogUser::create([
            //     'user_id' => Auth::user()->id,
            //     'detail' => 'added new category  product : '.$request->name
            // ]);
            
            return back()->with('success', 'Data berhasil ditambahkan');
        }        
    }
}
