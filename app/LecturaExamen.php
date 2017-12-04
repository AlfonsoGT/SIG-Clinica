<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LecturaExamen extends Model
{
    //
    protected $fillable = [
        'patologia', 'descripcion','idTipoExamen',
        'posicionUtero','medidas','contorno',
        'miometrio','endometrio','derecho',
        'fondo','izquierdo',
    ];

    public $timestamps = false;
    protected $table = 'lectura';
    protected $primaryKey = 'idLecturaExamen';
}
