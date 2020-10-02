<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Girephor extends Model
{
    use SoftDeletes;
    protected $table = "girephor";
    protected $fillable = ['rhmesrep', 'rhhorrep'];
}
