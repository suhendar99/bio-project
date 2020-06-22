<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Mqtt;
use Validator;

class MqttController extends Controller
{
    public function index()
    {
        # code...
    }
    
    public function store(Request $req)
    {
        # code...
    }
    
    public function edit()
    {
        $mqtt = Mqtt::where('id',1)->first();
        return view('Admin.Pengaturan.index', ['mqtt'=>$mqtt]);
    }

    public function update(Request $req, $id)
    {
        $v = Validator::make($req->all(), [
            'broker' => 'required|url',
            'username' => 'required|',
            'password' => 'required|',
            'qos' => 'required|',
            'alive' => 'required'

        ]);
        if ($v->fails()) {
            // dd($v->errors()->all());
            return back()->withErrors($v)->withInput();
        }else {
            $mqtt = Mqtt::find($id);
            
            $mqtt->update([
                'url_broker' => $req->broker,
                'username' => $req->username,
                'password' => $req->password,
                'qos' => $req->qos, 
                'keep_alive' => $req->alive,
            ]);
        }
        return redirect()->back()->with('success','Data Di Update');
    }

    public function delete($id)
    {
    	# code...
    }
}
