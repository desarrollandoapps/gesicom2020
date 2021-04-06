<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gidetinv extends Model
{
    use SoftDeletes;
    protected $table = 'gidetinv';
    protected $fillable = [
        'diinvest', 
        'diproinv',
        'difecvin',
        'difecdes',
        'dirolinv'
    ];
}
