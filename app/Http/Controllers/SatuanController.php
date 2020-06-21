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
<<<<<<< HEAD
    	return view('Admin.Setting.satuan',['data' => $data]);
=======
    	return view('Admin.Master.datasatuan',['data' => $data]);
>>>>>>> d1b6433a4eb6948840a1cb1553d11736ec509cfb
=======
    	return view('Admin.Setting.satuan',['data' => $data]);
>>>>>>> 0fca31439feafd262ba85ff93b724df719818601
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
