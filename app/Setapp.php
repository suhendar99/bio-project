<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setapp extends Model
{

    protected $table = 'setapps';
    protected $fillable = [
    	'icon','nama_apps','overview'
    ]
}
