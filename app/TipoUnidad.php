<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoUnidad extends Model
{
     protected $table = 'tipoUnidad';
    protected $primaryKey = 'idTipoUnidad';
    public $timestamps = false;
}
