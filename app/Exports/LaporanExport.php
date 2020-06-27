<?php

namespace App\Exports;

use App\Aktivasi;
use Maatwebsite\Excel\Concerns\FromCollection;

class LaporanExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Aktivasi::all();
    }
}
