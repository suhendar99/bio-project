<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table ="setparameters";
    protected $primarykey ="id_setting";

    protected $fillable = [
        'suhu', 'kelembapan','cahaya', 'alarm', 'tekanan'
    ];
}
