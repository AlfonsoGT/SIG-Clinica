<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Salida;
use App\TipoUnidad;
use App\Material;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     private $path = '/admin_material';
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoMaterial =DB::table('tipoMaterial')->select('idTipoMaterial', 'nombreTipoMaterial')->get();
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
          try{
            $newDate = date("m-Y", strtotime($request->fecha));
            $revision=DB::table('salida')
            ->where('fecha',$newDate)
            ->count();
            //dd($revision);
            if($revision==0){
                $verificar=0;
                $salida = new Salida();
                $salida->fecha = $newDate;
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
         ->with('msj2','Registro de Material ya hecho posiblemente en la misma Fecha');}

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idMaterial)
    {
        $material= Material::findOrFail($idMaterial);
        $tipoUnidadSeleccionado = DB::table('material')
        ->join('tipoUnidad','material.idTipoUnidad','=','tipoUnidad.idTipoUnidad')
        ->join('tipoMaterial','tipoMaterial.idTipoMaterial','=','tipoUnidad.idTipoMaterial')
        ->select('tipoUnidad.idTipoUnidad','tipoUnidad.nombreTipoUnidad','tipoMaterial.*')
        ->where('material.idTipoUnidad',$material->idTipoUnidad)
        ->get();
        //dd($tipoUnidadSeleccionado);
        /**$tipoMaterialNoSeleccionado = [];
        /**
        foreach($tipoUnidadSeleccionado as $tipo){
            
            $aux = DB::table('tipoMaterial')
            ->join('tipoUnidad', 'tipoUnidad.idTipoMaterial', '=', 'tipoMaterial.idTipoMaterial')
            ->where([['tipoMaterial.idTipoMaterial','<>',$tipo->idTipoMaterial]])
            ->select('tipoMaterial.nombreTipoMaterial','tipoMaterial.idTipoMaterial')
            ->get();
            array_push($tipoMaterialNoSeleccionado, $aux);
        }**/
        
        $tipoUnidadNoSeleccionado2 = [];
        foreach($tipoUnidadSeleccionado as $tipo){
            $aux = DB::table('tipoUnidad')
            ->join('tipoMaterial','tipoMaterial.idTipoMaterial','=','tipoUnidad.idTipoMaterial')
            ->where([['tipoMaterial.idTipoMaterial','=',$tipo->idTipoMaterial]])
            ->where([['tipoUnidad.idTipounidad','<>',$tipo->idTipoUnidad]])
            ->select('tipoUnidad.nombreTipoUnidad','tipoUnidad.idTipoUnidad')
            ->get();
            array_push($tipoUnidadNoSeleccionado2, $aux);
        }
        //dd($tipoUnidadNoSeleccionado);
        $tipoMaterialNoSeleccionado =DB::table('tipoMaterial')
            ->join('tipoUnidad', 'tipoUnidad.idTipoMaterial', '=', 'tipoMaterial.idTipoMaterial')
            ->where('tipoMaterial.idTipoMaterial','<>',$tipo->idTipoMaterial)
            ->select('tipoMaterial.nombreTipoMaterial','tipoMaterial.idTipoMaterial')
            ->get();
        $tipoUnidadNoSeleccionado =DB::table('tipoUnidad')
            ->join('tipoMaterial','tipoMaterial.idTipoMaterial','=','tipoUnidad.idTipoMaterial')
            ->where('tipoMaterial.idTipoMaterial','=',$tipo->idTipoMaterial)
            ->where('tipoUnidad.idTipounidad','<>',$tipo->idTipoUnidad)
            ->select('tipoUnidad.nombreTipoUnidad','tipoUnidad.idTipoUnidad')
            ->get();
        return view($this->path.'/editarMaterial')->with('material',$material)
            ->with('tipoUnidadSeleccionado',$tipoUnidadSeleccionado)->with('tipoMaterialNoSeleccionado',$tipoMaterialNoSeleccionado)->with('tipoUnidadNoSeleccionado',$tipoUnidadNoSeleccionado);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idMaterial)
    {
         try{
            $newDate = date("m-Y", strtotime($request->fecha));
            $revision=DB::table('salida')
            ->where('fecha',$newDate)
            ->count();
            //dd($revision);
            if($revision==0){
                $verificar=0;
                $salida = new Salida();
                $salida->fecha = $newDate;
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
            $material = Material::findOrFail($idMaterial);
            $material->cantidadMaterial= $request->cantidadMaterial;
            $material->fecha = $request->fecha;
            $material->idTipoUnidad=$request->tipoUnidad;
            $material->idSalida = $salida->idSalida;
            $material->save();
            return redirect()->action('SalidasController@show',['idSalida' => $salida->idSalida])->with('msj','Material Modificado exitosamente');
         }else{
          return redirect()
          ->action('SalidasController@show',['idSalida' => $salida->idSalida])
         ->with('msj2','Registro de Material ya hecho posiblemente en la misma Fecha');}

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
    public function destroy($idMaterial,$idSalida)
    {
        $material = Material::findOrFail($idMaterial);
        $material->delete();
       return redirect()->action('SalidasController@show',['idSalida' => $idSalida])->with('msj2','Material Eliminado exitosamente');
    }
    public function vista_borrarMaterial($idMaterial,$idSalida){
         //recuperar de la base el elemento que queremos borrar en base al ID que recibimos en la URL con el unico fin de mostrar el detalle
         $material = Material::find($idMaterial);
         $detalleMaterial = DB::table('material')
        ->join('tipoUnidad','tipoUnidad.idTipoUnidad','=','material.idTipounidad')
        ->join('tipoMaterial','tipoMaterial.idTipoMaterial','=','tipoUnidad.idTipoMaterial')
        ->select('tipoUnidad.*','tipoMaterial.*','material.*')
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
        ->join('tipoMaterial','tipoMaterial.idTipoMaterial','=','tipoUnidad.idTipoMaterial')
        ->where('tipoUnidad.idTipoMaterial','=',$idTipoMaterial)
        ->select('tipoUnidad.*')->get();
        return $unidades;
    }

}
