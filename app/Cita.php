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
}
