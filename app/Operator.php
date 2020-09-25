<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Operator extends Model
{
	use LogsActivity;
    
    protected $table = "users";
    protected $fillable = [
        'name', 'email', 'password', 'nik', 'instansi', 'jabatan' ,'no_hp', 'foto', 'level'
    ];

    public function setkirim()
    {
        return $this->hasMany('App\SetKirim','id_operator','id');
    }

    public function alarm()
    {
        return $this->hasMany('App\KirimAlarm','id_operator');
    }
    public function aktivasi()
    {
        return $this->hasMany('App\Aktivasi','id','causer_id');
    }
}
