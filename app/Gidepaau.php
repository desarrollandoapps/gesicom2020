<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gidepaau extends Model
{
    use SoftDeletes;
    protected $table = 'gidepaau';
    protected $fillable = [
        'dpinvest', 
        'dppatinv'
    ];
}
