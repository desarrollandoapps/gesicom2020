<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gilibinv extends Model
{
    protected $table = 'gilibinv';
    protected $fillable = [
        'linomlib',
        'linumpag',
        'lianopub',
        'limespub',
        'lidiapub',
        'lieditor',
        'liciupub',
        'limeddiv',
        'licoisbn',
        'lisitweb',
        'liprovin',
        'licodtip',
    ];
}
