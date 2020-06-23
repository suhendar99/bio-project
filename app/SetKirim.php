<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SetKirim extends Model
{
    protected $table="set_kirims";
    protected $fillable = [
        'email','hp','date','time'
    ];
}
