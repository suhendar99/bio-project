<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    protected $table = "users";
    protected $primarykey = "id";
    protected $fillable = [
        'name', 'email', 'password', 'nik', 'instansi', 'jabatan' ,'no_hp', 'foto'
    ];
}
