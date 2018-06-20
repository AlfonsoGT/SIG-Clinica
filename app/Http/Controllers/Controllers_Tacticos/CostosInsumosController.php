<?php

namespace App\Http\Controllers\Controllers_Tacticos;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class CostosInsumosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $path = '/salidas_tacticas/costos_insumos';
    public function index()
    {
        //
        
        $placas6 = DB::table('users')->join('entrada', 'users.id', '=', 'entrada.id')->join('material', 'entrada.idEntrada', '=', 'material.idEntrada')->join('tipoUnidad', 'material.idTipoUnidad', '=', 'tipoUnidad.idTipoUnidad')->join('tipoMaterial', 'tipoUnidad.idTipoMaterial', '=', 'tipoMaterial.idTipoMaterial')->where('nombreTipoUnidad','6 1/2')->select(DB::raw('SUM(material.cantidadMaterial*material.cantidadUnidadMaterial*0.05)as total'))->pluck('total');

        $placas8 = DB::table('users')->join('entrada', 'users.id', '=', 'entrada.id')->join('material', 'entrada.idEntrada', '=', 'material.idEntrada')->join('tipoUnidad', 'material.idTipoUnidad', '=', 'tipoUnidad.idTipoUnidad')->join('tipoMaterial', 'tipoUnidad.idTipoMaterial', '=', 'tipoMaterial.idTipoMaterial')->where('nombreTipoUnidad','8 x 10')->select(DB::raw('SUM(material.cantidadMaterial*material.cantidadUnidadMaterial*0.10)as total'))->pluck('total');

        $placas10 = DB::table('users')->join('entrada', 'users.id', '=', 'entrada.id')->join('material', 'entrada.idEntrada', '=', 'material.idEntrada')->join('tipoUnidad', 'material.idTipoUnidad', '=', 'tipoUnidad.idTipoUnidad')->join('tipoMaterial', 'tipoUnidad.idTipoMaterial', '=', 'tipoMaterial.idTipoMaterial')->where('nombreTipoUnidad','10 x 12')->select(DB::raw('SUM(material.cantidadMaterial*material.cantidadUnidadMaterial*0.15)as total'))->pluck('total');

        $placas11 = DB::table('users')->join('entrada', 'users.id', '=', 'entrada.id')->join('material', 'entrada.idEntrada', '=', 'material.idEntrada')->join('tipoUnidad', 'material.idTipoUnidad', '=', 'tipoUnidad.idTipoUnidad')->join('tipoMaterial', 'tipoUnidad.idTipoMaterial', '=', 'tipoMaterial.idTipoMaterial')->where('nombreTipoUnidad','11 x 14')->select(DB::raw('SUM(material.cantidadMaterial*material.cantidadUnidadMaterial*0.20)as total'))->pluck('total');

        $placas14 = DB::table('users')->join('entrada', 'users.id', '=', 'entrada.id')->join('material', 'entrada.idEntrada', '=', 'material.idEntrada')->join('tipoUnidad', 'material.idTipoUnidad', '=', 'tipoUnidad.idTipoUnidad')->join('tipoMaterial', 'tipoUnidad.idTipoMaterial', '=', 'tipoMaterial.idTipoMaterial')->where('nombreTipoUnidad','14 x 14')->select(DB::raw('SUM(material.cantidadMaterial*material.cantidadUnidadMaterial*0.25)as total'))->pluck('total');

        $placas17 = DB::table('users')->join('entrada', 'users.id', '=', 'entrada.id')->join('material', 'entrada.idEntrada', '=', 'material.idEntrada')->join('tipoUnidad', 'material.idTipoUnidad', '=', 'tipoUnidad.idTipoUnidad')->join('tipoMaterial', 'tipoUnidad.idTipoMaterial', '=', 'tipoMaterial.idTipoMaterial')->where('nombreTipoUnidad','14 x 17')->select(DB::raw('SUM(material.cantidadMaterial*material.cantidadUnidadMaterial*0.30)as total'))->pluck('total');

        $setRevelador = DB::table('users')->join('entrada', 'users.id', '=', 'entrada.id')->join('material', 'entrada.idEntrada', '=', 'material.idEntrada')->join('tipoUnidad', 'material.idTipoUnidad', '=', 'tipoUnidad.idTipoUnidad')->join('tipoMaterial', 'tipoUnidad.idTipoMaterial', '=', 'tipoMaterial.idTipoMaterial')->where('nombreTipoUnidad','Set')->where('nombreTipoMaterial','Revelador')->select(DB::raw('SUM(material.cantidadMaterial*material.cantidadUnidadMaterial*0.35)as total'))->pluck('total');


        $setFijador = DB::table('users')->join('entrada', 'users.id', '=', 'entrada.id')->join('material', 'entrada.idEntrada', '=', 'material.idEntrada')->join('tipoUnidad', 'material.idTipoUnidad', '=', 'tipoUnidad.idTipoUnidad')->join('tipoMaterial', 'tipoUnidad.idTipoMaterial', '=', 'tipoMaterial.idTipoMaterial')->where('nombreTipoUnidad','Set')->where('nombreTipoMaterial','Fijador')->select(DB::raw('SUM(material.cantidadMaterial*material.cantidadUnidadMaterial*0.35)as total'))->pluck('total');

        return view($this->path.'/costos_insumos')->with("placas6",$placas6)->with("placas8",$placas8)->with("placas10",$placas10)->with("placas11",$placas11)->with("placas14",$placas14)->with("placas17",$placas17)->with("setRevelador",$setRevelador)->with("setFijador",$setFijador);
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
