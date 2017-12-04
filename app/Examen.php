<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Examen extends Model
{


protected $fillable = [
   'idUsuario', 'idReservacion','fechaRealizacion','numeroUsadas','numeroRepetidas','motivoDeRepetidas',
];
protected $table = 'examen';
  protected $primaryKey = 'idExamen';
  public $timestamps = false;

  public function scopeBusqueda($query, $busqueda)
    {
     return $query->where('tipoExamen.idTipoExamen', 'LIKE', '%'.$busqueda.'%');
	}

}
