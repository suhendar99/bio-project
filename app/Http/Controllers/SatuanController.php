<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Satuan;

class SatuanController extends Controller
{
    public function index()
    {
    	$data = Satuan::all();
<<<<<<< HEAD
    	return view('Admin.Setting.satuan',['data' => $data]);
=======
    	return view('Admin.Master.datasatuan',['data' => $data]);
>>>>>>> d1b6433a4eb6948840a1cb1553d11736ec509cfb
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
