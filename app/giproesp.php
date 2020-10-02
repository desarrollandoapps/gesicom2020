<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class giproesp extends Model
{
    use SoftDeletes;
    protected $table = 'giproesp';
    protected $fillable = [
        'petippro',
        'pedespro',
        'peporava',
        'peproinv'
    ];
}
