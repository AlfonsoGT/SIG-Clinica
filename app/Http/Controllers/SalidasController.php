<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Salida;
use App\TipoUnidad;
use App\Material;


class SalidasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     private $path = '/admin_salidas';
    public function index()
    {
        $salidas = DB::table('salida')
        ->join('users','users.id','=','salida.id')
        ->select('users.*','salida.*')
        ->paginate(10);
        $sumaTotal=[];
        foreach ($salidas as $sal) {
            $aux = DB::table('material')
            ->join('tipoUnidad','tipoUnidad.idTipoUnidad','=','material.idTipoUnidad')
            ->join('tipomaterial','tipomaterial.idTipoMaterial','=','tipoUnidad.idTipoMaterial')
            ->join('salida','salida.idSalida','=','material.idSalida')
            ->where([['salida.idSalida','=',$sal->idSalida]])
            ->select(DB::raw('SUM(material.cantidadMaterial) as cantidadUnidad,tipoUnidad.idTipoMaterial,material.idSalida'))
            ->groupBy('tipoUnidad.idTipoMaterial')
            ->groupBy('material.idSalida')
            ->get();
            array_push($sumaTotal, $aux);
        }
        $salidasConteo = DB::table('salida')->count();

        return view($this->path.'/admin_salidas')->with('salidas',$salidas)->with('sumaTotal',$sumaTotal)->with('salidasConteo',$salidasConteo);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoMaterial =DB::table('tipomaterial')->select('idTipoMaterial', 'nombreTipoMaterial')->get();
        $tipoUnidad =DB::table('tipoUnidad')->select('idTipoUnidad', 'nombreTipoUnidad')->get();
        return view($this->path.'/crearMaterial')->with('tipoMaterial',$tipoMaterial)->with('tipoUnidad',$tipoUnidad);

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

            'cantidadMaterial' => 'required|integer',
        ]);
       try{

            $newDate = date("m-Y", strtotime($request->fecha));
            $añoSalida = date("Y", strtotime($request->fecha));
            $revision=DB::table('salida')
            ->where('fecha',$newDate)
            ->count();
            //-------------------------------------------------
        $sumaTotalEntradas = DB::table('material')
            ->join('tipoUnidad','tipoUnidad.idTipoUnidad','=','material.idTipoUnidad')
            ->join('tipomaterial','tipomaterial.idTipoMaterial','=','tipoUnidad.idTipoMaterial')
            ->join('entrada','entrada.idEntrada','=','material.idEntrada')
            ->where('tipoUnidad.idTipoMaterial','=',$request->tipoMaterial)
            ->where('material.idTipoUnidad','=',$request->tipoUnidad)
            ->where('entrada.año','=', $añoSalida)
            ->select(DB::raw('SUM(material.cantidadMaterial) as cantidadUnidad,SUM(material.cantidadUnidadMaterial) as cantidadSuma,tipoUnidad.idTipoUnidad'))
            ->groupBy('tipoUnidad.idTipoUnidad')
            ->get();
            $conteo =DB::table('entrada')
            ->join('material','material.idEntrada','=','material.idEntrada')
            ->join('tipoUnidad','tipoUnidad.idTipoUnidad','=','material.idTipoUnidad')
            ->join('tipomaterial','tipomaterial.idTipoMaterial','=','tipoUnidad.idTipoMaterial')
            ->select('material.cantidadMaterial','material.cantidadUnidadMaterial')
            ->where('tipoUnidad.idTipoMaterial','=',$request->tipoMaterial)
            ->where('material.idTipoUnidad','=',$request->tipoUnidad)
            ->where('entrada.año','=', $añoSalida)
            ->count();
        $sumaTotalSalidas = DB::table('material')
            ->join('tipoUnidad','tipoUnidad.idTipoUnidad','=','material.idTipoUnidad')
            ->join('tipomaterial','tipomaterial.idTipoMaterial','=','tipoUnidad.idTipoMaterial')
            ->join('salida','salida.idSalida','=','material.idSalida')
            ->where('salida.añoSalida','=', $añoSalida)
            ->select(DB::raw('SUM(material.cantidadMaterial) as cantidadUnidad,tipoUnidad.idTipoUnidad'))
            ->groupBy('tipoUnidad.idTipoUnidad')
            ->get();

            foreach ($sumaTotalEntradas as $caja) {
                $cantidadEntrada = $caja->cantidadUnidad*$caja->cantidadSuma;
            }
            $cantidadSalida = 0;
            foreach ($sumaTotalSalidas as $caja) {
                $cantidadSalida = $caja->cantidadUnidad;
            }
            if($conteo>0){
              $prueba = $cantidadEntrada - $cantidadSalida - $request->cantidadMaterial;
            }else{
               $prueba =  $request->cantidadMaterial*-1;
            }
            //dd($cantidadSalida);

            //dd($prueba);
            //---------------------------------------------------
            if($prueba>0){
                 //dd($revision);
            if($revision==0){
                $verificar=0;
                $salida = new Salida();
                $salida->fecha = $newDate;
                $salida->añoSalida = $añoSalida;
                $salida->id = $request->idUser;

                $salida->save();

            }else{
                $idSalidaExistente=DB::table('salida')
                ->where('fecha',$newDate)
                ->max('idSalida');
                $salida=Salida::findOrFail($idSalidaExistente);

                $verificar=DB::table('material')
                ->where('idSalida',$salida->idSalida)
                ->where('idTipoUnidad',$request->tipoUnidad)
                ->where('fecha',$request->fecha)
                ->count();
            }
            if($verificar==0){
            $material = new Material();
            $material->cantidadMaterial= $request->cantidadMaterial;
            $material->fecha = $request->fecha;
            $material->idTipoUnidad=$request->tipoUnidad;
            $material->idSalida = $salida->idSalida;
            $material->save();
            return redirect()->action('SalidasController@show',['idSalida' => $salida->idSalida])->with('msj','Material Guardado exitosamente');
         }else{
          return redirect()
          ->action('SalidasController@show',['idSalida' => $salida->idSalida])
         ->with('msj2','Registro de Material ya hecho posiblemente en la misma Fecha');
            }

            }else{
            return redirect($this->path)
            ->with('msj2','El registro de Material se pasa del limite de materiales disponibles o No hay materiales Disponibles');
            }




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
    public function show($idSalida)
    {
        $salida = Salida::findOrFail($idSalida);
        $salidas = DB::table('salida')
          ->join('users', 'users.id', '=', 'salida.id')
          ->select('users.*','salida.*')
          ->where('salida.idSalida',
              $salida->idSalida)
          ->get();
         $detalleSalidas = DB::table('material')
          ->join('salida', 'salida.idSalida', '=', 'material.idSalida')
          ->join('tipoUnidad','tipoUnidad.idTipoUnidad','=','material.idTipoUnidad')
          ->join('tipomaterial','tipomaterial.idTipoMaterial','=','tipoUnidad.idTipoMaterial')
          ->select('tipoUnidad.*','salida.*','material.*','tipomaterial.*')
          ->where('salida.idSalida',
              $salida->idSalida)
          ->paginate(5);

            $sumaTotalSalidas = DB::table('material')
            ->join('tipoUnidad','tipoUnidad.idTipoUnidad','=','material.idTipoUnidad')
            ->join('tipomaterial','tipomaterial.idTipoMaterial','=','tipoUnidad.idTipoMaterial')
            ->join('salida','salida.idSalida','=','material.idSalida')
            ->where('salida.añoSalida','=',$salida->añoSalida)
            ->select(DB::raw('SUM(material.cantidadMaterial) as cantidadUnidad,tipoUnidad.idTipoUnidad'))
            ->groupBy('tipoUnidad.idTipoUnidad')
            ->get();
        //dd($sumaTotal);
            $TipoUnidadTodo = DB::table('tipoMaterial')
            ->join('tipoUnidad','tipoUnidad.idTipoMaterial','=','tipoMaterial.idTipoMaterial')
            ->select('tipoUnidad.*','tipoMaterial.*')
            ->get();
            $sumaTotal = DB::table('material')
            ->join('tipoUnidad','tipoUnidad.idTipoUnidad','=','material.idTipoUnidad')
            ->join('tipomaterial','tipomaterial.idTipoMaterial','=','tipoUnidad.idTipoMaterial')
            ->join('entrada','entrada.idEntrada','=','material.idEntrada')
            ->where('entrada.año','=',$salida->añoSalida)
            ->select(DB::raw('SUM(material.cantidadMaterial) as cantidadUnidad,SUM(material.cantidadUnidadMaterial) as cantidadSuma,tipoUnidad.idTipoUnidad'))
            ->groupBy('tipoUnidad.idTipoUnidad')
            ->get();
            //dd($sumaTotal);

        return view($this->path.'/verDetalleSalida')->with('salidas',$salidas)->with('detalleSalidas',$detalleSalidas)->with('sumaTotalSalidas',$sumaTotalSalidas)->with('sumaTotal',$sumaTotal)->with('TipoUnidadTodo',$TipoUnidadTodo);

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
    public function destroy($idMaterial)
    {
        $material = Material::findOrFail($idMaterial);
        $material->delete();
       return redirect()->action('SalidasController@show',['idSalida' => $material->idSalida])->with('msj2','Material Eliminado exitosamente');
    }
    public function vista_borrarMaterial($idMaterial,$idSalida){
         //recuperar de la base el elemento que queremos borrar en base al ID que recibimos en la URL con el unico fin de mostrar el detalle
         $material = Material::find($idMaterial);
         $detalleMaterial = DB::table('material')
        ->join('tipoUnidad','tipoUnidad.idTipoUnidad','=','material.idTipounidad')
        ->join('tipomaterial','tipomaterial.idTipoMaterial','=','tipoUnidad.idTipoMaterial')
        ->select('tipoUnidad.*','tipomaterial.*','material.*')
        ->where('material.idMaterial',$material->idMaterial)
        ->get();
        return view($this->path.'/vista_borrarMaterial')->with('material', $material)->with('detalleMaterial',$detalleMaterial);
    }
    public function tomarIdMaterialEliminar($idMaterial,$idSalida)
    {
        return $this->destroy($idMaterial,$idSalida);
    }
      public function getTipoUnidad($idTipoMaterial)
    {
        $unidades= DB::table('tipoUnidad')
        ->join('tipomaterial','tipomaterial.idTipoMaterial','=','tipoUnidad.idTipoMaterial')
        ->where('tipoUnidad.idTipoMaterial','=',$idTipoMaterial)
        ->select('tipoUnidad.*')->get();
        return $unidades;
    }

}
