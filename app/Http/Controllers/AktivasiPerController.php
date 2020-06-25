<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AktivasiPerangkat;
use App\Perangkat;
use App\Ruangan;
use Validator;

class AktivasiPerController extends Controller
{
    public function index()
    {
    	$data = AktivasiPerangkat::all();

    	return view('Admin.Master.aktivasiper.index', ['data'=>$data]);
    }

    public function create()
    {
    	$perangkat = Perangkat::all();
    	$ruangan = Ruangan::all();
    	return view('Admin.Master.aktivasiper.create', ['perangkat'=>$perangkat,'ruangan'=>$ruangan]);
    }

    public function store(Request $request)
    {
    	// dd($request);
    	$v = Validator::make($request->all(), [             
            'id_perangkat' => 'required|',            
            'id_ruangan' => 'required|',
        ]);

        if ($v->fails()) {
            return back()->withErrors($v)->withInput();
        }else {
            
        	$data = AktivasiPerangkat::where([['id_perangkat',$request->id_perangkat], ['id_ruangan',$request->id_ruangan]])->exists();
        	// dd($data);
            if ($data) 
            {
            	return back()->with('failed','Data Sudah Ada(Tidak Boleh Sama)');
            } else {
            	$employee = AktivasiPerangkat::create([
	                'id_perangkat' => $request->id_perangkat,
	                'id_ruangan' => $request->id_ruangan,
	            ]);
	            
	            return back()->with('success', 'Aktivasi berhasil ditambahkan');
            }
            
        }
    }

    public function edit($id)
    {
    	// dd($id);
    	$perangkat = Perangkat::all();
    	$ruangan = Ruangan::all();
    	$data = AktivasiPerangkat::where('id', $id)->first();
    	// dd($data);
        if (!$data) {
            return back();
        }
        return view('Admin.Master.aktivasiper.edit', ['data'=>$data,'perangkat'=>$perangkat,'ruangan'=>$ruangan]);
    }

    public function update(Request $request, $id)
    {
        $v = Validator::make($request->all(), [             
            'id_perangkat' => 'required|',            
            'id_ruangan' => 'required|',
        ]);

        if ($v->fails()) {
            return back()->withErrors($v)->withInput();
        }else {
        	$data = AktivasiPerangkat::where([['id_perangkat',$request->id_perangkat], ['id_ruangan',$request->id_ruangan]])->exists();
        	if ($data) {
        		return back()->with('failed','Data Sudah Ada(Tidak Boleh Sama)');
        	} else {
        		$ruangan = AktivasiPerangkat::find($id);
            
	            $ruangan->update([
	                'id_ruangan' => $request->id_ruangan,
	                'id_perangkat' => $request->id_perangkat
	            ]);
        	}
            

            return back()->with('success', 'Data Aktivasi berhasil di update');
        }
    }

    public function destroy($id)
    {
        $aktivasiper = AktivasiPerangkat::find($id);
        $aktivasiper->delete();
        return back();
    }
}
