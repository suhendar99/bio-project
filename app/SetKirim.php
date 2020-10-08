<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class SetKirim extends Model
{
	use LogsActivity;
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'set_kirims';
    protected $guarded = [];

    public function Operator()
    {
        return $this->belongsTo('App\Operator','id_operator','id');
    }

}
