<?php

namespace App\Exports;

use App\Aktivasi;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class LaporanExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public function view(): view
    {
        return view('Admin.Laporan.Aktivitas.view', [
            'Aktivasi' => Aktivasi::all()
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
