<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gitipart extends Model
{
    use SoftDeletes;
    protected $table = 'gitipart';
    protected $fillable = ['tanomtip'];
}
