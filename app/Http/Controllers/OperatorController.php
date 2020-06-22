<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\operator;
use App\Perangkat;
use Validator;

class OperatorController extends Controller
{
    public function index()
    {
        $data = Operator::all();
        return view('Admin.Master.operator.index',['data'=>$data]);
    }
    public function dataper()
    {
        $perangkat = Perangkat::all();
        return view('Admin.Master.Perangkat.dataper', compact('perangkat'));
    }

    public function create()
    {
        return view('Admin.Master.operator.op_create');
    }

    public function store(Request $req)
    {
        $this->validate($req,[
            'name' => 'required|min:2',
            'email' => 'required|email|unique:users',
            'nik' => 'required|numeric',
            'password' => 'required|min:6',
            'foto' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048'
        ]);
    	$foto = 'IMG-'.time().'-'.$req->foto->getClientOriginalName();
        $req->foto->move(public_path('foto'),$foto);

        $operator =  new operator;
        $operator->name = $req->name;
        $operator->email = $req->email;
        $operator->password = Hash::make($req->password);
        $operator->nik = $req->nik;
        $operator->instansi = $req->instansi;
        $operator->no_hp = $req->hp;
        $operator->foto = $foto;
        if ($operator->save()) {
            return redirect()->back()->with('success','Data Berhasil di Tambahkan');
        }else {
            return back();   
        }
    }

    public function edit($id)
    {
        $data = Operator::findOrFail($id);
        return view('Admin.Master.operator.op_edit',['data'=>$data]);
    }

    public function update(Request $req, $id)
    {
        $v = Validator::make($req->all(), [             
            'nama' => 'required|',
            'email' => 'required|email|unique:users,email,'.$id,
            'nik' => 'required|numeric|unique:users,nik,'.$id,
            'foto' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($v->fails()) {
            // dd($v->errors()->all());
            return back()->withErrors($v)->withInput();
        }else {
            $operator = Operator::find($id);
            
            $operator->update([
                'name' => $req->nama,
                'email' => $req->email,
                'password' => Hash::make($req->password),
                'nik' => $req->nik,
                'instansi' => $req->instansi,
                'no_hp'=> $req->hp,
            ]);

            if($req->hasfile('foto'))
            {                
                $name = rand(). '.' . $req->foto->getClientOriginalExtension();           
                $req->foto->move(public_path("foto"), $name);                                       
                $foto = 'foto'.$name;
                if(is_writable(public_path($operator->foto))) {                    
                    unlink(public_path($operator->foto));
                }     
                $foto = 'foto'.$name;

                $operator->update([
                    'foto' => $foto,
                ]);
            }            
            
            //  LogUser::create([
            //     'user_id' => Auth::user()->id,
            //     'detail' => 'added new category  product : '.$request->name
            // ]);
            
            return back()->with('success', 'Data berhasil di update');
        }
    }

    public function delete($id)
    {
        $data = Operator::findOrFail($id);
        $data->delete();
        return redirect()->back();
    }
    public function create_per()
    {
        return view('Admin.Master.Perangkat.create');
    }
    public function store_per(Request $req)
    {
        $this->validate($req,[
            'seri' => 'required|numeric:',
            'latitude' => 'required|',
            'longitude' => 'required|',
            'aktivasi' => 'required|date',
            'status' => 'required|'
        ]);

        Perangkat::create([
            'no_seri' => $req->seri,
            'latitude' => $req->latitude,
            'longitude' => $req->longitude,
            'tgl_aktivasi' => $req->aktivasi,
            'status' => $req->status
        ]);
        return redirect()->back()->with('success','Data Telah Di Tambahkan');
    }
    public function edit_per($id)
    {
        $perangkat = Perangkat::findOrFail($id);
        return view('Admin.Master.Perangkat.edit',['perangkat'=>$perangkat]);
    }
    public function update_per(Request $req, $id)
    {
        $perangkat = Perangkat::findOrFail($id);
        $perangkat->no_seri = $req->seri;
        $perangkat->latitude = $req->latitude;
        $perangkat->longitude = $req->longitude;
        $perangkat->tgl_aktivasi = $req->aktivasi;
        $perangkat->status = $req->status;
        $perangkat->save();
        return redirect()->back()->with('success','Data Di Edit');

    }
    public function delete_per($id)
    {
        $perangkat = Perangkat::findOrFail($id);
        $perangkat->delete();
        return redirect()->back();
    }
}
