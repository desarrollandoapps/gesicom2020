<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gigrados extends Model
{
    //
    use SoftDeletes;
    protected $table = "gigrados";
    protected $fillable = [
        'grnombre',
    ];
}
