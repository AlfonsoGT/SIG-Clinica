<?php

namespace App\Http\Controllers\Controllers_Tacticos;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class PacientesDepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $path = '/salidas_tacticas/pacientes_departamento';
    public function index()
    {
        //
        $ahuachapan = DB::table('pacientes')->join('departamentos', 'pacientes.idDepartamento', '=', 'departamentos.idDepartamento')->where('nombreDepartamento','Ahuachapán')->count();

        $cabañas = DB::table('pacientes')->join('departamentos', 'pacientes.idDepartamento', '=', 'departamentos.idDepartamento')->where('nombreDepartamento','Cabañas')->count();

        $chalatenango = DB::table('pacientes')->join('departamentos', 'pacientes.idDepartamento', '=', 'departamentos.idDepartamento')->where('nombreDepartamento','Chalatenango')->count();
        
        $cuscatlan = DB::table('pacientes')->join('departamentos', 'pacientes.idDepartamento', '=', 'departamentos.idDepartamento')->where('nombreDepartamento','Cuscatlán')->count();
        
        $morazan = DB::table('pacientes')->join('departamentos', 'pacientes.idDepartamento', '=', 'departamentos.idDepartamento')->where('nombreDepartamento','Morazán')->count();
        
        $lalibertad = DB::table('pacientes')->join('departamentos', 'pacientes.idDepartamento', '=', 'departamentos.idDepartamento')->where('nombreDepartamento','La Libertad')->count();
        
        $lapaz = DB::table('pacientes')->join('departamentos', 'pacientes.idDepartamento', '=', 'departamentos.idDepartamento')->where('nombreDepartamento','La Paz')->count();
        
        $launion = DB::table('pacientes')->join('departamentos', 'pacientes.idDepartamento', '=', 'departamentos.idDepartamento')->where('nombreDepartamento','La Unión')->count();
        
        $sanmiguel = DB::table('pacientes')->join('departamentos', 'pacientes.idDepartamento', '=', 'departamentos.idDepartamento')->where('nombreDepartamento','San Miguel')->count();
        
        $sansalvador = DB::table('pacientes')->join('departamentos', 'pacientes.idDepartamento', '=', 'departamentos.idDepartamento')->where('nombreDepartamento','San Salvador')->count();
        
        $sanvicente = DB::table('pacientes')->join('departamentos', 'pacientes.idDepartamento', '=', 'departamentos.idDepartamento')->where('nombreDepartamento','San Vicente')->count();
        
        $santaana = DB::table('pacientes')->join('departamentos', 'pacientes.idDepartamento', '=', 'departamentos.idDepartamento')->where('nombreDepartamento','Santa Ana')->count();
        
        $sonsonate = DB::table('pacientes')->join('departamentos', 'pacientes.idDepartamento', '=', 'departamentos.idDepartamento')->where('nombreDepartamento','Sonsonate')->count();
        
        $usulutan = DB::table('pacientes')->join('departamentos', 'pacientes.idDepartamento', '=', 'departamentos.idDepartamento')->where('nombreDepartamento','Usulután')->count();

        return view($this->path.'/pacientes_departamento')->with("ahuachapan",$ahuachapan) ->with("cabañas",$cabañas)->with("chalatenango",$chalatenango)->with("cuscatlan",$cuscatlan)->with("morazan",$morazan)->with("lalibertad",$lalibertad)->with("lapaz",$lapaz)->with("launion",$launion)->with("sanmiguel",$sanmiguel)->with("sansalvador",$sansalvador)->with("sanvicente",$sanvicente)->with("santaana",$santaana)->with("sonsonate",$sonsonate)->with("usulutan",$usulutan);
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
