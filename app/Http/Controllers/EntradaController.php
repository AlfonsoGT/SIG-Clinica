<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Http\FormRequest;
use App\Entrada;
use App\TipoUnidad;
use App\Material;

class EntradaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $path = '/admin_entradas';
    public function index()
    {
        $entradas = DB::table('entrada')
        ->join('users','users.id','=','entrada.id')
        ->select('users.*','entrada.*')
        ->paginate(10);

        $sumaTotal=[];
        foreach ($entradas as $entrada) {
            $aux = DB::table('material')
            ->join('tipoUnidad','tipoUnidad.idTipoUnidad','=','material.idTipoUnidad')
            ->join('tipoMaterial','tipoMaterial.idTipoMaterial','=','tipoUnidad.idTipoMaterial')
            ->join('entrada','entrada.idEntrada','=','material.idEntrada')
            ->where([['entrada.idEntrada','=',$entrada->idEntrada]])
            ->select(DB::raw('SUM(material.cantidadMaterial) as cantidadUnidad,SUM(material.cantidadUnidadMaterial) as cantidadUn,tipoUnidad.idTipoMaterial,material.idEntrada'))
            ->groupBy('tipoUnidad.idTipoMaterial')
            ->groupBy('material.idEntrada')
            ->get();
            array_push($sumaTotal, $aux);
        }
        $entradasConteo = DB::table('entrada')->count();

        return view($this->path.'/admin_entradas')->with('entradas',$entradas)->with('sumaTotal',$sumaTotal)->with('entradasConteo',$entradasConteo);
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
        return view($this->path.'/crearMaterialEntrada')->with('tipoMaterial',$tipoMaterial)->with('tipoUnidad',$tipoUnidad);
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
            'proveedor' => 'required|max:75|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
            'cantidadMaterial' => 'required|integer',
            'cantidadUnidadMaterial' => 'required|integer',

        ]);
        try{
            $newDate = date("Y", strtotime($request->fecha));
            $revision=DB::table('entrada')
            ->where('año',$newDate)
            ->count();

            //https://laravel.com/docs/5.5/validation
            if($revision==0){
                $verificar=0;
                $entrada = new Entrada();
                $entrada->año = $newDate;
                $entrada->id = $request->idUser;
                $entrada->save();

            }else{
                $idEntradaExistente=DB::table('entrada')
                ->where('año',$newDate)
                ->max('idEntrada');
                $entrada=Entrada::findOrFail($idEntradaExistente);

                $verificar=DB::table('material')
                ->where('idEntrada',$entrada->idEntrada)
                ->where('idTipoUnidad',$request->tipoUnidad)
                ->where('fecha',$request->fecha)
                ->count();
            }
            if($verificar==0){
            $material = new Material();
            $material->cantidadMaterial= $request->cantidadMaterial;
            $material->cantidadUnidadMaterial= $request->cantidadUnidadMaterial;
            $material->fecha = $request->fecha;
            $material->idTipoUnidad=$request->tipoUnidad;
            $material->idEntrada = $entrada->idEntrada;
            $material->proveedor = $request->proveedor;
            $material->save();
            return redirect()->action('EntradaController@show',['idEntrada' => $entrada->idEntrada])->with('msj','Material Guardado exitosamente');
         }else{
          return redirect()
          ->action('EntradaController@show',['idEntrada' => $entrada->idEntrada])
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
    public function show($idEntrada)
    {
        $entrada = Entrada::findOrFail($idEntrada);
        $entradas = DB::table('entrada')
          ->join('users', 'users.id', '=', 'entrada.id')
          ->select('users.*','entrada.*')
          ->where('entrada.idEntrada',$entrada->idEntrada)
          ->get();
        $detalleEntradas = DB::table('material')
          ->join('entrada', 'entrada.idEntrada', '=', 'material.idEntrada')
          ->join('tipoUnidad','tipoUnidad.idTipoUnidad','=','material.idTipoUnidad')
          ->join('tipoMaterial','tipoMaterial.idTipoMaterial','=','tipoUnidad.idTipoMaterial')
          ->select('tipoUnidad.*','entrada.*','material.*','tipoMaterial.*')
          ->where('entrada.idEntrada',$entrada->idEntrada)
          ->paginate(5);


         $sumaTotalSalidas = DB::table('material')
            ->join('tipoUnidad','tipoUnidad.idTipoUnidad','=','material.idTipoUnidad')
            ->join('tipoMaterial','tipoMaterial.idTipoMaterial','=','tipoUnidad.idTipoMaterial')
            ->join('salida','salida.idSalida','=','material.idSalida')
            ->where('salida.añoSalida','=',$entrada->año)
            ->select(DB::raw('SUM(material.cantidadMaterial) as cantidadUnidad,tipoUnidad.idTipoUnidad'))
            ->groupBy('tipoUnidad.idTipoUnidad')
            ->get();

        $TipoUnidadTodo = DB::table('tipoMaterial')
        ->join('tipoUnidad','tipoUnidad.idTipoMaterial','=','tipomaterial.idTipoMaterial')
        ->select('tipoUnidad.*','tipomaterial.*')
        ->get();


          $sumaTotal = DB::table('material')
            ->join('tipoUnidad','tipoUnidad.idTipoUnidad','=','material.idTipoUnidad')
            ->join('tipoMaterial','tipoMaterial.idTipoMaterial','=','tipoUnidad.idTipoMaterial')
            ->join('entrada','entrada.idEntrada','=','material.idEntrada')
            ->where('entrada.idEntrada','=',$entrada->idEntrada)
            ->select(DB::raw('SUM(material.cantidadMaterial) as cantidadUnidad,SUM(material.cantidadUnidadMaterial) as cantidadSuma,tipoUnidad.idTipoUnidad'))
            ->groupBy('tipoUnidad.idTipoUnidad')
            ->get();
        //dd($sumaTotal);
        return view($this->path.'/verDetalleEntrada')->with('entradas',$entradas)->with('detalleEntradas',$detalleEntradas)->with('sumaTotal',$sumaTotal)->with('sumaTotalSalidas',$sumaTotalSalidas)->with('TipoUnidadTodo',$TipoUnidadTodo);
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
       return redirect()->action('EntradaController@show',['idEntrada' => $material->idEntrada])->with('msj2','Material Eliminado exitosamente');
    }
    public function borrarMaterialEntrada($idMaterial,$idEntrada){
         //recuperar de la base el elemento que queremos borrar en base al ID que recibimos en la URL con el unico fin de mostrar el detalle
         $material = Material::find($idMaterial);
         $detalleMaterial = DB::table('material')
        ->join('tipoUnidad','tipoUnidad.idTipoUnidad','=','material.idTipounidad')
        ->join('tipoMaterial','tipoMaterial.idTipoMaterial','=','tipoUnidad.idTipoMaterial')
        ->select('tipoUnidad.*','tipoMaterial.*','material.*')
        ->where('material.idMaterial',$material->idMaterial)
        ->get();
        return view($this->path.'/vista_borrarMaterialEntrada')->with('material', $material)->with('detalleMaterial',$detalleMaterial);
    }

    public function tomarIdMaterialEliminarEntrada($idMaterial,$idEntrada)
    {
        return $this->destroy($idMaterial,$idEntrada);
    }

}
