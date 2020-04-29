<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gigruinv extends Model
{
    //
    protected $table = "gigruinv";
    protected $fillable = ['gicodgru', 'giregpnd', 'giregion', 'gicenfor', 'ginombre', 'gimescre', 'gianocre', 'giestado'];
}
