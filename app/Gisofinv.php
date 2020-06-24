<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gisofinv extends Model
{
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
