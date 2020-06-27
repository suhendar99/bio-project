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

    public function headings(): array
    {
        return [
            'causer_id',
            'description',
            'created_at'
        ];
    }
}
