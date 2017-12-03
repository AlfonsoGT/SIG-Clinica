<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Examen extends Model
{


protected $fillable = [
   'idUsuario', 'idReservacion','fechaRealizacion',
];
protected $table = 'examen';
  protected $primaryKey = 'idExamen';
  public $timestamps = false;

}
