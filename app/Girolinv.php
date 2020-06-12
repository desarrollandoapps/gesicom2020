<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Girolinv extends Model
{
    //
    use SoftDeletes;
    protected $table = "girolinv";
    protected $fillable = [
        'rinombre',
    ];
}
