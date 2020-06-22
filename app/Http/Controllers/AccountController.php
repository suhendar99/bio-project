<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
            'name' 	=> 'max:25',            
            'foto' 	=> 'image|mimes:jpeg,png,jpg|max:2048',
            'no_hp' => 'numeric',
            'nik'	=> 'numeric|unique:users,nik,'.$id,
            'email'	=> 'email|unique:users,email,'.$id,
        ]);

        if ($v->fails()) {
            return back()->withErrors($v)->withInput();
        }else {
            $data = Operator::find($id);
            
            $data->update([
                'name' 	=> $req->name,
                'nik' 	=> $req->nik,
                'no_hp'	=> $req->no_hp,
                'level' => $req->level,
                'email'	=> $req->email,
                'password' => Hash::make($req->password),
            ]);

            if($req->hasfile('foto'))
            {
                $foto = 'IMG-'.time().'-'.$req->foto->getClientOriginalName();
        		$req->foto->move(public_path('foto'),$foto);

                $data->update([
                    'foto' => $foto,
                ]);
            }            
            // dd($data);
            return redirect('/')->with('success', 'Profil berhasil di update');
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
                'name' 	=> $req->name,
                'nik' 	=> $req->nik,
                'no_hp'	=> $req->no_hp,
                'level' => $req->level,
                'email'	=> $req->email,
                'password' => Hash::make($req->password),
                'foto' => $req->foto,
            ]);
            // dd($data);
            return back()->with('success', 'Profil berhasil di update');
        }
    }
}
