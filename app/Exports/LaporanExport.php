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

    public function heading(): array
    {
        return [
            Aktivasi::class    => function(Aktivasi $event) {
                // All headers - set font size to 14
                $cellRange = 'A1:W1'; 
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
    
                // Apply array of styles to B2:G8 cell range
                $styleArray = [
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                            'color' => ['argb' => 'FFFF0000'],
                        ]
                    ]
                ];
                $event->sheet->getDelegate()->getStyle('B2:G8')->applyFromArray($styleArray);
    
                // Set first row to height 20
                $event->sheet->getDelegate()->getRowDimension(1)->setRowHeight(20);
    
                // Set A1:D4 range to wrap text in cells
                $event->sheet->getDelegate()->getStyle('A1:D4')
                    ->getAlignment()->setWrapText(true);
            }
        ];
    }
}
