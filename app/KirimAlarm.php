<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KirimAlarm extends Model
{
    protected $table = "kirim_alarms";
    protected $primarykey = "id";
    protected $fillable = [
        'id_operator','custom_teks'
    ];

    public function operator()
    {
        return $this->belongsTo('App\Operator','id_operator');
    }
}
