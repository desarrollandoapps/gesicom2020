<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gipatinv extends Model
{
    use SoftDeletes;
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
