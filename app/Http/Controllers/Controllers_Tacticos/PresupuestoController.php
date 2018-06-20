<?php

namespace App\Http\Controllers\Controllers_Tacticos;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;

class PresupuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $path = '/salidas_tacticas/presupuesto';
    public function index()
    {
        //
        
        $torax = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Torax')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');
        
         $torax= json_decode($torax, true);
        if($torax['0'] == NULL)
             $torax = 0;
        else
            $torax = $torax['0'];

        $ovarios = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Ovarios')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');

          $ovarios= json_decode($ovarios, true);
        if($ovarios['0'] == NULL)
             $ovarios = 0;
        else
            $ovarios = $ovarios['0'];

        $utero = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Utero')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');

          $utero= json_decode($utero, true);
        if($utero['0'] == NULL)
             $utero = 0;
        else
            $utero = $utero['0'];

        $cuello = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Cuello')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');

          $cuello= json_decode($cuello, true);
        if($cuello['0'] == NULL)
             $cuello = 0;
        else
            $cuello = $cuello['0'];

        $hombro = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Hombro')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');

          $hombro= json_decode($hombro, true);
        if($hombro['0'] == NULL)
             $hombro = 0;
        else
            $hombro = $hombro['0'];

        $brazo = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Brazo')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');

          $brazo= json_decode($brazo, true);
        if($brazo['0'] == NULL)
             $brazo = 0;
        else
            $brazo = $brazo['0'];

        $codo = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Codo')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');

          $codo= json_decode($codo, true);
        if($codo['0'] == NULL)
             $codo = 0;
        else
            $codo = $codo['0'];

        $antebrazo = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Antebrazo')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');

        $antebrazo= json_decode($antebrazo, true);
        if($antebrazo['0'] == NULL)
             $antebrazo = 0;
        else
            $antebrazo = $antebrazo['0'];

        $muñeca = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Muñeca')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');

          $muñeca= json_decode($muñeca, true);
        if($muñeca['0'] == NULL)
             $muñeca = 0;
        else
            $muñeca = $muñeca['0'];

        $mano = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Mano')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');

          $mano= json_decode($mano, true);
        if($mano['0'] == NULL)
             $mano = 0;
        else
            $mano = $mano['0'];

        $gluteo = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Gluteo')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');

          $gluteo= json_decode($gluteo, true);
        if($gluteo['0'] == NULL)
             $gluteo = 0;
        else
            $gluteo = $gluteo['0'];

        $muslo = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Muslo')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');

          $muslo= json_decode($muslo, true);
        if($muslo['0'] == NULL)
             $muslo = 0;
        else
            $muslo = $muslo['0'];

        $rodilla = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Rodilla')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');

          $rodilla= json_decode($rodilla, true);
        if($rodilla['0'] == NULL)
             $rodilla = 0;
        else
            $rodilla = $rodilla['0'];

        $pierna = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Pierna')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');

          $pierna= json_decode($pierna, true);
        if($pierna['0'] == NULL)
             $pierna = 0;
        else
            $pierna = $pierna['0'];

        $tobillo = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Tobillo')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');

          $tobillo= json_decode($tobillo, true);
        if($tobillo['0'] == NULL)
             $tobillo = 0;
        else
            $tobillo = $tobillo['0'];

        $pie = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Pie')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');

          $pie= json_decode($pie, true);
        if($pie['0'] == NULL)
             $pie = 0;
        else
            $pie = $pie['0'];

        $cabeza = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Cabeza')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');

          $cabeza= json_decode($cabeza, true);
        if($cabeza['0'] == NULL)
             $cabeza = 0;
        else
            $cabeza = $cabeza['0'];

        $abdomen = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Abdomen')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');

          $abdomen= json_decode($abdomen, true);
        if($abdomen['0'] == NULL)
             $abdomen = 0;
        else
            $abdomen = $abdomen['0'];

        $placas6 = DB::table('users')->join('entrada', 'users.id', '=', 'entrada.id')->join('material', 'entrada.idEntrada', '=', 'material.idEntrada')->join('tipoUnidad', 'material.idTipoUnidad', '=', 'tipoUnidad.idTipoUnidad')->join('tipoMaterial', 'tipoUnidad.idTipoMaterial', '=', 'tipoMaterial.idTipoMaterial')->where('nombreTipoUnidad','6 1/2')->select(DB::raw('SUM(material.cantidadMaterial*material.cantidadUnidadMaterial*0.05)as total'))->pluck('total');

         $placas6= json_decode($placas6, true);
        if($placas6['0'] == NULL)
             $placas6 = 0;
        else
            $placas6 = $placas6['0'];


        $placas8 = DB::table('users')->join('entrada', 'users.id', '=', 'entrada.id')->join('material', 'entrada.idEntrada', '=', 'material.idEntrada')->join('tipoUnidad', 'material.idTipoUnidad', '=', 'tipoUnidad.idTipoUnidad')->join('tipoMaterial', 'tipoUnidad.idTipoMaterial', '=', 'tipoMaterial.idTipoMaterial')->where('nombreTipoUnidad','8 x 10')->select(DB::raw('SUM(material.cantidadMaterial*material.cantidadUnidadMaterial*0.10)as total'))->pluck('total');

         $placas8= json_decode($placas8, true);
        if($placas8['0'] == NULL)
             $placas8 = 0;
        else
            $placas8 = $placas8['0'];


        $placas10 = DB::table('users')->join('entrada', 'users.id', '=', 'entrada.id')->join('material', 'entrada.idEntrada', '=', 'material.idEntrada')->join('tipoUnidad', 'material.idTipoUnidad', '=', 'tipoUnidad.idTipoUnidad')->join('tipoMaterial', 'tipoUnidad.idTipoMaterial', '=', 'tipoMaterial.idTipoMaterial')->where('nombreTipoUnidad','10 x 12')->select(DB::raw('SUM(material.cantidadMaterial*material.cantidadUnidadMaterial*0.15)as total'))->pluck('total');

         $placas10= json_decode($placas10, true);
        if($placas10['0'] == NULL)
             $placas10 = 0;
        else
            $placas10 = $placas10['0'];


        $placas11 = DB::table('users')->join('entrada', 'users.id', '=', 'entrada.id')->join('material', 'entrada.idEntrada', '=', 'material.idEntrada')->join('tipoUnidad', 'material.idTipoUnidad', '=', 'tipoUnidad.idTipoUnidad')->join('tipoMaterial', 'tipoUnidad.idTipoMaterial', '=', 'tipoMaterial.idTipoMaterial')->where('nombreTipoUnidad','11 x 14')->select(DB::raw('SUM(material.cantidadMaterial*material.cantidadUnidadMaterial*0.20)as total'))->pluck('total');

         $placas11= json_decode($placas11, true);
        if($placas11['0'] == NULL)
             $placas11 = 0;
        else
            $placas11 = $placas11['0'];


        $placas14 = DB::table('users')->join('entrada', 'users.id', '=', 'entrada.id')->join('material', 'entrada.idEntrada', '=', 'material.idEntrada')->join('tipoUnidad', 'material.idTipoUnidad', '=', 'tipoUnidad.idTipoUnidad')->join('tipoMaterial', 'tipoUnidad.idTipoMaterial', '=', 'tipoMaterial.idTipoMaterial')->where('nombreTipoUnidad','14 x 14')->select(DB::raw('SUM(material.cantidadMaterial*material.cantidadUnidadMaterial*0.25)as total'))->pluck('total');

         $placas14= json_decode($placas14, true);
        if($placas14['0'] == NULL)
             $placas14 = 0;
        else
            $placas14 = $placas14['0'];


        $placas17 = DB::table('users')->join('entrada', 'users.id', '=', 'entrada.id')->join('material', 'entrada.idEntrada', '=', 'material.idEntrada')->join('tipoUnidad', 'material.idTipoUnidad', '=', 'tipoUnidad.idTipoUnidad')->join('tipoMaterial', 'tipoUnidad.idTipoMaterial', '=', 'tipoMaterial.idTipoMaterial')->where('nombreTipoUnidad','14 x 17')->select(DB::raw('SUM(material.cantidadMaterial*material.cantidadUnidadMaterial*0.30)as total'))->pluck('total');

         $placas17= json_decode($placas17, true);
        if($placas17['0'] == NULL)
             $placas17 = 0;
        else
            $placas17 = $placas17['0'];


        $setRevelador = DB::table('users')->join('entrada', 'users.id', '=', 'entrada.id')->join('material', 'entrada.idEntrada', '=', 'material.idEntrada')->join('tipoUnidad', 'material.idTipoUnidad', '=', 'tipoUnidad.idTipoUnidad')->join('tipoMaterial', 'tipoUnidad.idTipoMaterial', '=', 'tipoMaterial.idTipoMaterial')->where('nombreTipoUnidad','Set')->where('nombreTipoMaterial','Revelador')->select(DB::raw('SUM(material.cantidadMaterial*material.cantidadUnidadMaterial*0.35)as total'))->pluck('total');

         $setRevelador= json_decode($setRevelador, true);
        if($setRevelador['0'] == NULL)
             $setRevelador = 0;
        else
            $setRevelador = $setRevelador['0'];



        $setFijador = DB::table('users')->join('entrada', 'users.id', '=', 'entrada.id')->join('material', 'entrada.idEntrada', '=', 'material.idEntrada')->join('tipoUnidad', 'material.idTipoUnidad', '=', 'tipoUnidad.idTipoUnidad')->join('tipoMaterial', 'tipoUnidad.idTipoMaterial', '=', 'tipoMaterial.idTipoMaterial')->where('nombreTipoUnidad','Set')->where('nombreTipoMaterial','Fijador')->select(DB::raw('SUM(material.cantidadMaterial*material.cantidadUnidadMaterial*0.35)as total'))->pluck('total');

         $setFijador= json_decode($setFijador, true);
        if($setFijador['0'] == NULL)
             $setFijador = 0;
        else
            $setFijador = $setFijador['0'];


        $ganancias = $torax + $ovarios + $utero + $cuello + $hombro + $brazo + $codo + $antebrazo + $muñeca + $mano + $gluteo + $muslo + $rodilla + $pierna + $tobillo + $pie + $cabeza + $abdomen;

        $costos = $placas6 + $placas8 + $placas10 + $placas11 + $placas14 + $placas17 + $setFijador + $setRevelador;

        $presupuesto = $ganancias - $costos; 

        return view($this->path.'/presupuesto')->with("ganancias",$ganancias)->with("costos",$costos)->with("presupuesto",$presupuesto);
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
