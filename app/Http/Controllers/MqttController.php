<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mqtt;

class MqttController extends Controller
{
    public function index()
    {
    	$data = Mqtt::all();
    	return view('Admin.Setting.mqtt.index', ['data'=>$data]);
    }

    public function store(Request $req)
    {
    	# code...
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
