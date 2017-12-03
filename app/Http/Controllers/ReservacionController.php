<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Paciente;
use App\Cita;
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
        
       $examen = DB::table('tipoExamen')
       ->select('tipoExamen.*')
       ->get();

        $regionAnatomica = DB ::table('regionAnatomica')
        ->select('idRegionAnatomica', 'nombreRegionAnatomica')->get();

        $paciente = DB::table('pacientes')
        ->select('primerNombre','segundoNombre','primerApellido','segundoApellido','idPaciente','activo')
        ->where('idPaciente','=',$idPaciente)->get();
       $tipoExamenes = DB::table('tipoExamen')->select('idTipoExamen', 'nombreTipoExamen')->get();

        return view($this->path.'/asignacionCita')
            ->with('regionAnatomica',$regionAnatomica)->with('paciente',$paciente)->with('examen',$examen)->with('tipoExamenes',$tipoExamenes);

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
             'usgIndicacion' => 'required_if:preparacion,1',
             'precio' => 'required|regex:/^[0-9]{1,2}(\.[0-9]{1,2})?$/',
         ]);
         try{
         //revisa si existen citas existentes del mismo tipo y la misma fecha y que estén habilitadas
         $revision=DB::table('citas')
         ->where('idTipoExamen',$request->examen)
         ->where('fechaCita',$request->fechaCita)
         ->count();

         if($revision==0){
           $verificar=0;
           $cita=new Cita();
           $cita->fechaCita=$request->fechaCita;
           $cita->idTipoExamen=$request->examen;
           $cita->horaCita=$request->horaCita;
           $cita->save();
         }else{
           $idCitaExistente=DB::table('citas')
           ->where('fechaCita',$request->fechaCita)
           ->where('idTipoExamen',$request->examen)
           ->max('idCita');
           $cita=Cita::findOrFail($idCitaExistente);

           //verifica si el paciente no está registrado a la misma cita
           $verificar=DB::table('reservacion')
           ->where('idCita',$cita->idCita)
           ->where('idRegionAnatomica',$request->region)
           ->where('idPaciente',$request->idPaciente)
           ->count();
         }


          if($verificar==0){
          $reservacion = new Reservacion();
          $reservacion->numeroRecibo= $request->numeroRecibo;
          $reservacion->fechaPago = $request->fechaPago;
          $reservacion->referencia = $request->referencia;
          $reservacion->detalleReferencia = $request->detalleReferencia;
          $reservacion->idRegionAnatomica= $request->region;
          $reservacion->usgIndicacion= $request->usgIndicacion;
          $reservacion->preparacion= $request->preparacion;
          $reservacion->precio= $request->precio;
          $reservacion->idCita= $cita->idCita;
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

    $pdf = DB::table('reservacion')
    ->join('examen','examen.idReservacion','=','reservacion.idReservacion')
    ->where('reservacion.idReservacion',$reservacion->idReservacion)
    ->select('reservacion.*','examen.*')
    ->get();
    //dd($pdf);
    return view($this->path.'/verAsignacionCita')->with('reservaciones',$reservaciones)->with('pdf',$pdf);
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
 
        //Para seleccionar el tipo de Examen de la maxima cita asignada
        $tipoSeleccionado = DB::table('reservacion')
        ->join('citas','citas.idCita','=','reservacion.idCita')
        ->join('tipoExamen','citas.idTipoExamen','=','tipoExamen.idTipoExamen')
        ->select('reservacion.idCita','citas.idTipoExamen','tipoExamen.nombreTipoExamen','citas.fechaCita','citas.horaCita')
        ->where('reservacion.idReservacion',$reservacion->idReservacion)
        ->get();
        //Para seleccionar los tipos de Examenes no Asignados
        foreach( $tipoSeleccionado as $tipo){
        $citasMaximasDiferente =DB::table('citas')
                ->join('tipoExamen', 'citas.idTipoExamen', '=', 'tipoExamen.idTipoExamen')
                ->select('citas.*')
                ->where('citas.idTipoExamen','=',$tipo->idTipoExamen)
                ->get();

        }
        //para llenar la tabla y los atributos dependiente de la consulta para tipos
        $tiposExamen =[];
         foreach($citasMaximasDiferente as $cita){
            $aux = DB::table('citas')
            ->join('tipoExamen', 'citas.idTipoExamen', '=', 'tipoExamen.idTipoExamen')
            ->where([['citas.idCita','<>',$cita->idCita]])
            ->where([['citas.idCita','=',$cita->idTipoExamen]])
            ->select('tipoExamen.nombreTipoExamen','citas.idTipoExamen','citas.fechaCita','citas.horaCita','citas.idCita')
            ->get();
            array_push($tiposExamen, $aux);
        }
       

        $regionAnatomicaReservacion = DB::table('regionAnatomica')->where('idRegionAnatomica',$reservacion->idRegionAnatomica)
        ->select('idRegionAnatomica','nombreRegionAnatomica','idTipoExamen')->get();

        foreach ($regionAnatomicaReservacion as $region) {
        $regionAnatomicaReservacionDiferente= DB::table('regionAnatomica')
        ->where('idRegionAnatomica','<>',$reservacion->idRegionAnatomica)
        ->where('idTipoExamen','=',$region->idTipoExamen)
        ->select('idRegionAnatomica','nombreRegionAnatomica','idTipoExamen')
        ->get();
        }

        $paciente = DB::table('pacientes')
        ->select('primerNombre','segundoNombre','primerApellido','segundoApellido','idPaciente','activo')
        ->where('idPaciente','=',$idPaciente)->get();


        $examen = DB::table('tipoExamen')
       ->select('tipoExamen.*')
       ->where('tipoExamen.idTipoExamen','<>',$tipo->idTipoExamen)
       ->get();

        return view($this->path.'/editarAsignacionCita')->with('reservacion',$reservacion)
            ->with('regionAnatomicaReservacion',$regionAnatomicaReservacion)
            ->with('regionAnatomicaReservacionDiferente',$regionAnatomicaReservacionDiferente)->with('paciente',$paciente)
            ->with('tipoSeleccionado',$tipoSeleccionado)->with('tiposExamen',$tiposExamen)->with('examen',$examen);
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
            'usgIndicacion' => 'required_if:preparacion,1',
            'precio' => 'required|regex:/^[0-9]{1,2}(\.[0-9]{1,2})?$/',
        ]);
       try{
         //revisa si existen citas existentes del mismo tipo y la misma fecha y que estén habilitadas
         $revision=DB::table('citas')
         ->where('idTipoExamen',$request->examen)
         ->where('fechaCita',$request->fechaCita)
         ->count();

         if($revision==0){
           $verificar=0;
           $cita=new Cita();
           $cita->fechaCita=$request->fechaCita;
           $cita->idTipoExamen=$request->examen;
           $cita->horaCita=$request->horaCita;
           $cita->save();
         }else{
           $idCitaExistente=DB::table('citas')
           ->where('fechaCita',$request->fechaCita)
           ->where('idTipoExamen',$request->examen)
           ->max('idCita');
           $cita=Cita::findOrFail($idCitaExistente);

           //verifica si el paciente no está registrado a la misma cita
           $verificar=DB::table('reservacion')
           ->where('idCita',$cita->idCita)
           ->where('idRegionAnatomica',$request->region)
           ->where('idPaciente',$request->idPaciente)
           ->count();
         }


           if($verificar==0){
          $reservacion = Reservacion::findOrFail($idReservacion);
          $reservacion->numeroRecibo= $request->numeroRecibo;
          $reservacion->fechaPago = $request->fechaPago;
          $reservacion->referencia = $request->referencia;
          $reservacion->detalleReferencia = $request->detalleReferencia;
          $reservacion->idRegionAnatomica= $request->region;
          $reservacion->usgIndicacion= $request->usgIndicacion;
          $reservacion->preparacion= $request->preparacion;
          $reservacion->precio= $request->precio;
          $reservacion->idCita= $cita->idCita;
          $reservacion->idPaciente = $request->idPaciente;
          //actualiza la fecha de actualización del perfil de paciente para que aparezca entre los primeros de la lista
          $paciente=Paciente::findOrFail($request->idPaciente);
          $paciente->updated_at=date('Y-m-d G:i:s');
          $paciente->save();
          /*--*/
          $reservacion->save();
          return redirect()->action('PacienteController@show',['idPaciente' => $request->idPaciente])->with('msj','Reservacion Modificada con Exito');
         }else{
          return redirect()
          ->action('PacienteController@show',['idPaciente' => $request->idPaciente])
         ->with('msj2','Reservacion no registrada, es posible que el paciente ya se encuentra asignado a la cita, con el mismo tipo de examen y misma región anatómica');}

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
    public function getRegion($idTipoExamen)
    {

        $regiones = DB::table('regionAnatomica')
        ->join('tipoExamen','tipoExamen.idTipoExamen','=','regionAnatomica.idTipoExamen')
        ->where('regionAnatomica.idTipoExamen','=',$idTipoExamen)
        ->select('regionAnatomica.*')->get();
        return $regiones;
    }

    public function getConsulta($idTipoExamen)
    {
       $citas =
        DB::table('citas')
                ->join('tipoExamen', 'citas.idTipoExamen', '=', 'tipoExamen.idTipoExamen')
                ->select('citas.*','tipoExamen.*')
                ->where('citas.idTipoExamen','=',$idTipoExamen)
                ->get();

        return $citas;
    }
  
}
