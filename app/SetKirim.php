<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class SetKirim extends Model
{
	use LogsActivity;
    
    protected $guarded = [];

    public function Operator()
    {
        return $this->belongsTo('App\Operator','id_operator','id');
    }

}
