<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gipatinv extends Model
{
    protected $table = 'gipatinv';
    protected $fillable = [
        'pinumrad',
        'pifecsol',
        'pititobr',
        'pinumreg',
        'piprovin',
        'picodtip'
    ];
}
