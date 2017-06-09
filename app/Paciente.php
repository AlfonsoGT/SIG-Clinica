<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'duiPaciente', 'primerNombre', 'segundoNombre',
        'primerApellido', 'segundoApellido', 'fechaNacimiento',
        'numeroCelular', 'duiEncargado', 'nombreEncargado',
        'idSexo', 'idProcedencia',
    ];

    public $timestamps = false;
}
