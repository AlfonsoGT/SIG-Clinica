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

    public function index(Request $request)
    {
        $examenesNoLectura = Examen::busqueda($request->busqueda)
        ->join('reservacion','reservacion.idReservacion','=','examen.idReservacion')
        ->join('pacientes','pacientes.idPaciente','=','reservacion.idPaciente')
        ->join('regionAnatomica','regionAnatomica.idRegionAnatomica','=','reservacion.idRegionAnatomica')
        ->join('tipoExamen','tipoExamen.idTipoExamen','=','regionAnatomica.idTipoExamen')
        ->select('examen.*','pacientes.*','reservacion.*','regionAnatomica.*','tipoExamen.*')
        ->orderBy('idExamen', 'desc')->paginate(10);
        $examen = DB::table('tipoExamen')
        ->select('tipoExamen.*')
        ->get();

        return view($this->path.'/lecturas')->with('examenesNoLectura',$examenesNoLectura)->with('examen',$examen);

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
    public function createGinecologica($idExamen)
    {
        $examenesNoLectura = DB::table('examen')
        ->join('reservacion','reservacion.idReservacion','=','examen.idReservacion')
        ->join('pacientes','pacientes.idPaciente','=','reservacion.idPaciente')
        ->join('regionAnatomica','regionAnatomica.idRegionAnatomica','=','reservacion.idRegionAnatomica')
        ->join('tipoExamen','tipoExamen.idTipoExamen','=','regionAnatomica.idTipoExamen')
        ->select('examen.*','pacientes.*','reservacion.*','regionAnatomica.*','tipoExamen.*')
        ->where('examen.idExamen','=',$idExamen)
        ->get();
        return view($this->path.'/crearLecturaUltra')->with('examenesNoLectura',$examenesNoLectura);
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
        $this->validate($request,[
            'patologia' => 'required',
            'descripcion' => 'required',
            
        ]);
        $lectura = new LecturaExamen ();
        $lectura->idExamen = $request->idExamen;
        $lectura->patologia = $request->patologia;
        $lectura->descripcion = $request->descripcion;
        $lectura->posicionUtero= $request->posicionUtero;
        $lectura->medidas = $request->medidas;
        $lectura->contorno = $request->contorno;
        $lectura->miometrio= $request->miometrio;
        $lectura->endometrio =$request->endometrio;
        $lectura->derecho =$request->derecho;
        $lectura->izquierdo= $request->izquierdo;
        $lectura->fondo = $request->fondo;

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


    public function seePDF($idExamen){


        $lectura = DB::table('lectura')
        ->join('examen','examen.idExamen','=','lectura.idExamen')
        ->join('reservacion','reservacion.idReservacion','=','examen.idReservacion')
        ->join('pacientes','pacientes.idPaciente','=','reservacion.idPaciente')
        ->join('sexo','sexo.idSexo','=','pacientes.idSexo')
        ->join('regionAnatomica','regionAnatomica.idRegionAnatomica','=','reservacion.idRegionAnatomica')
        ->join('tipoExamen','tipoExamen.idTipoExamen','=','regionAnatomica.idTipoExamen')
        ->select('examen.*','pacientes.*','reservacion.*','regionAnatomica.*','tipoExamen.*','lectura.*','sexo.*',
        DB::raw('year(examen.fechaRealizacion)-year(pacientes.fechaNacimiento) as edadPaciente'),
        DB::raw('year(examen.fechaRealizacion) as anioR'),
        DB::raw('month(examen.fechaRealizacion) as mesR' ),
        DB::raw('day(examen.fechaRealizacion) as diaR'))
        ->where('examen.idExamen','=',$idExamen)
        ->get();
       // dd($lectura);

      $pdf = PDF::loadView($this->path.'/pdf', compact('lectura'));
      return $pdf->stream('lectura.pdf');


    }
     public function seePDFGinecologica($idExamen){


        $lectura = DB::table('lectura')
        ->join('examen','examen.idExamen','=','lectura.idExamen')
        ->join('reservacion','reservacion.idReservacion','=','examen.idReservacion')
        ->join('pacientes','pacientes.idPaciente','=','reservacion.idPaciente')
        ->join('sexo','sexo.idSexo','=','pacientes.idSexo')
        ->join('regionAnatomica','regionAnatomica.idRegionAnatomica','=','reservacion.idRegionAnatomica')
        ->join('tipoExamen','tipoExamen.idTipoExamen','=','regionAnatomica.idTipoExamen')
        ->select('examen.*','pacientes.*','reservacion.*','regionAnatomica.*','tipoExamen.*','lectura.*','sexo.*',
        DB::raw('year(examen.fechaRealizacion)-year(pacientes.fechaNacimiento) as edadPaciente'),
        DB::raw('year(examen.fechaRealizacion) as anioR'),
        DB::raw('month(examen.fechaRealizacion) as mesR' ),
        DB::raw('day(examen.fechaRealizacion) as diaR'))
        ->where('examen.idExamen','=',$idExamen)
        ->get();
       // dd($lectura);

      $pdf = PDF::loadView($this->path.'/pdfGinecologica', compact('lectura'));
      return $pdf->stream('lectura.pdf');


    }


}
