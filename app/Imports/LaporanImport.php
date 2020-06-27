<?php

namespace App\Imports;

use App\Aktivasi;
use Maatwebsite\Excel\Concerns\ToModel;

class LaporanImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Aktivasi([
            'causer_id' => $row['causer_id'],
            'description' => $row['description'],
            'created_at' => $row['created_at'],
        ]);
    }
}
