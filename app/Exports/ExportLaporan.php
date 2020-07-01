<?php

namespace App\Exports;

use App\Monitoring;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Carbon\Carbon;

class ExportLaporan implements FromView, ShouldAutoSize
{
    use Exportable;

    public $awal;
    public $akhir;

    function __construct($input, $put) {
        $this->awal = $input;
        $this->akhir = $put;
    }

    public function view(): view
    {
        // dd($this->input['awal']);
        // $awal = $this->input['awal'];
        // $akhir = $this->input['akhir'];

        $data = Monitoring::whereBetween('date',[$this->awal, $this->akhir])->latest()->get();

        // $date1 = new Carbon($this->input['awal']);
        // $date2 = new Carbon($this->input['akhir']);
        // $date2 = $date2->addDays(1);
        // dd($input);
        return view('Admin.Laporan.view', [
        'monitor' => $data
        ]);
        
    }
}
