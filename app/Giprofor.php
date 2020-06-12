<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Giprofor extends Model
{
    use SoftDeletes;
    protected $table = 'giprofor';
    protected $fillable = [
        'pfnombre',
    ];
}
