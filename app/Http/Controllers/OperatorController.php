<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\operator;
use App\Perangkat;

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
        return view('Admin.Master.dataper', compact('perangkat'));
    }

    public function create()
    {
        return view('Admin.Master.Create.op_create');
    }

    public function store(Request $req)
    {
    	$foto = 'IMG-'.time().'-'.$req->foto->getClientOriginalName();
        $req->foto->move(public_path('foto'),$foto);

        $operator =  new operator;
        $operator->name = $req->name;
        $operator->email = $req->email;
        $operator->password = $req->password;
        $operator->nik = $req->nik;
        $operator->instansi = $req->instansi;
        $operator->no_hp = $req->hp;
        $operator->foto = $foto;
        if ($operator->save()) {
            return redirect('/operator');
        }else {
            return back();   
        }
    }

    public function edit($id)
    {
        $data = Operator::findOrFail($id);
        return view('Admin.Master.edit.op_edit',['data'=>$data]);
    }

    public function update(Request $req, $id)
    {
    	$foto = 'IMG-'.time().'-'.$req->foto->getClientOriginalName();
        $req->foto->move(public_path('foto'),$foto);

        $operator =  Operator::find($id);
        $operator->name = $req->name;
        $operator->email = $req->email;
        $operator->password = $req->password;
        $operator->nik = $req->nik;
        $operator->instansi = $req->instansi;
        $operator->no_hp = $req->hp;
        $operator->foto = $foto;
        $operator->save();
        return redirect('/operator');
    }

    public function delete($id)
    {
        $data = Operator::findOrFail($id);
        $data->delete();
        return redirect()->back();
    }

}
