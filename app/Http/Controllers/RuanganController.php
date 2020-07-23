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
            'smax' => 'required',
            'smin' => 'required',
            'kmax' => 'required',
            'kmin' => 'required',
            'tmax' => 'required',
            'tmin' => 'required',
        ]);

        if ($v->fails()) {
            return back()->withErrors($v)->withInput();
        }else {
            
            if ($request->smax < $request->smin || $request->kmax < $request->kmin || $request->tmax < $request->tmin) {
                return back()->with('failed', 'Parameter Maksimum Harus Lebih Besar Dari Minimum');
            }
            if($request->hasfile('foto'))
            {                
                $name = rand(). '.' . $request->foto->getClientOriginalExtension();           
                $request->foto->move(public_path("foto/ruangan"), $name);                                       
                $foto = 'foto/ruangan/'.$name;
            }

            $employee = Ruangan::create([
                'nama' => $request->nama,
                'foto' => $foto,
                'nama' => $request->nama,
                'smax' => $request->smax,
                'smin' => $request->smin,
                'kmax' => $request->kmax,
                'kmin' => $request->kmin,
                'tmax' => $request->tmax,
                'tmin' => $request->tmin,
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
    	$data['ruangan'] = Ruangan::find($id);
        if (!$data['ruangan']) {
            return back();
        }
        return view('Admin.Master.dataruang.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $v = Validator::make($request->all(), [             
            'nama' => 'required|',            
            'foto' => 'image|mimes:jpeg,png,jpg|max:2048',
            'smax' => 'required|',
            'smin' => 'required|',
            'kmax' => 'required|',
            'kmin' => 'required|',
            'tmax' => 'required|',
            'tmin' => 'required|',
        ]);

        if ($v->fails()) {
            return back()->withErrors($v)->withInput();
        }else {
            if ($request->smax < $request->smin || $request->kmax < $request->kmin || $request->tmax < $request->tmin) {
                return back()->with('failed', 'Parameter Maksimum Harus Lebih Besar Dari Minimum');
            }
            $ruangan = Ruangan::find($id);
            
            $ruangan->update([
                'nama' => $request->nama,
                'smax' => $request->smax,
                'smin' => $request->smin,
                'kmax' => $request->kmax,
                'kmin' => $request->kmin,
                'tmax' => $request->tmax,
                'tmin' => $request->tmin,
            ]);

            if($request->hasfile('foto'))
            {                
                $name = rand(). '.' . $request->foto->getClientOriginalExtension();
                File::delete($ruangan->foto);
                $request->foto->move(public_path("foto/ruangan"), $name);                                       
                $foto = 'foto/ruangan/'.$name;
                if(is_writable(public_path($ruangan->foto))) {                    
                    unlink(public_path($ruangan->foto));
                }     
                $foto = 'foto/ruangan/'.$name;

                $ruangan->update([
                    'foto' => $foto,
                ]);
            }            
            // dd($ruangan);
            if ($ruangan) {
                return back()->with('success', 'Data ruangan berhasil di update');
            } else {
                return back()->with('failed', 'Data ruangan gagal di update');
            }
            //  LogUser::create([
            //     'user_id' => Auth::user()->id,
            //     'detail' => 'added new category  product : '.$request->name
            // ]);
            
            
        }
    }

    public function destroy($id)
    {
        $ruangan = Ruangan::find($id);
        if ($ruangan->foto) {            
            if (is_writable(public_path($ruangan->foto))) {
                unlink(public_path($ruangan->foto));
            }
        }
        $ruangan->delete();
        return back();
    }
}
