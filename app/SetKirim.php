<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class SetKirim extends Model
{
	use LogsActivity;
    protected $table="set_kirims";
    protected $fillable = [
        'email','hp','date','time'
    ];
}
