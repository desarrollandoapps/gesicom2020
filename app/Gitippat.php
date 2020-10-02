<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gitippat extends Model
{
    use SoftDeletes;
    protected $table = 'gitippat';
    protected $fillable = ['tpnomtip'];
}
