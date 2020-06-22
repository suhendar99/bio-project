<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mqtt;

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
    
    public function edit($id)
    {
        $data = Mqtt::all();
        return view('Admin.Pengaturan.index', ['data'=>$data]);
    }

    public function update(Request $req, $id)
    {
        $data = Mqtt::findOrFail($id);
        $data->url_broker = $req->broker;
        $data->usename = $req->username;
        $data->password = $req->password;
        $data->qos = $req->qos;
        $data->keep_alive = $req->keep;
        return redirect()->back()->with('success','Data Di Update');
    }

    public function delete($id)
    {
    	# code...
    }
}
