<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Giseminv extends Model
{
    use SoftDeletes;
    protected $table = "giseminv";
    protected $fillable = [
        'sinombre',
        'sitipdoc',
        'sinumdoc',
        'sifecexp',
        'simunexp',
        'sirolsen',
        'siprofes',
        'sicorper',
        'sicorsen',
        'sinumcel',
        'sitelfij',
        'sinumeip',
        'sifecnac',
        'sitipvin',
        'siantsen',
        'sigrafor',
        'sititulo',
        'siniving',
        'siproyec',
        'siarecon',
        'sicering',
        'sititula',
        'sinumfic',
        'siinstru',
        'siterlec',
        'siterpro',
        'siambfor',
        'siprored',
        'siparred',
        'sicurinv',
        'siforpro',
        'sigruinv',
        'sisemill'
    ];
}
