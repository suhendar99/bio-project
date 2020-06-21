<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ruangan;
use Validator;

class RuanganController extends Controller
{
    public function index()
    {
    	$data = Ruangan::all();
    	return view('Admin.Master.dataruang.index', ['data'=>$data]);
    }

    public function create()
    {
    	return view('Admin.Master.dataruang.create');
    }

    public function store(Request $request)
    {
    	$v = Validator::make($request->all(), [             
            'nama' => 'required|',            
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($v->fails()) {
            return back()->withErrors($v)->withInput();
        }else {
            

            if($request->hasfile('foto'))
            {                
                $name = rand(). '.' . $request->foto->getClientOriginalExtension();           
                $request->foto->move(public_path("foto/ruangan"), $name);                                       
                $foto = 'foto/ruangan/'.$name;
            }

            $employee = Ruangan::create([
                'nama' => $request->nama,
                'foto' => $foto,
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
    	# code...
    }

    public function update(Request $req, $id)
    {
    	# code...
    }

    public function delete($id)
    {
    	# code...
    }
}
