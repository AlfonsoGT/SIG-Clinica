<?php

namespace App\Http\Controllers\Controllers_Estrategicos;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Redirect;

use App\Paciente;

use App\Sexo;
use App\procedencias;

use App\Http\Requests\PacienteRequest;
use App\Http\Controllers\Controller;

use Exception;


class PorcentajePacientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $path = '/salidas_estrategicas/porcentaje_pacientes';
    public function index()
    {
        //
        $total =   DB::table('pacientes')->count();
        $mujeres = DB::table('pacientes')->join('sexo', 'pacientes.idSexo', '=', 'sexo.idSexo')->where('nombreSexo','femenino')->count();
        $hombres = DB::table('pacientes')->join('sexo', 'pacientes.idSexo', '=', 'sexo.idSexo')->where('nombreSexo','masculino')->count();
        $porMu = ($mujeres/$total)*100;
        $porHo = ($hombres/$total)*100;
         return view($this->path.'/porcentaje_pacientes')->with("hombres",$hombres)->with('mujeres',$mujeres)->with('porMu',$porMu)
            ->with('porHo',$porHo);//,compact('mujeres'),compact('hombres'),compact('porMu'),compact('porHo'));
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

    //public function cantidadPac()
    //{
        //$pacientes = DB::table('pacientes')->count();
         //return view($this->path.'/numero_pacientes')->with('pacientes',$pacientes) ;
    //}
}