<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Examen;
use App\Reservacion;
use Illuminate\Http\Request;

class ExamenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     private $path = '/admin_examenes';
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($reservacionid)
    {
      $reservacion = DB::table('reservacion')
      ->join('pacientes', 'pacientes.idPaciente', '=', 'reservacion.idPaciente')
      ->join('regionAnatomica', 'regionAnatomica.idRegionAnatomica', '=', 'reservacion.idRegionAnatomica')
      ->join('citas', 'citas.idCita', '=', 'reservacion.idCita')
      ->join('tipoExamen', 'citas.idTipoExamen', '=', 'tipoExamen.idTipoExamen')
      ->select('reservacion.*', 'pacientes.*','citas.*','tipoExamen.*','regionAnatomica.*')
      ->where('reservacion.idReservacion',$reservacionid)
      ->get();




      return view($this->path.'/realizacionExamen')->with('reservacion',$reservacion);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request,[
          'cantidadUsadas' => 'required|min:1|max:3|regex:/^\d*$/',
          'cantidadRepetidas' => 'required|min:1|max:3|regex:/^\d*$/',
      ]);

      try{
      $examen= new Examen();
      $examen->idusuario=$request->idUser;
      $examen->idReservacion=$request->idReservacion;
      $examen->tipoPlaca=$request->nombrePlaca;
      $examen->numeroUsadas=$request->cantidadUsadas;
      $examen->numeroRepetidas=$request->cantidadRepetidas;
      $examen->motivoDeRepetidas=$request->motivorepeticion;
      $examen->fechaRealizacion=date('Y-m-d');
      if($examen->save()){
        $reservacion= Reservacion::findOrFail($examen->idReservacion);
        $reservacion->realizado=true;
        $id=$reservacion->idCita;
        $reservacion->save();
        return redirect()->action('CitasController@show',['idCita' => $id])->with('msj','Examen Registrado Exitosamente');
      }else{
        return back()->with('msj2','Examen No Registrado, revise información proporcionada');
      }




    }catch(Exception $e){
        //return "Fatal error - ".$e->getMessage();
        return back()->with('msj2',' ya se encuentra registrado');
    }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Examen  $examen
     * @return \Illuminate\Http\Response
     */
    public function show(Examen $examen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Examen  $examen
     * @return \Illuminate\Http\Response
     */
    public function edit(Examen $examen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Examen  $examen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Examen $examen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Examen  $examen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Examen $examen)
    {
        //
    }
}
