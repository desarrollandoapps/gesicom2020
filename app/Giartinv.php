<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Giartinv extends Model
{
    use SoftDeletes;
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
        'aicodtip'
    ];
}
