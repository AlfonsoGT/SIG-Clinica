<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Paciente;
use App\TipoExamen;
use App\Sexo;
use PDF;

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
         $tExamenes = DB::table('tipoExamen')->select('idTipoExamen', 'nombreTipoExamen')->get();
        return view($this->path.'/crearLectura',compact('tExamenes'));
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
        $paciente = Paciente::findOrFail($idPaciente);
        $tExamenes = TipoExamen::all();
        return view($this->path.'/editarLectura', compact('paciente','tExamenes'));
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
    public function downloadPDF($idPaciente){

      $paciente = Paciente::find($idPaciente);
       $pacientes = DB::table('pacientes')
      ->join('reservacion', 'reservacion.idPaciente', '=', 'pacientes.idPaciente')
      ->join('citas','citas.idCita', '=', 'reservacion.idCita')
      ->join('tipoExamen','tipoExamen.idTipoExamen','=','citas.idTipoExamen')
      ->join('sexo', 'pacientes.idSexo', '=', 'sexo.idSexo')
        ->select('pacientes.idPaciente', 'pacientes.duiPaciente','pacientes.primerNombre','pacientes.segundoNombre', 'pacientes.primerApellido', 'pacientes.segundoApellido', 'sexo.nombreSexo', 'tipoExamen.nombreTipoExamen')
        ->where('pacientes.idPaciente',$paciente->idPaciente)
        ->get();
      $pdf = PDF::loadView($this->path.'/pdf', compact('pacientes'));
      return $pdf->download('lectura.pdf');

    }

    public function seePDF($idPaciente){

      $paciente = Paciente::find($idPaciente);
      $pacientes = DB::table('pacientes')
      ->join('reservacion', 'reservacion.idPaciente', '=', 'pacientes.idPaciente')
      ->join('citas','citas.idCita', '=', 'reservacion.idCita')
      ->join('tipoExamen','tipoExamen.idTipoExamen','=','citas.idTipoExamen')
      ->join('sexo', 'pacientes.idSexo', '=', 'sexo.idSexo')
        ->select('pacientes.idPaciente', 'pacientes.duiPaciente','pacientes.primerNombre','pacientes.segundoNombre', 'pacientes.primerApellido', 'pacientes.segundoApellido', 'sexo.nombreSexo', 'tipoExamen.nombreTipoExamen')
        ->where('pacientes.idPaciente',$paciente->idPaciente)
        ->get();
      $pdf = PDF::loadView($this->path.'/pdf', compact('pacientes'));
      return $pdf->stream('lectura.pdf');

    }
}
