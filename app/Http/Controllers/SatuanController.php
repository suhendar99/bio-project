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
    	return view('Admin.Master.datasatuan',['data' => $data]);
=======
    	return view('Admin.Master.datasatuan',['data' => $data] );
>>>>>>> 7a5bed8a655cdccc7284664be210aed2d6e450c7
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
