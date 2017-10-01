<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservacion extends Model
{
	protected $table = 'reservacion';
    protected $fillable = [
        'numeroRecibo', 'fechaPago', 'referencia',
        'idRegionAnatomica', 'idCita','idPaciente','usgIndicacion',
        'detalleReferencia','precio',
    ];
    protected $primaryKey = 'idReservacion';
    public $timestamps = false;

    public function scopeBusquedaReservacion($query, $busqueda)
    {
        $busqueda2 = preg_replace('/( ){2,}/u',' ',$busqueda);
        if(trim($busqueda2) != "") {
            return $query->where(\DB::raw("CONCAT(primerNombre,' ',segundoNombre,' ',primerApellido,' ',segundoApellido)")
                ,'LIKE','%'.$busqueda2.'%');
        }
    }
}
