<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'password','username','id_rol','nivel_1','nivel_2','nivel_3',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function scopeBusqueda($query, $busqueda)
    {
        if(trim($busqueda) != ""){
            return $query->where('username', 'LIKE', '%'.$busqueda.'%')
                ->orwhere('name', 'LIKE', '%'.$busqueda.'%');
        }

    }
}
