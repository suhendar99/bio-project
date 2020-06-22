<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Laporan;

class LaporanController extends Controller
{
    public function index()
    {
        // 
    }
    public function set_laporan()
    {
        $laporan = Laporan::all();
        return view('Admin.Laporan.PengaturanLaporan.index', compact('laporan'));
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
