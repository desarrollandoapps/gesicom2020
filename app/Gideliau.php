<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gideliau extends Model
{
    use SoftDeletes;
    protected $table = 'gideliau';
    protected $fillable = [
        'dlinvest', 
        'dllibinv'
    ];
}
