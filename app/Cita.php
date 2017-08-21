<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
     protected $fillable = [
        'horaCita', 'fechaCita','idTipoExamen',
    ];
    public $timestamps = false;
    protected $primaryKey = 'idCita';

     public function scopeBusqueda($query, $busqueda)
    {
        $busqueda2 = preg_replace('/( ){2,}/u',' ',$busqueda);
        if(trim($busqueda2) != ""){
            return $query->where('fechaCita', 'LIKE', '%'.$busqueda2.'%');
        }
    }
}

