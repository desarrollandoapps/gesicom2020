<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Giponinv extends Model
{
    protected $table = 'giponinv';
    protected $fillable = [
        'pititulo',
        'pievento',
        'pifecini',
        'pifecfin',
        'pifecpon',
        'piciudad',
        'pipagweb',
        'piambito',
        'piprovin',
        'pilinvin',
        'picodtip'
    ];
}