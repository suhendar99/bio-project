<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use App\Operator;
use Auth;
use Validator;

class AccountController extends Controller
{
    public function index()
    {
    	$data = Operator::where('id',Auth::user()->id)->first();
    	return view('Admin.Account.index',['data'=>$data]);
    }

    public function edit($id)
    {
    	$data = Operator::find($id);
    	return view('Admin.Account.edit',['data'=>$data]);
    }

    public function update(Request $req, $id)
    {
    	$v = Validator::make($req->all(), [             
            'name' 	=> 'required|',            
            'foto' 	=> 'image|mimes:jpeg,png,jpg|max:2048',
            'no_hp' => 'required|numeric',
            'nik'	=> 'required|numeric|unique:users,nik,'.$id,
            'email'	=> 'required|email|unique:users,email,'.$id,
        ]);

        if ($v->fails()) {
            return back()->withErrors($v)->withInput();
        }else {
            $data = Operator::find($id);

            if ($req->file('foto')) {
                File::delete('foto/'.$data->foto);

                $foto = 'IMG-'.time().'-'.$req->foto->getClientOriginalName();
                $req->foto->move(public_path('foto'),$foto);

                $data->update([
                    'name'  => $req->name,
                    'nik'   => $req->nik,
                    'no_hp' => $req->no_hp,
                    'level' => $req->level,
                    'email' => $req->email,
                    'foto' => $foto,
                ]);
            } else {
                $data->update([
                    'name'  => $req->name,
                    'nik'   => $req->nik,
                    'no_hp' => $req->no_hp,
                    'level' => $req->level,
                    'email' => $req->email,
                ]);
            }   
            // dd($data);
            return back()->with('success', 'Profil berhasil di update');
        }
    }

    public function editPass($id)
    {
    	$data = Operator::find($id);
    	return view('Admin.Account.setpass',['data'=>$data]);
    }

    public function updatePass(Request $req, $id)
    {
    	$v = Validator::make($req->all(), [     
            'password' => 'min:6',
    		'password_confirmation' => 'required_with:password|same:password|min:6'
        ]);

        if ($v->fails()) {
            return back()->withErrors($v)->withInput();
        }else {
            $data = Operator::find($id);
            
            $data->update([
                // 'name' 	=> $req->name,
                // 'nik' 	=> $req->nik,
                // 'no_hp'	=> $req->no_hp,
                // 'level' => $req->level,
                // 'email'	=> $req->email,
                'password' => Hash::make($req->password),
                // 'foto' => $req->foto,
            ]);
            // dd($data);
            return back()->with('success', 'Profil berhasil di update');
        }
    }
}
