<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gidearau extends Model
{
    use SoftDeletes;
    protected $table = 'gidearau';
    protected $fillable = [
        'dainvest', 
        'daartinv'
    ];
}
