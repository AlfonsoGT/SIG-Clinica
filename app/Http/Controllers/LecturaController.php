<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Paciente;

class LecturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
     private $path = '/admin_lecturas';

    public function index()
    {


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idPaciente)
    {
        //
        $paciente = Paciente::findOrFail($idPaciente);
        $pacientes = DB::table('pacientes')
        ->join('reservacion', 'reservacion.idPaciente', '=', 'pacientes.idPaciente')
        ->join('citas','citas.idCita', '=', 'reservacion.idCita')
        ->join('tipoExamen','tipoExamen.idTipoExamen','=','citas.idTipoExamen')
        ->select('pacientes.idPaciente', 'pacientes.duiPaciente','pacientes.primerNombre','pacientes.segundoNombre', 'pacientes.primerApellido', 'pacientes.segundoApellido', 'tipoExamen.nombreTipoExamen')
        ->where('pacientes.idPaciente',$paciente->idPaciente)
        ->paginate(5);

        return view($this->path.'/admin_lecturas',compact('pacientes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idPaciente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
