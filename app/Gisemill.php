<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gisemill extends Model
{
    use SoftDeletes;
    protected $table = "gisemill";
    protected $fillable = [
        'seidsemi',
        'senombre'
    ];
}
