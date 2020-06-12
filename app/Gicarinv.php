<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gicarinv extends Model
{
    //
    use SoftDeletes;
    protected $table = "gicarinv";
    protected $fillable = [
        'cinombre',
    ];
}
