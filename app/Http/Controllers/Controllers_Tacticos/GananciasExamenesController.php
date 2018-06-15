<?php

namespace App\Http\Controllers\Controllers_Tacticos;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class GananciasExamenesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $path = '/salidas_tacticas/ganancias_examenes';
    public function index()
    {
        //
        $torax = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Torax')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');

        $ovarios = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Ovarios')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');

        $utero = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Utero')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');

        $cuello = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Cuello')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');

        $hombro = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Hombro')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');

        $brazo = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Brazo')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');

        $codo = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Codo')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');

        $antebrazo = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Antebrazo')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');

        $muñeca = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Muñeca')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');

        $mano = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Mano')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');

        $gluteo = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Gluteo')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');

        $muslo = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Muslo')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');

        $rodilla = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Rodilla')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');

        $pierna = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Pierna')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');

        $tobillo = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Tobillo')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');

        $pie = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Pie')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');

        $cabeza = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Cabeza')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');

        $abdomen = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Abdomen')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');

        return view($this->path.'/ganancias_examenes')->with("torax",$torax)->with('abdomen',$abdomen)->with('ovarios',$ovarios)->with('utero',$utero)->with('cuello',$cuello)->with('hombro',$hombro)->with('brazo',$brazo)->with('codo',$codo)->with('antebrazo',$antebrazo)->with('muñeca',$muñeca)->with('mano',$mano)->with('gluteo',$gluteo)->with('muslo',$muslo)->with('rodilla',$rodilla)->with('pierna',$pierna)->with('tobillo',$tobillo)->with('pie',$pie)->with('cabeza',$cabeza);
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
