<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gipatinv extends Model
{
    protected $table = 'gipatinv';
    protected $fillable = [
        'prcopare',
        'prnumrad',
        'prfecsol',
        'prtitobr',
        'prnumreg',
        'prespare',
        'prprovin',
        'prcodtip',
    ];
}
