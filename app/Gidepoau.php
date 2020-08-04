<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gidepoau extends Model
{
    use SoftDeletes;
    protected $table = 'gidepoau';
    protected $fillable = [
        'dpinvest', 
        'dpponinv'
    ];
}
