<?php

namespace App\Exports;

use App\Aktivasi;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Carbon\Carbon;





class LaporanExport implements FromView, ShouldAutoSize
{
    use Exportable;

    function __construct($input) {
        $this->input = $input;
    }

    public function view(): view
    {
        // dd($this->input['awal']);
        $awal = $this->input['awal'];
        $akhir = $this->input['akhir'];

        
        $date1 = new Carbon($this->input['awal']);
        $date2 = new Carbon($this->input['akhir']);
        $date2 = $date2->addDays(1);
        // dd($input);
        return view('Admin.Laporan.Aktivitas.view', [
        'Aktivasi' => Aktivasi::where('created_at','>=',$date1->format('Y-m-d'))->where('created_at','<=',$date2->format('Y-m-d'))->latest()->get()
        ]);
        
    }

    public function headings(): array
    {
        return [
            'causer_id',
            'description',
            'created_at'
        ];
    }
}
