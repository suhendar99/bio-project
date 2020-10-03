<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Log;

class LogController extends Controller
{
    public function index()
    {
    	# code...
    	$data = Log::latest();
    	// dd($data);
    	return view('Admin.Log.index');
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
