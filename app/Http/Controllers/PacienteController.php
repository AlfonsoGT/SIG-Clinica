<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Redirect;

use App\Paciente;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $paciente = new Paciente();
        $paciente->duiPaciente = $request->duiPaciente;
        $paciente->primerNombre = $request->primerNombre;
        $paciente->segundoNombre = $request->segundoNombre;
        $paciente->primerApellido = $request->primerApellido;
        $paciente->segundoApellido = $request->segundoApellido;
        $paciente->fechaNacimiento = $request->fechaNacimiento;
        $paciente->numeroCelular = $request->numeroCelular;
        $paciente->duiEncargado = $request->duiEncargado;
        $paciente->nombreEncargado = $request->nombreEncargado;
        $idSexo =  $request->sexo;
        $id_sexo = DB::table('sexo')
        ->where('idSexo','=',$idSexo)
        ->value('idSexo');
        $paciente->idSexo = $id_sexo;
        $idProcedencia =  $request->procedencia;
        $id_procedencia = DB::table('procedencia')
        ->where('idProcedencia','=',$idProcedencia)
        ->value('idProcedencia');
        $paciente->idProcedencia = $id_procedencia;
        $paciente->save();
        return Redirect::to('crearPaciente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
