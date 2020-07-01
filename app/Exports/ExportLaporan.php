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
    protected $satuan, $ruangan;

    function __construct($input, $put, $satuan, $ruangan) {
        $this->awal = $input;
        $this->akhir = $put;
        $this->satuan = $satuan;
        $this->ruangan = $ruangan;
    }

    public function view(): view
    {
        $data = Monitoring::whereBetween('date',[$this->awal, $this->akhir]);
        

        if ($this->ruangan != 'all') {
            $data = $data->where('ruangan_id',$this->ruangan);
        }

        $data = $data->get();
        
        return view('Admin.Laporan.view', [
        'monitor' => $data,
        'satuan' => $this->satuan,
        ]);
        
    }
    public static function afterSheet(AfterSheet $event)
    {
        $event->getSheet()->getDelegate()->getStyle('A1:G1')->getFont()->setName('Calibri')->setSize(14);
    }
}
