<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gitippon extends Model
{
    use SoftDeletes;
    protected $table = 'gitippon';
    protected $fillable = ['tpnomtip'];
}
