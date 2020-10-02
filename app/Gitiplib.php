<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gitiplib extends Model
{
    use SoftDeletes;
    protected $table = 'gitiplib';
    protected $fillable = ['tlnomtip'];
}
