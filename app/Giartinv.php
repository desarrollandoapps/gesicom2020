<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Giartinv extends Model
{
    protected $table = 'giartinv';
    protected $fillable = [
        'aititulo',
        'aipagini',
        'aipagfin',
        'aianopub',
        'aimespub',
        'ainomrev',
        'aivolrev',
        'aiserrev',
        'aiciupub',
        'aimeddiv',
        'aicoissn',
        'aicoddoi',
        'aisitweb',
        'aiprovin',
        'aicodtip',
    ];
}
