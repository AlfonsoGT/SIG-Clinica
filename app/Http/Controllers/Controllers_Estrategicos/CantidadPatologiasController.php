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

class CantidadPatologiasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $path = '/salidas_estrategicas/cantidad_patologias';
    public function index()
    {
        //pacientes,reservacion,examen,lectura ->reservacion,regionAnatomica,tipoExamen                           ->reservacion,citas,tipoExamen
        $torax = DB::table('pacientes')->join('reservacion', 'pacientes.idPaciente', '=', 'reservacion.idPaciente')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->join('tipoExamen', 'regionAnatomica.idTipoExamen', '=', 'tipoExamen.idTipoExamen')->join('examen', 'reservacion.idReservacion', '=', 'examen.idReservacion')->join('lectura', 'examen.idExamen', '=', 'lectura.idExamen')->where('nombreRegionAnatomica','Torax')->where('patologia','si')->count();
        
        $ovarios = DB::table('pacientes')->join('reservacion', 'pacientes.idPaciente', '=', 'reservacion.idPaciente')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->join('tipoExamen', 'regionAnatomica.idTipoExamen', '=', 'tipoExamen.idTipoExamen')->join('examen', 'reservacion.idReservacion', '=', 'examen.idReservacion')->join('lectura', 'examen.idExamen', '=', 'lectura.idExamen')->where('nombreRegionAnatomica','Ovarios')->where('patologia','si')->count();

        $utero = DB::table('pacientes')->join('reservacion', 'pacientes.idPaciente', '=', 'reservacion.idPaciente')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->join('tipoExamen', 'regionAnatomica.idTipoExamen', '=', 'tipoExamen.idTipoExamen')->join('examen', 'reservacion.idReservacion', '=', 'examen.idReservacion')->join('lectura', 'examen.idExamen', '=', 'lectura.idExamen')->where('nombreRegionAnatomica','Útero')->where('patologia','si')->count();

        $cuello = DB::table('pacientes')->join('reservacion', 'pacientes.idPaciente', '=', 'reservacion.idPaciente')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->join('tipoExamen', 'regionAnatomica.idTipoExamen', '=', 'tipoExamen.idTipoExamen')->join('examen', 'reservacion.idReservacion', '=', 'examen.idReservacion')->join('lectura', 'examen.idExamen', '=', 'lectura.idExamen')->where('nombreRegionAnatomica','Cuello')->where('patologia','si')->count();

        $hombro = DB::table('pacientes')->join('reservacion', 'pacientes.idPaciente', '=', 'reservacion.idPaciente')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->join('tipoExamen', 'regionAnatomica.idTipoExamen', '=', 'tipoExamen.idTipoExamen')->join('examen', 'reservacion.idReservacion', '=', 'examen.idReservacion')->join('lectura', 'examen.idExamen', '=', 'lectura.idExamen')->where('nombreRegionAnatomica','Hombro')->where('patologia','si')->count();

        $brazo = DB::table('pacientes')->join('reservacion', 'pacientes.idPaciente', '=', 'reservacion.idPaciente')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->join('tipoExamen', 'regionAnatomica.idTipoExamen', '=', 'tipoExamen.idTipoExamen')->join('examen', 'reservacion.idReservacion', '=', 'examen.idReservacion')->join('lectura', 'examen.idExamen', '=', 'lectura.idExamen')->where('nombreRegionAnatomica','Brazo')->where('patologia','si')->count();

        $codo = DB::table('pacientes')->join('reservacion', 'pacientes.idPaciente', '=', 'reservacion.idPaciente')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->join('tipoExamen', 'regionAnatomica.idTipoExamen', '=', 'tipoExamen.idTipoExamen')->join('examen', 'reservacion.idReservacion', '=', 'examen.idReservacion')->join('lectura', 'examen.idExamen', '=', 'lectura.idExamen')->where('nombreRegionAnatomica','Codo')->where('patologia','si')->count();

        $antebrazo =DB::table('pacientes')->join('reservacion', 'pacientes.idPaciente', '=', 'reservacion.idPaciente')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->join('tipoExamen', 'regionAnatomica.idTipoExamen', '=', 'tipoExamen.idTipoExamen')->join('examen', 'reservacion.idReservacion', '=', 'examen.idReservacion')->join('lectura', 'examen.idExamen', '=', 'lectura.idExamen')->where('nombreRegionAnatomica','Antebrazo')->where('patologia','si')->count();

        $muñeca = DB::table('pacientes')->join('reservacion', 'pacientes.idPaciente', '=', 'reservacion.idPaciente')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->join('tipoExamen', 'regionAnatomica.idTipoExamen', '=', 'tipoExamen.idTipoExamen')->join('examen', 'reservacion.idReservacion', '=', 'examen.idReservacion')->join('lectura', 'examen.idExamen', '=', 'lectura.idExamen')->where('nombreRegionAnatomica','Muñeca')->where('patologia','si')->count();

        $mano = DB::table('pacientes')->join('reservacion', 'pacientes.idPaciente', '=', 'reservacion.idPaciente')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->join('tipoExamen', 'regionAnatomica.idTipoExamen', '=', 'tipoExamen.idTipoExamen')->join('examen', 'reservacion.idReservacion', '=', 'examen.idReservacion')->join('lectura', 'examen.idExamen', '=', 'lectura.idExamen')->where('nombreRegionAnatomica','Mano')->where('patologia','si')->count();

        $gluteo = DB::table('pacientes')->join('reservacion', 'pacientes.idPaciente', '=', 'reservacion.idPaciente')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->join('tipoExamen', 'regionAnatomica.idTipoExamen', '=', 'tipoExamen.idTipoExamen')->join('examen', 'reservacion.idReservacion', '=', 'examen.idReservacion')->join('lectura', 'examen.idExamen', '=', 'lectura.idExamen')->where('nombreRegionAnatomica','Gluteo')->where('patologia','si')->count();

        $muslo = DB::table('pacientes')->join('reservacion', 'pacientes.idPaciente', '=', 'reservacion.idPaciente')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->join('tipoExamen', 'regionAnatomica.idTipoExamen', '=', 'tipoExamen.idTipoExamen')->join('examen', 'reservacion.idReservacion', '=', 'examen.idReservacion')->join('lectura', 'examen.idExamen', '=', 'lectura.idExamen')->where('nombreRegionAnatomica','Muslo')->where('patologia','si')->count();

        $rodilla = DB::table('pacientes')->join('reservacion', 'pacientes.idPaciente', '=', 'reservacion.idPaciente')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->join('tipoExamen', 'regionAnatomica.idTipoExamen', '=', 'tipoExamen.idTipoExamen')->join('examen', 'reservacion.idReservacion', '=', 'examen.idReservacion')->join('lectura', 'examen.idExamen', '=', 'lectura.idExamen')->where('nombreRegionAnatomica','Rodilla')->where('patologia','si')->count();

        $pierna = DB::table('pacientes')->join('reservacion', 'pacientes.idPaciente', '=', 'reservacion.idPaciente')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->join('tipoExamen', 'regionAnatomica.idTipoExamen', '=', 'tipoExamen.idTipoExamen')->join('examen', 'reservacion.idReservacion', '=', 'examen.idReservacion')->join('lectura', 'examen.idExamen', '=', 'lectura.idExamen')->where('nombreRegionAnatomica','Pierna')->where('patologia','si')->count();

        $tobillo = DB::table('pacientes')->join('reservacion', 'pacientes.idPaciente', '=', 'reservacion.idPaciente')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->join('tipoExamen', 'regionAnatomica.idTipoExamen', '=', 'tipoExamen.idTipoExamen')->join('examen', 'reservacion.idReservacion', '=', 'examen.idReservacion')->join('lectura', 'examen.idExamen', '=', 'lectura.idExamen')->where('nombreRegionAnatomica','Tobillo')->where('patologia','si')->count();

        $pie = DB::table('pacientes')->join('reservacion', 'pacientes.idPaciente', '=', 'reservacion.idPaciente')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->join('tipoExamen', 'regionAnatomica.idTipoExamen', '=', 'tipoExamen.idTipoExamen')->join('examen', 'reservacion.idReservacion', '=', 'examen.idReservacion')->join('lectura', 'examen.idExamen', '=', 'lectura.idExamen')->where('nombreRegionAnatomica','Pie')->where('patologia','si')->count();

        $cabeza = DB::table('pacientes')->join('reservacion', 'pacientes.idPaciente', '=', 'reservacion.idPaciente')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->join('tipoExamen', 'regionAnatomica.idTipoExamen', '=', 'tipoExamen.idTipoExamen')->join('examen', 'reservacion.idReservacion', '=', 'examen.idReservacion')->join('lectura', 'examen.idExamen', '=', 'lectura.idExamen')->where('nombreRegionAnatomica','Cabeza')->where('patologia','si')->count();

        $abdomen = DB::table('pacientes')->join('reservacion', 'pacientes.idPaciente', '=', 'reservacion.idPaciente')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->join('tipoExamen', 'regionAnatomica.idTipoExamen', '=', 'tipoExamen.idTipoExamen')->join('examen', 'reservacion.idReservacion', '=', 'examen.idReservacion')->join('lectura', 'examen.idExamen', '=', 'lectura.idExamen')->where('nombreRegionAnatomica','Abdomen')->where('patologia','si')->count();


        return view($this->path.'/cantidad_patologias')->with("torax",$torax)->with('abdomen',$abdomen)->with('ovarios',$ovarios)->with('utero',$utero)->with('cuello',$cuello)->with('hombro',$hombro)->with('brazo',$brazo)->with('codo',$codo)->with('antebrazo',$antebrazo)->with('muñeca',$muñeca)->with('mano',$mano)->with('gluteo',$gluteo)->with('muslo',$muslo)->with('rodilla',$rodilla)->with('pierna',$pierna)->with('tobillo',$tobillo)->with('pie',$pie)->with('cabeza',$cabeza);;
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
