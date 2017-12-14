<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoMaterial extends Model
{
     protected $table = 'tipoMaterial';
    protected $primaryKey = 'idTipoMaterial';
    public $timestamps = false;
}
