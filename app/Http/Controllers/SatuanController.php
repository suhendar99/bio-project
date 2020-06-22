<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Satuan;
use Validator;

class SatuanController extends Controller
{
    public function index()
    {
    	$data = Satuan::all();
    	return view('Admin.Master.satuan.index',['data' => $data]);
    }

    public function create()
    {
        return view('Admin.Master.satuan.create');
    }

    public function store(Request $request)
    {
    	$v = Validator::make($request->all(), [             
            'parameter' => 'required|',            
            'satuan' => 'required|',
        ]);

        if ($v->fails()) {
            return back()->withErrors($v)->withInput();
        }else {

            $data = Satuan::create([
                'parameter' => $request->parameter,
                'satuan' => $request->satuan,
            ]);
            
            return back()->with('success', 'Satuan berhasil ditambahkan');
        }
    }

    public function edit($id)
    {
    	$data['satuan'] = Satuan::find($id);
        if (!$data['satuan']) {
            return back();
        }
        return view('Admin.Master.satuan.edit', $data);
    }

    public function update(Request $request, $id)
    {
    	$v = Validator::make($request->all(), [             
            'parameter' => 'required|',            
            'satuan' => 'required|',
        ]);

        if ($v->fails()) {
            return back()->withErrors($v)->withInput();
        }else {
            $data = Satuan::find($id);
            
            $data->update([
                'parameter' => $request->parameter,
                'satuan' => $request->satuan
            ]);
            
            return back()->with('success', 'Data Satuan berhasil di update');
        }
    }

    public function destroy($id)
    {
    	$data = Satuan::find($id);
        $data->delete();
        return redirect('/satuan')->with('success', 'Data Satuan berhasil di hapus');
    }
}
