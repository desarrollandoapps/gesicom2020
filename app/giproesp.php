<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class giproesp extends Model
{
    protected $table = 'giproesp';
    protected $fillable = [
        'petippro',
        'pedespro',
        'peporava',
        'peproinv'
    ];
}
