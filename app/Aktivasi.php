<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aktivasi extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'activity_log';

    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    
    protected $guarded = [];

    public function operator()
    {
        return $this->belongsTo('App\Operator','causer_id','id');
    }
}
