<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mqtt extends Model
{
    protected $table = 'setmqtts';
    protected $primarykey = "id";
    protected $fillable = [
    	'keep_alive','password','qos','url_broker','username'
    ];
}
