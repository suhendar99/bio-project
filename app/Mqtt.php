<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Mqtt extends Model
{
	use LogsActivity;
    protected $table = 'setmqtts';
    protected $primarykey = "id";
    protected $fillable = [
    	'keep_alive','password','qos','url_broker','username','topic'
    ];
}
