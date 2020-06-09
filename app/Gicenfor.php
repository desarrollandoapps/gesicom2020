<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App;

class Gicenfor extends Model
{
    use SoftDeletes;
    protected $table = "gicenfor";
    protected $fillable = [
        'cfnombre',
        'cfregion'
    ];
}
