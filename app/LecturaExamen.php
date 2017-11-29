<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LecturaExamen extends Model
{
    //
    protected $fillable = [
        'patologia', 'descripcion','idTipoExamen',
    ];

    public $timestamps = false;
    protected $table = 'lecturaExamen';
    protected $primaryKey = 'idLecturaExamen';
}
