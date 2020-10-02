<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gilininv extends Model
{
    use SoftDeletes;
    protected $table = "gilininv";
    protected $fillable = ['lideslin', 'licodgru'];
}
