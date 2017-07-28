<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservacion extends Model
{
	protected $table = 'reservacion';
    protected $fillable = [
        'numeroRecibo', 'fechaPago', 'referencia',
        'idRegionAnatomica', 'idCita','idPaciente','usgIndicacion'
        ,
    ];
     protected $primaryKey = 'idReservacion';
    public $timestamps = false;

}
