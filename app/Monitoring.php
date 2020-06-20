<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Monitoring extends Model
{
    protected $table = "monitoring";
    protected $primarykey = "id_monitoring";
    protected $fillable = [
        'suhu','kelembapan','tekanan','cahaya','alarm','perangkat_id'
    ];

}
