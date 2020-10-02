<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gigruinv extends Model
{
    use SoftDeletes;
    protected $table = "gigruinv";
    protected $fillable = ['gicodgru', 'giregpnd', 'giregion', 'gicenfor', 'ginombre', 'gimescre', 'gianocre', 'giestado'];
}
