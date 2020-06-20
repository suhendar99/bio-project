<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mqtt extends Model
{
    protected $table = 'setmqtt';
    protected $fillable = [
    	'keep_alive','password','qos','url_broker','username'
    ];
}
