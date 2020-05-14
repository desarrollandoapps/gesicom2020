<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gidetcap extends Model
{
    use SoftDeletes;
    protected $table = "gidetcap";
    protected $fillable = [
        'dcsemill',
        'dccapaci'
    ];
}
