<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'producto';
    protected $fillable = [
        'fechaCompra', 'cantidadProducto',
        'precioUnidad', 'cantidadProductoResidual','idUnidad',
    ];
    protected $primaryKey = 'idProducto';
    public $timestamps = false;
}
