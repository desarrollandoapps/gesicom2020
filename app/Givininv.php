<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Givininv extends Model
{
    //
    use SoftDeletes;
    protected $table = "givininv";
    protected $fillable = [
        'vinombre',
    ];
}
