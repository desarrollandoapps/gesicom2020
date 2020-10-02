<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Giponinv extends Model
{
    use SoftDeletes;
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