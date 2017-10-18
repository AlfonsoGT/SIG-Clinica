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

      $tipoPlaca=DB::table('placa')->select('*')->get();


      return view($this->path.'/realizacionExamen')->with('reservacion',$reservacion)->with('tipoPlaca',$tipoPlaca);
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
          'cantidadUsadas' => 'required|min:1|max:3|regex:/^\d*$/'
      ]);
      dd($request->cantidadUsadas);
      $examen= new Examen();


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
