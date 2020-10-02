<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class gidepres extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'dpproinv',
        'dpproesp',
        'dpfecreg',
        'dpporava',
        'dpenlace'
    ];
}
