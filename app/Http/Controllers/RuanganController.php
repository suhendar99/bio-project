<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ruangan;

class RuanganController extends Controller
{
    public function index()
    {
    	$data = Ruangan::all();
    	return view('Admin.Master.dataruang', ['data'=>$data]);
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
