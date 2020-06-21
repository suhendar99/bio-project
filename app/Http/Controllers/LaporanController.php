<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Laporan;

class LaporanController extends Controller
{
    public function index()
    {
        $data = DB::table('setlaporan')
        ->whereYear('created_at','')
        ->get();
        return view('Admin.Laporan.cetak');
    }
    public function set_laporan()
    {
        $data = Laporan::all();
    	return view('Admin.Setting.laporan.index');
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
