<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gilibinv extends Model
{
    use SoftDeletes;
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
        'licodtip'
    ];
}
