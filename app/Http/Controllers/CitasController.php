<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Cita;
use App\Reservacion;
use App\Http\Requests\CitaRequest;

class CitasController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response

  */
  private $path = '/admin_citas';
  public function index(Request $request)
  {
    $citas = Cita::busqueda($request->busqueda)
    ->orderBy('idCita', 'desc')
    ->select('citas.idCita','citas.fechaCita','citas.horaCita','citas.idTipoExamen','tipoExamen.nombreTipoExamen')
    ->join('tipoExamen','citas.idTipoExamen','=','tipoExamen.idTipoExamen')
    ->paginate(7);

    $preliminar = DB::table('citas')->count();


    $cantidad = [];
    for ($i=1; $i<=$preliminar;$i++) {
      $aux = DB::table('reservacion')
      ->where([['reservacion.idCita','=',$i]])
      ->select('reservacion.idCita',DB::raw('count(reservacion.idPaciente) as conteo'))
      ->groupBy('reservacion.idCita')
      ->get();
      array_push($cantidad, $aux);
    }


    return view($this->path.'/admin_citas')->with('citas',$citas)->with('cantidad',$cantidad)
    ->with('preliminar',$preliminar);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {

  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(CitaRequest $request)
  {

  }



  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id,Request $request)
  {
    $cita = Cita::findOrFail($id);
    $citas = DB::table('citas')
    ->select('citas.idCita','citas.fechaCita','citas.horaCita','tipoExamen.nombreTipoExamen')
    ->join('tipoExamen','citas.idTipoExamen','=','tipoExamen.idTipoExamen')
    ->where('citas.idCita','=',$cita->idCita)
    ->get();

    $cantidad = DB::table('reservacion')
    ->select(DB::raw('count(reservacion.idReservacion) as conteo'))
    ->where('reservacion.idCita','=',$cita->idCita)
    ->get();


    $reservaciones = Reservacion::BusquedaReservacion($request->busqueda)
      ->orderBy('idReservacion', 'desc')
    ->select('reservacion.realizado','reservacion.idReservacion','pacientes.primerNombre','pacientes.segundoNombre','pacientes.primerApellido','pacientes.segundoApellido',
    'pacientes.idPaciente','regionAnatomica.nombreRegionAnatomica','regionAnatomica.idRegionAnatomica','sexo.nombreSexo')
    ->join('pacientes','pacientes.idPaciente','=','reservacion.idPaciente')
    ->join('sexo','pacientes.idSexo','=','sexo.idSexo')
    ->join('regionAnatomica','regionAnatomica.idRegionAnatomica','=','reservacion.idRegionAnatomica')
    ->where('reservacion.idCita','=',$cita->idCita)
    ->paginate(9);


    return view($this->path.'/verCitas')->with('citas',$citas)->with('reservaciones',$reservaciones)->with('cantidad',$cantidad);
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {


  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(CitaRequest $request, $id)
  {


  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {

  }

}
