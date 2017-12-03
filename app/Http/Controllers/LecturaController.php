<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Paciente;
use App\TipoExamen;
use App\LecturaExamen;
use App\Sexo;
use PDF;
use App\Examen;

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
        $examenesNoLectura = DB::table('examen')
        ->join('reservacion','reservacion.idReservacion','=','examen.idReservacion')
        ->join('pacientes','pacientes.idPaciente','=','reservacion.idPaciente')
        ->join('regionAnatomica','regionAnatomica.idRegionAnatomica','=','reservacion.idRegionAnatomica')
        ->join('tipoExamen','tipoExamen.idTipoExamen','=','regionAnatomica.idTipoExamen')

        ->select('examen.*','pacientes.*','reservacion.*','regionAnatomica.*','tipoExamen.*')->paginate(10);
        return view($this->path.'/lecturas')->with('examenesNoLectura',$examenesNoLectura);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idExamen)
    {
        $examenesNoLectura = DB::table('examen')
        ->join('reservacion','reservacion.idReservacion','=','examen.idReservacion')
        ->join('pacientes','pacientes.idPaciente','=','reservacion.idPaciente')
        ->join('regionAnatomica','regionAnatomica.idRegionAnatomica','=','reservacion.idRegionAnatomica')
        ->join('tipoExamen','tipoExamen.idTipoExamen','=','regionAnatomica.idTipoExamen')
        ->select('examen.*','pacientes.*','reservacion.*','regionAnatomica.*','tipoExamen.*')
        ->where('examen.idExamen','=',$idExamen)
        ->get();
        return view($this->path.'/crearLectura')->with('examenesNoLectura',$examenesNoLectura);
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
        $lectura = new LecturaExamen ();
        $lectura->idExamen = $request->idExamen;
        $lectura->patologia = $request->patologia;
        $lectura->descripcion = $request->descripcion;

        $examen=Examen::findOrFail($request->idExamen);
        if($examen->hayLectura==false){
        $examen->hayLectura=true;
        $examen->save();
        $lectura->save();
        return redirect()->action('LecturaController@index')->with('msj','Lectura Guardada Correctamente');
        }else{
        return redirect()->action('LecturaController@index')->with('msj2','El Examen ya tiene Lectura Realizada');
        }

       
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idPaciente)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idPaciente)
    {
       
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
    public function downloadPDF($idPaciente,$idLecturaExamen){

      $paciente = Paciente::find($idPaciente);
      $lectura = LecturaExamen::find($idLecturaExamen);
      $lecturas = DB::table('pacientes')
      ->join('reservacion', 'reservacion.idPaciente', '=', 'pacientes.idPaciente')
      ->join('citas','citas.idCita', '=', 'reservacion.idCita')
      ->join('tipoExamen','tipoExamen.idTipoExamen','=','citas.idTipoExamen')
      ->join('lecturaExamen','lecturaExamen.idTipoExamen','=','tipoExamen.idTipoExamen')
      ->join('sexo', 'pacientes.idSexo', '=', 'sexo.idSexo')
        ->select('pacientes.idPaciente', 'pacientes.duiPaciente','pacientes.primerNombre','pacientes.segundoNombre', 'pacientes.primerApellido', 'pacientes.segundoApellido', 'sexo.nombreSexo', 'tipoExamen.nombreTipoExamen','lecturaExamen.patologia', 'lecturaExamen.descripcion', 'lecturaExamen.idLecturaExamen')
        ->where('pacientes.idPaciente',$paciente->idPaciente)
        ->where('lecturaExamen.idLecturaExamen',$lectura->idLecturaExamen)

        ->get();
      $pdf = PDF::loadView($this->path.'/pdf', compact('lecturas'));
      return $pdf->download('lectura.pdf');

    }

    public function seePDF($idExamen){

    
        $lectura = DB::table('lecturaexamen')
        ->join('examen','examen.idExamen','=','lecturaexamen.idExamen')
        ->join('reservacion','reservacion.idReservacion','=','examen.idReservacion')
        ->join('pacientes','pacientes.idPaciente','=','reservacion.idPaciente')
        ->join('sexo','sexo.idSexo','=','pacientes.idSexo')
        ->join('regionAnatomica','regionAnatomica.idRegionAnatomica','=','reservacion.idRegionAnatomica')
        ->join('tipoExamen','tipoExamen.idTipoExamen','=','regionAnatomica.idTipoExamen')
        ->select('examen.*','pacientes.*','reservacion.*','regionAnatomica.*','tipoExamen.*','lecturaexamen.*','sexo.*')
        ->where('examen.idExamen','=',$idExamen)
        ->get();
       // dd($lectura);

      $pdf = PDF::loadView($this->path.'/pdf', compact('lectura'));
      return $pdf->stream('lectura.pdf');
     

    }
   
    
}
