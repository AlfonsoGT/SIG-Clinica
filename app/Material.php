<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table = 'material';
    protected $fillable = [
        'cantidadMaterial', 'fecha', 'precio',
        'proveedor', 'idEntrada','idSalida','idTipoUnidad','cantidadUnidadMaterial',
        'proveedor',
    ];
    protected $primaryKey = 'idMaterial';
    public $timestamps = false;
}
