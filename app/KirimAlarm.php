<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KirimAlarm extends Model
{
    
    protected $guarded = [];

    public function operator()
    {
        return $this->belongsTo('App\Operator','id_operator');
    }
}
