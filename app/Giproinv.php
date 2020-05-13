<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Giproinv extends Model
{
    use SoftDeletes;
    protected $table = 'giproinv';
    protected $fillable = [
        'piregion',
        'picenfor',
        'pianofor',
        'pinompro',
        'pinumrad',
        'pivalpre',
        'pianoeje',
        'pilinpro'
    ];
}
