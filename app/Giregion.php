<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Giregion extends Model
{
    use SoftDeletes;
    protected $table = "giregion";
    protected $fillable = [
        'renombre'
    ];
}
