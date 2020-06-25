<?php

namespace App\Http\Controllers;

use Validator;
use App\Operator;
use App\Perangkat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

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
            'nama' => 'required|',
            'email' => 'required|email|unique:users',
            'nik' => 'required|numeric',
            'password' => 'required|min:6',
            'hp' => 'required|',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);
    	$foto = 'IMG-'.time().'-'.$req->foto->getClientOriginalName();
        $req->foto->move(public_path('foto'),$foto);

        $operator =  new operator;
        $operator->name = $req->nama;
        $operator->email = $req->email;
        $operator->password = Hash::make($req->password);
        $operator->nik = $req->nik;
        $operator->no_hp = $req->hp;
        $operator->foto = $foto;
        $operator->level = "Operator";

        if ($operator->save()) {
            return redirect()->back()->with('success','Data Berhasil di Tambahkan');
        }else {
            return back();   
        }
    }

    public function edit($id)
    {
        $operator = Operator::findOrFail($id);
        return view('Admin.Master.operator.op_edit',['operator'=>$operator]);
    }

    public function update(Request $req, $id)
    {
        $v = Validator::make($req->all(), [             
            'nama' => 'required|',
            'email' => 'required|email|unique:users,email,'.$id,
            'nik' => 'required|numeric|unique:users,nik,'.$id,
            'password' => 'required|min:6',
            'hp' => 'required|',
            'foto' => 'image|mimes:jpeg,png,jpg|max:2048'
            ]);

        if ($v->fails()) {
            dd($v->errors()->all());
            return back()->withErrors($v)->withInput();
        }else {
            $operator = Operator::find($id);
            
            $operator->update([
                'name' => $req->nama,
                'email' => $req->email,
                'password' => Hash::make($req->password),
                'nik' => $req->nik,
                'no_hp'=> $req->hp,
            ]);

            if($req->hasfile('foto'))
            {                
                $img = rand(). '.' . $req->foto->getClientOriginalExtension();           
                $req->foto->move(public_path("foto"), $img);                                       
                $foto = 'foto'.$img;
                if(is_writable(public_path($operator->foto))) {
                    unlink(public_path($operator->foto));
                }     
                $foto = 'foto'.$img;

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
            'no_seri' => 'required|numeric|unique:perangkats',
            'latitude' => 'required|',
            'longitude' => 'required|',
            'aktivasi' => 'required|date',
            'status' => 'required|'
        ]);

        Perangkat::create([
            'no_seri' => $req->no_seri,
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
        $this->validate($req,[
            'seri' => 'required|numeric|unique:perangkats,no_seri'.$id,
            'latitude' => 'required|',
            'longitude' => 'required|',
            'aktivasi' => 'required|date',
            'status' => 'required|'
        ]);
        
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
