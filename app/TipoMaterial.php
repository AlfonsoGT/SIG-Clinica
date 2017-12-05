<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoMaterial extends Model
{
     protected $table = 'tipomaterial';
    protected $primaryKey = 'idTipoMaterial';
    public $timestamps = false;
}
