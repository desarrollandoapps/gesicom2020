<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Girubpre extends Model
{
    use SoftDeletes;
    protected $table = 'girubpre';
    protected $fillable = [
        'rpdesrub'
    ];
}
