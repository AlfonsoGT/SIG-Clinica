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
            ->join('tipoMaterial','tipoMaterial.idTipoMaterial','=','tipoUnidad.idTipoMaterial')
            ->join('salida','salida.idSalida','=','material.idSalida')
            ->where([['salida.idSalida','=',$sal->idSalida]])
            ->select(DB::raw('SUM(material.cantidadMaterial) as cantidadUnidad,tipoUnidad.idTipoMaterial,material.idSalida'))
            ->groupBy('tipoUnidad.idTipoMaterial')
            ->groupBy('material.idSalida')
            ->get();
            array_push($sumaTotal, $aux);
        }
        $salidasConteo = DB::table('salida')->count();
       //dd($sumaTotal);
        return view($this->path.'/admin_salidas')->with('salidas',$salidas)->with('sumaTotal',$sumaTotal)->with('salidasConteo',$salidasConteo);
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

            $sumaTotal = DB::table('material')
            ->join('tipoUnidad','tipoUnidad.idTipoUnidad','=','material.idTipoUnidad')
            ->join('tipoMaterial','tipoMaterial.idTipoMaterial','=','tipoUnidad.idTipoMaterial')
            ->join('salida','salida.idSalida','=','material.idSalida')
            ->where('salida.idSalida','=',$salida->idSalida)
            ->select(DB::raw('SUM(material.cantidadMaterial) as cantidadUnidad,tipoUnidad.idTipoUnidad'))
            ->groupBy('tipoUnidad.idTipoUnidad')
            ->get();
        //dd($sumaTotal);
            $unidadConteo= DB::table('tipoUnidad')->count();

        return view($this->path.'/verDetalleSalida')->with('salidas',$salidas)->with('detalleSalidas',$detalleSalidas)->with('sumaTotal',$sumaTotal)->with('unidadConteo',$unidadConteo);

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
