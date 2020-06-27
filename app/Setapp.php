<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Setapp extends Model
{
	use LogsActivity;

    protected $table = 'setapps';
    protected $fillable = [
    	'icon','nama_apps','overview','tab'
    ];

    
}
