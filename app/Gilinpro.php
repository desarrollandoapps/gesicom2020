<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gilinpro extends Model
{
    use SoftDeletes;
    protected $table = 'gilinpro';
    protected $fillable = [
        'lpcodlin',
        'lpnomlin'
    ];
}
