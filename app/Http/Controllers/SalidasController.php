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
        $salidas = DB::table('salida')->paginate(10);
        return view($this->path.'/admin_salidas')->with('salidas',$salidas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->path.'/crearSalida');
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
            $salida = new Salida();
            $salida->fecha = $request->fecha;
            $salida->id = $request->idUser;
            $salida->save();
            return redirect($this->path)->with('msj','Inventario aperturado exitosamente');
        }catch(Exception $e){
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
          ->join('tipoMaterial','tipoMaterial.idTipoMaterial','=','tipoUnidad.idTipoMaterial')
          ->select('tipoUnidad.*','salida.*','material.*','tipoMaterial.*')
          ->where('salida.idSalida',
              $salida->idSalida)
          ->paginate(5);
         

        $tipoMaterial =DB::table('tipoMaterial')->select('idTipoMaterial', 'nombreTipoMaterial')->get();
        $tipoUnidad =DB::table('tipoUnidad')->select('idTipoUnidad', 'nombreTipoUnidad')->get();

        return view($this->path.'/verDetalleSalida')->with('salidas',$salidas)->with('tipoMaterial',$tipoMaterial)->with('tipoUnidad',$tipoUnidad)->with('detalleSalidas',$detalleSalidas);

    }
    public function IngresarMaterial(Request $request, $idSalida)
    {
       
        try{
            $material = new Material();
            $material->cantidadMaterial= $request->cantidadMaterial;
            $material->fecha = $request->fecha;
            $material->idTipoUnidad=$request->tipoUnidad;
            $material->idSalida = $idSalida;
            
            $material->save();
            return redirect()->action('SalidasController@show',['idSalida' => $idSalida])->with('msj','Material Guardado exitosamente');
        }catch(Exception $e){
        } 
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
