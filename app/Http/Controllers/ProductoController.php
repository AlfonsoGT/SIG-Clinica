<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\TipoProducto;
use App\Producto;
use App\Unidad;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $path = '/admin_productos';
    public function index()
    {
        $productos = DB::table('producto')
        ->orderBy('idProducto', 'desc')
        ->join('tipoProducto', 'producto.idTipoProducto', '=', 'tipoProducto.idTipoProducto')
        ->select('producto.*','tipoProducto.nombreTipoProducto')
        ->paginate(10);

        return view($this->path.'/admin_productos')->with('productos',$productos);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoProductos = DB::table('tipoProducto')->select('idTipoProducto', 'nombreTipoProducto')->get();
        return view($this->path.'/crearProducto')->with('tipoProductos',$tipoProductos);
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
        //
        $producto = new Producto();
        $producto->fechaCompra = $request->fechaCompra;
        $producto->cantidadProducto = $request->cantidad;
        $producto->precioUnidad = $request->precioUnidad;
        $producto->idTipoProducto= $request->tipoProducto;
        $producto->reciente=true;

        //guardado y envío de mensaje de confirmacion
        if($producto->save()){
        return redirect($this->path)->with('msj','Producto Registrado Correctamente');
        }else{
          return back()->with();
        }

        }catch(Exception $e){
            //return "Fatal error - ".$e->getMessage();
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
