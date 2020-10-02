<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Giinvest extends Model
{
    use SoftDeletes;
    protected $table = "giinvest";
    protected $fillable = [
        'innombre',
        'inregion',
        'incenfor',
        'ingruinv',
        'intipdoc',
        'innumdoc',
        'infecexp',
        'inmunexp',
        'infecnac',
        'incorper',
        'incorsen',
        'innumcel',
        'intelfij',
        'innumeip',
        'ingrafor',
        'intitulo',
        'inprofes',
        'inniving',
        'inrolsen',
        'intipvin',
        'inporded',
        'inantsen',
        'inprofor',
        'inarecon',
        'incarinv',
        'innumgra',
        'inasimen',
        'innumcon',
        'inestcon',
        'inlininv',
        'insemill'
    ];
}
