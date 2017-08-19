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
        'idSexo', 'idProcedencia','idDepartamento','activo',
    ];

    public $timestamps = false;
    protected $primaryKey = 'idPaciente';

    public function scopeBusqueda($query, $busqueda)
    {
        $busqueda2 = preg_replace('/( ){2,}/u',' ',$busqueda);
        if(trim($busqueda2) != ""){
            return $query->where('duiPaciente', 'LIKE', '%'.$busqueda2.'%')
                ->orwhere('duiEncargado', 'LIKE', '%'.$busqueda2.'%')
                ->orwhere('nombreEncargado', 'LIKE', '%'.$busqueda2.'%')
                ->orwhere(\DB::raw("CONCAT(primerNombre,' ',segundoNombre,' ',primerApellido,' ',segundoApellido)")
                    ,'LIKE','%'.$busqueda2.'%');
        }


    }
}
