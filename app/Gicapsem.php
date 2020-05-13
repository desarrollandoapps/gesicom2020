<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gicapsem extends Model
{
    use SoftDeletes;
    
    protected $table = "gicapsem";
    protected $fillable = ['csnombre'];
}
