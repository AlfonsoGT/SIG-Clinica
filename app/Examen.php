<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Examen extends Model
{


protected $fillable = [
   'idUsuario', 'idReservacion','fechaRealizacion',
];
protected $table = 'Examen';
  protected $primaryKey = 'idExamen';
  public $timestamps = false;

}
