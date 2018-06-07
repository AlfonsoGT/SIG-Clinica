<?php

namespace App\Http\Controllers\Controllers_Estrategicos;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Redirect;

use App\Paciente;

use App\Sexo;
use App\procedencias;

use App\Http\Requests\PacienteRequest;
use App\Http\Controllers\Controller;

use Exception;

class CantidadTipoExamenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $path = '/salidas_estrategicas/cantidad_tipoExamen';
    public function index()
    {
        //pacientes,reservacion,regionAnatomica,tipoExamen
        $torax = DB::table('pacientes')->join('reservacion', 'pacientes.idPaciente', '=', 'reservacion.idPaciente')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->join('tipoExamen', 'regionAnatomica.idTipoExamen', '=', 'tipoExamen.idTipoExamen')->where('nombreTipoExamen','Radiografía de Tórax')->count();
        $miscelanea = DB::table('pacientes')->join('reservacion', 'pacientes.idPaciente', '=', 'reservacion.idPaciente')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->join('tipoExamen', 'regionAnatomica.idTipoExamen', '=', 'tipoExamen.idTipoExamen')->where('nombreTipoExamen','Radiografía de Misceláneas')->count();
        $abdominal = DB::table('pacientes')->join('reservacion', 'pacientes.idPaciente', '=', 'reservacion.idPaciente')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->join('tipoExamen', 'regionAnatomica.idTipoExamen', '=', 'tipoExamen.idTipoExamen')->where('nombreTipoExamen','Ultrasonografía Abdominal')->count();
        $ginecologica = DB::table('pacientes')->join('reservacion', 'pacientes.idPaciente', '=', 'reservacion.idPaciente')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->join('tipoExamen', 'regionAnatomica.idTipoExamen', '=', 'tipoExamen.idTipoExamen')->where('nombreTipoExamen','Ultrasonografía Ginecológica')->count();
        $ovarios = DB::table('pacientes')->join('reservacion', 'pacientes.idPaciente', '=', 'reservacion.idPaciente')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->join('tipoExamen', 'regionAnatomica.idTipoExamen', '=', 'tipoExamen.idTipoExamen')->where('nombreRegionAnatomica','Ovarios')->count();
        $utero = DB::table('pacientes')->join('reservacion', 'pacientes.idPaciente', '=', 'reservacion.idPaciente')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->join('tipoExamen', 'regionAnatomica.idTipoExamen', '=', 'tipoExamen.idTipoExamen')->where('nombreRegionAnatomica','Útero')->count();
        $cuello = DB::table('pacientes')->join('reservacion', 'pacientes.idPaciente', '=', 'reservacion.idPaciente')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->join('tipoExamen', 'regionAnatomica.idTipoExamen', '=', 'tipoExamen.idTipoExamen')->where('nombreRegionAnatomica','Cuello')->count();
        $hombro = DB::table('pacientes')->join('reservacion', 'pacientes.idPaciente', '=', 'reservacion.idPaciente')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->join('tipoExamen', 'regionAnatomica.idTipoExamen', '=', 'tipoExamen.idTipoExamen')->where('nombreRegionAnatomica','Hombro')->count();
        $brazo = DB::table('pacientes')->join('reservacion', 'pacientes.idPaciente', '=', 'reservacion.idPaciente')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->join('tipoExamen', 'regionAnatomica.idTipoExamen', '=', 'tipoExamen.idTipoExamen')->where('nombreRegionAnatomica','Brazo')->count();
        $codo = DB::table('pacientes')->join('reservacion', 'pacientes.idPaciente', '=', 'reservacion.idPaciente')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->join('tipoExamen', 'regionAnatomica.idTipoExamen', '=', 'tipoExamen.idTipoExamen')->where('nombreRegionAnatomica','Codo')->count();
        $antebrazo = DB::table('pacientes')->join('reservacion', 'pacientes.idPaciente', '=', 'reservacion.idPaciente')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->join('tipoExamen', 'regionAnatomica.idTipoExamen', '=', 'tipoExamen.idTipoExamen')->where('nombreRegionAnatomica','Antebrazo')->count();
        $muñeca = DB::table('pacientes')->join('reservacion', 'pacientes.idPaciente', '=', 'reservacion.idPaciente')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->join('tipoExamen', 'regionAnatomica.idTipoExamen', '=', 'tipoExamen.idTipoExamen')->where('nombreRegionAnatomica','Muñeca')->count();
        $mano = DB::table('pacientes')->join('reservacion', 'pacientes.idPaciente', '=', 'reservacion.idPaciente')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->join('tipoExamen', 'regionAnatomica.idTipoExamen', '=', 'tipoExamen.idTipoExamen')->where('nombreRegionAnatomica','Mano')->count();
        $gluteo = DB::table('pacientes')->join('reservacion', 'pacientes.idPaciente', '=', 'reservacion.idPaciente')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->join('tipoExamen', 'regionAnatomica.idTipoExamen', '=', 'tipoExamen.idTipoExamen')->where('nombreRegionAnatomica','Gluteo')->count();
        $muslo = DB::table('pacientes')->join('reservacion', 'pacientes.idPaciente', '=', 'reservacion.idPaciente')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->join('tipoExamen', 'regionAnatomica.idTipoExamen', '=', 'tipoExamen.idTipoExamen')->where('nombreRegionAnatomica','Muslo')->count();
        $rodilla = DB::table('pacientes')->join('reservacion', 'pacientes.idPaciente', '=', 'reservacion.idPaciente')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->join('tipoExamen', 'regionAnatomica.idTipoExamen', '=', 'tipoExamen.idTipoExamen')->where('nombreRegionAnatomica','Rodilla')->count();
        $pierna = DB::table('pacientes')->join('reservacion', 'pacientes.idPaciente', '=', 'reservacion.idPaciente')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->join('tipoExamen', 'regionAnatomica.idTipoExamen', '=', 'tipoExamen.idTipoExamen')->where('nombreRegionAnatomica','Pierna')->count();
        $tobillo = DB::table('pacientes')->join('reservacion', 'pacientes.idPaciente', '=', 'reservacion.idPaciente')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->join('tipoExamen', 'regionAnatomica.idTipoExamen', '=', 'tipoExamen.idTipoExamen')->where('nombreRegionAnatomica','Tobillo')->count();
        $pie = DB::table('pacientes')->join('reservacion', 'pacientes.idPaciente', '=', 'reservacion.idPaciente')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->join('tipoExamen', 'regionAnatomica.idTipoExamen', '=', 'tipoExamen.idTipoExamen')->where('nombreRegionAnatomica','Pie')->count();
        $cabeza = DB::table('pacientes')->join('reservacion', 'pacientes.idPaciente', '=', 'reservacion.idPaciente')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->join('tipoExamen', 'regionAnatomica.idTipoExamen', '=', 'tipoExamen.idTipoExamen')->where('nombreRegionAnatomica','Cabeza')->count(); 
        return view($this->path.'/cantidad_tipoExamen')->with("torax",$torax)->with('miscelanea',$miscelanea)->with('abdominal',$abdominal)
            ->with('ginecologica',$ginecologica)->with('ovarios',$ovarios)->with('ginecologica',$ginecologica)->with('utero',$utero)->with('cuello',$cuello)->with('hombro',$hombro)->with('brazo',$brazo)->with('codo',$codo)->with('antebrazo',$antebrazo)->with('muñeca',$muñeca)->with('mano',$mano)->with('gluteo',$gluteo)->with('muslo',$muslo)->with('rodilla',$rodilla)->with('pierna',$pierna)->with('tobillo',$tobillo)->with('pie',$pie)->with('cabeza',$cabeza);
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
