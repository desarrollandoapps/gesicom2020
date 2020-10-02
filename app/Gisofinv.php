<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gisofinv extends Model
{
    use SoftDeletes;
    protected $table = 'gisofinv';
    protected $fillable = [
        'sinumrad',
        'sifecrad',
        'sinumreg',
        'sititobr',
        'siesttra',
        'siprovin',
    ];
}
