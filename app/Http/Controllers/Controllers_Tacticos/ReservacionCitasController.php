<?php

namespace App\Http\Controllers\Controllers_Tacticos;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class ReservacionCitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $path = '/salidas_tacticas/reservacion_citas';
    public function index()
    {
        //
        
        $torax = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Torax')->count();
        
        $ovarios = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Ovarios')->count();

        $utero = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Utero')->count();

        $cuello = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Cuello')->count();

        $hombro = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Hombro')->count();

        $brazo = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Brazo')->count();

        $codo = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Codo')->count();

        $antebrazo = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Antebrazo')->count();

        $muñeca = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Muñeca')->count();

        $mano = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Mano')->count();

        $gluteo = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Gluteo')->count();

        $muslo = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Muslo')->count();

        $rodilla = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Rodilla')->count();

        $pierna = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Pierna')->count();

        $tobillo = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Tobillo')->count();

        $pie = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Pie')->count();

        $cabeza = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Cabeza')->count();

        $abdomen = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Abdomen')->count();

        return view($this->path.'/reservacion_citas')->with("torax",$torax)->with('abdomen',$abdomen)->with('ovarios',$ovarios)->with('utero',$utero)->with('cuello',$cuello)->with('hombro',$hombro)->with('brazo',$brazo)->with('codo',$codo)->with('antebrazo',$antebrazo)->with('muñeca',$muñeca)->with('mano',$mano)->with('gluteo',$gluteo)->with('muslo',$muslo)->with('rodilla',$rodilla)->with('pierna',$pierna)->with('tobillo',$tobillo)->with('pie',$pie)->with('cabeza',$cabeza);
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
}
