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
            'name' 	=> 'required|',            
            'foto' 	=> 'image|mimes:jpeg,png,jpg|max:2048',
            'nik'	=> 'required',
            'no_hp' => 'required|numeric',
            'email'	=> 'required|email',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'required'
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
            return back()->with('success', 'Profil berhasil di update');
        }
    }
}
