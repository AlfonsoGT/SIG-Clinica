<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Paciente;
use App\Reservacion;
use App\RegionAnatomica;
use Illuminate\Http\Request;
use App\Http\Requests\ReservacionRequest;

class ReservacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     private $path = '/admin_reservaciones';
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idPaciente)
    {
        $citas =
        DB::table('citas')
                ->join('tipoExamen', 'citas.idTipoExamen', '=', 'tipoExamen.idTipoExamen')
                ->select('citas.idTipoExamen',DB::raw('max(citas.idCita) as max'))
                ->where('citas.habilitado','=',1)
                ->groupBy('citas.idTipoExamen')
                ->get();
        $tipos =[];

         foreach($citas as $cita){
            $aux = DB::table('citas')
            ->join('tipoExamen', 'citas.idTipoExamen', '=', 'tipoExamen.idTipoExamen')
            ->where([['citas.idCita', '=', $cita->max]])
            ->select('tipoExamen.nombreTipoExamen','citas.idTipoExamen','citas.fechaCita','citas.horaCita','citas.idCita')
            ->get();
            array_push($tipos, $aux);
        }

        $indices = [];
        for($i=0; $i<sizeof($citas);$i++){
            array_push($indices, $i);
        }

        $regionAnatomica = DB ::table('regionAnatomica')
        ->select('idRegionAnatomica', 'nombreRegionAnatomica')->get();

        $paciente = DB::table('pacientes')
        ->select('primerNombre','segundoNombre','primerApellido','segundoApellido','idPaciente','activo')
        ->where('idPaciente','=',$idPaciente)->get();
        //dd($paciente);
        //Para presentar en la vista la cantidad de pacientes
        $preliminar = DB::table('citas')->count();
        $cantidad = [];
        foreach($citas as $cita){
            $aux = DB::table('reservacion')
            ->where([['reservacion.idCita','=',$cita->max]])
            ->select('reservacion.idCita',DB::raw('count(reservacion.idPaciente) as conteo'))
            ->groupBy('reservacion.idCita')
            ->get();
            array_push($cantidad, $aux);
        }
        //dd($cantidad);
        return view($this->path.'/asignacionCita')->with('citas',$citas)->with('tipos',$tipos)->with('indices',$indices)
            ->with('regionAnatomica',$regionAnatomica)->with('paciente',$paciente)->with('cantidad',$cantidad);

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReservacionRequest $request)
    {
        $this->validate($request,[
            'numeroRecibo' => 'required|max:7|min:7|regex:/^\d{7}$/',
            'referencia' => 'nullable|max:75|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
            'detalleReferencia' => 'nullable|max:75|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
            'usgIndicacion' => 'nullable|max:75|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
            'preparacion' => 'required|in:1,0',
            'usgIndicacion' => 'required_if:preparacion,1'
        ]);
       try{

         $revision= DB::table('reservacion')
         //->where('numeroRecibo',$request->numeroRecibo)
         //->where('fechaPago',$request->fechaPago)
         ->where('idCita',$request->tipos)
         ->where('idRegionAnatomica',$request->region)
         ->where('idPaciente',$request->idPaciente)
         ->count();

         if($revision==0){
        $reservacion = new Reservacion();
        $reservacion->numeroRecibo= $request->numeroRecibo;
        $reservacion->fechaPago = $request->fechaPago;
        $reservacion->referencia = $request->referencia;
        $reservacion->detalleReferencia = $request->detalleReferencia;
        $reservacion->idRegionAnatomica= $request->region;
        $reservacion->usgIndicacion= $request->usgIndicacion;
        $reservacion->preparacion= $request->preparacion;
        $reservacion->idCita= $request->tipos;
        $reservacion->idPaciente = $request->idPaciente;
        //actualiza la fecha de actualización del perfil de paciente para que aparezca entre los primeros de la lista
        $paciente=Paciente::findOrFail($request->idPaciente);
        $paciente->updated_at=date('Y-m-d G:i:s');
        $paciente->save();
        /*--*/
        $reservacion->save();
        return redirect()->action('PacienteController@show',['idPaciente' => $request->idPaciente])->with('msj','Reservacion Registrada');
      }else{
        return redirect()
        ->action('PacienteController@show',['idPaciente' => $request->idPaciente])
->with('msj2','Reservacion no registrada, es posible que el paciente ya se encuentra asignado a la cita, con el mismo tipo de examen y misma región anatómica');}

       }catch(Exception $e){
        return "Fatal error - ".$e->getMessage();
      }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    $reservacion = Reservacion::findOrFail($id);
    $reservaciones = DB::table('reservacion')
    ->join('pacientes', 'pacientes.idPaciente', '=', 'reservacion.idPaciente')
    ->join('regionAnatomica', 'regionAnatomica.idRegionAnatomica', '=', 'reservacion.idRegionAnatomica')
    ->join('citas', 'citas.idCita', '=', 'reservacion.idCita')
    ->join('tipoExamen', 'citas.idTipoExamen', '=', 'tipoExamen.idTipoExamen')
    ->select('reservacion.*', 'pacientes.*','citas.*','tipoExamen.*','regionAnatomica.*')
    ->where('reservacion.idReservacion',$reservacion->idReservacion)
    ->get();

    return view($this->path.'/verAsignacionCita')->with('reservaciones',$reservaciones);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idPaciente,$idReservacion)
    {
        $reservacion = Reservacion::findOrFail($idReservacion);
        //dd($reservacion);
        //Para detectar cuales son las ultimas citas creadas

        $citas =DB::table('citas')
                ->join('tipoExamen', 'citas.idTipoExamen', '=', 'tipoExamen.idTipoExamen')
                ->select('citas.idTipoExamen',DB::raw('max(citas.idCita) as max'))
                ->where('citas.habilitado','=',1)
                ->groupBy('citas.idTipoExamen')
                ->get();
        //Para llenar la tabla con las ultimas citas creadas
        $tipos =[];
         foreach($citas as $cita){
            $aux = DB::table('citas')
            ->join('tipoExamen', 'citas.idTipoExamen', '=', 'tipoExamen.idTipoExamen')
            ->where([['citas.idCita', $cita->max]])
            ->select('tipoExamen.nombreTipoExamen','citas.idTipoExamen','citas.fechaCita','citas.horaCita','citas.idCita')
            ->get();
            array_push($tipos, $aux);
        }
        //Para seleccionar el tipo de Examen de la maxima cita asignada
        $tipoSeleccionado = DB::table('reservacion')
        ->join('citas','citas.idCita','=','reservacion.idCita')
        ->join('tipoExamen','citas.idTipoExamen','=','tipoExamen.idTipoExamen')
        ->select('reservacion.idCita','citas.idTipoExamen','tipoExamen.nombreTipoExamen','citas.fechaCita')
        ->where('reservacion.idReservacion',$reservacion->idReservacion)
        ->get();
        //Para seleccionar los tipos de Examenes no Asignados
        foreach( $tipoSeleccionado as $tipo){
        $citasMaximasDiferente =DB::table('citas')
                ->join('tipoExamen', 'citas.idTipoExamen', '=', 'tipoExamen.idTipoExamen')
                ->select('citas.idTipoExamen',DB::raw('max(citas.idCita) as max'))
                ->where('citas.idTipoExamen','<>',$tipo->idTipoExamen)
                ->where('citas.habilitado','=',1)
                ->groupBy('citas.idTipoExamen')
                ->get();

        }
        //para llenar la tabla y los atributos dependiente de la consulta para tipos
        $tiposExamen =[];
         foreach($citasMaximasDiferente as $cita){
            $aux = DB::table('citas')
            ->join('tipoExamen', 'citas.idTipoExamen', '=', 'tipoExamen.idTipoExamen')
            ->where([['citas.idCita', $cita->max]])
            ->select('tipoExamen.nombreTipoExamen','citas.idTipoExamen','citas.fechaCita','citas.horaCita','citas.idCita')
            ->get();
            array_push($tiposExamen, $aux);
        }
       //dd($tiposExamen);

        //Para llenar la tabla
        $indices = [];
        for($i=0; $i<sizeof($citas);$i++){
            array_push($indices, $i);
        }
        //Para llenar el combobox
        $indices2 = [];
        for($i=0; $i<sizeof($citasMaximasDiferente);$i++){
            array_push($indices2, $i);
        }
        //Llenar el combobox con el asignado
        $regionAnatomicaReservacion = DB::table('regionAnatomica')->where('idRegionAnatomica',$reservacion->idRegionAnatomica)
        ->select('idRegionAnatomica','nombreRegionAnatomica','idTipoExamen')->get();
        //dd($regionAnatomicaReservacion);
        //llenar con el distinto el combobox
        foreach ($regionAnatomicaReservacion as $region) {
        $regionAnatomicaReservacionDiferente= DB::table('regionAnatomica')
        ->where('idRegionAnatomica','<>',$reservacion->idRegionAnatomica)
        ->where('idTipoExamen','=',$region->idTipoExamen)
        ->select('idRegionAnatomica','nombreRegionAnatomica','idTipoExamen')
        ->get();
        }
        //Para llenar el campo del nombre del paciente
        $paciente = DB::table('pacientes')
        ->select('primerNombre','segundoNombre','primerApellido','segundoApellido','idPaciente','activo')
        ->where('idPaciente','=',$idPaciente)->get();

        //Para presentar en la vista la cantidad de pacientes
        $preliminar = DB::table('citas')->count();
        $cantidad = [];
         foreach($citas as $cita){
            $aux = DB::table('reservacion')
            ->where([['reservacion.idCita','=',$cita->max]])
            ->select('reservacion.idCita',DB::raw('count(reservacion.idPaciente) as conteo'))
            ->groupBy('reservacion.idCita')
            ->get();
            array_push($cantidad, $aux);
        }

        return view($this->path.'/editarAsignacionCita')->with('reservacion',$reservacion)
            ->with('tipos',$tipos)->with('indices',$indices)->with('regionAnatomicaReservacion',$regionAnatomicaReservacion)
            ->with('regionAnatomicaReservacionDiferente',$regionAnatomicaReservacionDiferente)->with('paciente',$paciente)
            ->with('tipoSeleccionado',$tipoSeleccionado)->with('tiposExamen',$tiposExamen)->with('indices2',$indices2)->with('cantidad',$cantidad);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReservacionRequest $request,$idReservacion)
    {
       $this->validate($request,[
            'numeroRecibo' => 'required|max:7|min:7|regex:/^\d{7}$/',
            'referencia' => 'nullable|max:75|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
            'detalleReferencia' => 'nullable|max:75|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
            'usgIndicacion' => 'nullable|max:75|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
            'preparacion' => 'required|in:1,0',
            'usgIndicacion' => 'required_if:preparacion,1'
        ]);

       try{
         $reservacion = Reservacion::findOrFail($idReservacion);
        $reservacion->numeroRecibo= $request->numeroRecibo;
        $reservacion->fechaPago = $request->fechaPago;
        $reservacion->referencia = $request->referencia;
        $reservacion->detalleReferencia = $request->detalleReferencia;
        $reservacion->idRegionAnatomica= $request->regionAnatomica;
        $reservacion->usgIndicacion= $request->usgIndicacion;
        $reservacion->preparacion= $request->preparacion;
        $reservacion->idCita= $request->tipoExamen;
        $reservacion->idPaciente = $request->idPaciente;

        //actualiza la fecha de actualización del perfil de paciente para que aparezca entre los primeros de la lista
        $paciente=Paciente::findOrFail($request->idPaciente);
        $paciente->updated_at=date('Y-m-d G:i:s');
        $paciente->save();
        /*--*/

        $reservacion->save();
        return redirect()->action('ReservacionController@show',['idReservacion' => $idReservacion])->with('msj','Reservacion Modificada');
       }catch(Exception $e){
        return "Fatal error - ".$e->getMessage();
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idPaciente,$idReservacion)
    {
        $reservacion = Reservacion::findOrFail($idReservacion);
        $reservacion->delete();
        return redirect()->action('PacienteController@show',['idPaciente' => $idPaciente])->with('msj2','Reservacion Eliminada con éxito');

    }

    public function vista_borrar($idPaciente,$idReservacion){
         //recuperar de la base el elemento que queremos borrar en base al ID que recibimos en la URL con el unico fin de mostrar el detalle

         $reservacion = Reservacion::find($idReservacion);
         $detalleReservacion = DB::table('reservacion')
        ->join('citas','citas.idCita','=','reservacion.idCita')
        ->join('tipoExamen','citas.idTipoExamen','=','tipoExamen.idTipoExamen')
        ->select('citas.*','tipoExamen.*')
        ->where('reservacion.idReservacion',$reservacion->idReservacion)
        ->get();
         $paciente = Paciente::find($idPaciente);
        return view($this->path.'/vista_borrar')->with('reservacion', $reservacion)->with('detalleReservacion',$detalleReservacion)->with('paciente',$paciente);
    }

    public function tomarIdPaciente($idPaciente)
    {
        return $this->create($idPaciente);
    }
     public function tomarIdPacienteUpdate($idPaciente,$idReservacion)
    {
        return $this->edit($idPaciente,$idReservacion);
    }
    public function tomarIdPacienteEliminar($idPaciente,$idReservacion)
    {
        return $this->destroy($idPaciente,$idReservacion);
    }
    public function getRegion($idCita)
    {

        $busqueda = DB::table('citas')
        ->join('tipoExamen','tipoExamen.idTipoExamen','=','citas.idTipoExamen')
        ->where('citas.idCita','=',$idCita)
        ->select('tipoExamen.idTipoExamen')->get();

        foreach ($busqueda as $bus) {
            $regiones = RegionAnatomica::where('idTipoExamen',$bus->idTipoExamen)->get();
        }
        return $regiones;
    }
}
