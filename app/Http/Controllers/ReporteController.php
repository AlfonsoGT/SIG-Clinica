<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $path = '/admin_reportes';
    public function index()
    {
        //
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



    //PDFs Estrategicos

    public function cantidadPacientesPDF(){


      $pacientes = DB::table('pacientes')->count();

      $pdf = PDF::loadView($this->path.'/cantidadPacientesPDF', compact('pacientes'));
       
      return $pdf->stream('reporte.pdf');

    }

    public function cantidadInsumosPDF(){

      $placas6 = DB::table('users')->join('entrada', 'users.id', '=', 'entrada.id')->join('material', 'entrada.idEntrada', '=', 'material.idEntrada')->join('tipoUnidad', 'material.idTipoUnidad', '=', 'tipoUnidad.idTipoUnidad')->join('tipoMaterial', 'tipoUnidad.idTipoMaterial', '=', 'tipoMaterial.idTipoMaterial')->where('nombreTipoUnidad','6 1/2')->select(DB::raw('SUM(material.cantidadMaterial*material.cantidadUnidadMaterial)as total'))->pluck('total');

       $placas6= json_decode($placas6, true);
        if($placas6['0'] == NULL)
             $placas6 = 0;
        else
            $placas6 = $placas6['0'];

        $placas8 = DB::table('users')->join('entrada', 'users.id', '=', 'entrada.id')->join('material', 'entrada.idEntrada', '=', 'material.idEntrada')->join('tipoUnidad', 'material.idTipoUnidad', '=', 'tipoUnidad.idTipoUnidad')->join('tipoMaterial', 'tipoUnidad.idTipoMaterial', '=', 'tipoMaterial.idTipoMaterial')->where('nombreTipoUnidad','8 x 10')->select(DB::raw('SUM(material.cantidadMaterial*material.cantidadUnidadMaterial)as total'))->pluck('total');
       
        $placas8= json_decode($placas8, true);
        if($placas8['0'] == NULL)
             $placas8 = 0;
        else
            $placas8 = $placas8['0'];

        $placas10 = DB::table('users')->join('entrada', 'users.id', '=', 'entrada.id')->join('material', 'entrada.idEntrada', '=', 'material.idEntrada')->join('tipoUnidad', 'material.idTipoUnidad', '=', 'tipoUnidad.idTipoUnidad')->join('tipoMaterial', 'tipoUnidad.idTipoMaterial', '=', 'tipoMaterial.idTipoMaterial')->where('nombreTipoUnidad','10 x 12')->select(DB::raw('SUM(material.cantidadMaterial*material.cantidadUnidadMaterial)as total'))->pluck('total');

        $placas10= json_decode($placas10, true);
        if($placas10['0'] == NULL)
             $placas10 = 0;
        else
            $placas10 = $placas10['0'];

        $placas11 = DB::table('users')->join('entrada', 'users.id', '=', 'entrada.id')->join('material', 'entrada.idEntrada', '=', 'material.idEntrada')->join('tipoUnidad', 'material.idTipoUnidad', '=', 'tipoUnidad.idTipoUnidad')->join('tipoMaterial', 'tipoUnidad.idTipoMaterial', '=', 'tipoMaterial.idTipoMaterial')->where('nombreTipoUnidad','11 x 14')->select(DB::raw('SUM(material.cantidadMaterial*material.cantidadUnidadMaterial)as total'))->pluck('total');

        $placas11= json_decode($placas11, true);
        if($placas11['0'] == NULL)
             $placas11 = 0;
        else
            $placas11 = $placas11['0'];

        $placas14 = DB::table('users')->join('entrada', 'users.id', '=', 'entrada.id')->join('material', 'entrada.idEntrada', '=', 'material.idEntrada')->join('tipoUnidad', 'material.idTipoUnidad', '=', 'tipoUnidad.idTipoUnidad')->join('tipoMaterial', 'tipoUnidad.idTipoMaterial', '=', 'tipoMaterial.idTipoMaterial')->where('nombreTipoUnidad','14 x 14')->select(DB::raw('SUM(material.cantidadMaterial*material.cantidadUnidadMaterial)as total'))->pluck('total');

         $placas14= json_decode($placas14, true);
        if($placas14['0'] == NULL)
             $placas14 = 0;
        else
            $placas14 = $placas14['0'];

        $placas17 = DB::table('users')->join('entrada', 'users.id', '=', 'entrada.id')->join('material', 'entrada.idEntrada', '=', 'material.idEntrada')->join('tipoUnidad', 'material.idTipoUnidad', '=', 'tipoUnidad.idTipoUnidad')->join('tipoMaterial', 'tipoUnidad.idTipoMaterial', '=', 'tipoMaterial.idTipoMaterial')->where('nombreTipoUnidad','14 x 17')->select(DB::raw('SUM(material.cantidadMaterial*material.cantidadUnidadMaterial)as total'))->pluck('total');

        $placas17= json_decode($placas17, true);
        if($placas17['0'] == NULL)
             $placas17 = 0;
        else
            $placas17 = $placas17['0'];

        $setRevelador = DB::table('users')->join('entrada', 'users.id', '=', 'entrada.id')->join('material', 'entrada.idEntrada', '=', 'material.idEntrada')->join('tipoUnidad', 'material.idTipoUnidad', '=', 'tipoUnidad.idTipoUnidad')->join('tipoMaterial', 'tipoUnidad.idTipoMaterial', '=', 'tipoMaterial.idTipoMaterial')->where('nombreTipoUnidad','Set')->where('nombreTipoMaterial','Revelador')->select(DB::raw('SUM(material.cantidadMaterial*material.cantidadUnidadMaterial)as total'))->pluck('total');

         $setRevelador= json_decode($setRevelador, true);
        if($setRevelador['0'] == NULL)
             $setRevelador = 0;
        else
            $setRevelador = $setRevelador['0'];


        $setFijador = DB::table('users')->join('entrada', 'users.id', '=', 'entrada.id')->join('material', 'entrada.idEntrada', '=', 'material.idEntrada')->join('tipoUnidad', 'material.idTipoUnidad', '=', 'tipoUnidad.idTipoUnidad')->join('tipoMaterial', 'tipoUnidad.idTipoMaterial', '=', 'tipoMaterial.idTipoMaterial')->where('nombreTipoUnidad','Set')->where('nombreTipoMaterial','Fijador')->select(DB::raw('SUM(material.cantidadMaterial*material.cantidadUnidadMaterial)as total'))->pluck('total');

         $setFijador= json_decode($setFijador, true);
        if($setFijador['0'] == NULL)
             $setFijador = 0;
        else
            $setFijador = $setFijador['0'];

      
      $pdf = PDF::loadView($this->path.'/cantidadInsumosPDF', compact('placas6','placas8','placas10','placas11','placas14','placas17','setRevelador','setFijador'));
      return $pdf->stream('reporte.pdf');
     
      

    }

    public function cantidadPatologiasPDF(){

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

        $pdf = PDF::loadView($this->path.'/cantidadPatologiasPDF', compact('torax','ovarios','utero','cuello','hombro','brazo','codo','antebrazo','muñeca','mano','gluteo','muslo','rodilla','pierna','tobillo','pie','cabeza','abdomen'));
      return $pdf->stream('reporte.pdf');

     
    }

    public function porcentajePacientesPDF(){


     $total =   DB::table('pacientes')->count();
        $mujeres = DB::table('pacientes')->join('sexo', 'pacientes.idSexo', '=', 'sexo.idSexo')->where('nombreSexo','femenino')->count();
        $hombres = DB::table('pacientes')->join('sexo', 'pacientes.idSexo', '=', 'sexo.idSexo')->where('nombreSexo','masculino')->count();
        $porMu = ($mujeres/$total)*100;
        $porMu = round($porMu,2);
        $porHo = ($hombres/$total)*100;
        $porHo = round($porHo,2);
         

      $pdf = PDF::loadView($this->path.'/porcentajePacientesPDF', compact('hombres','mujeres','porHo','porMu'));
       
      return $pdf->stream('reporte.pdf');

    }

    public function cantidadTipoExamenPDF(){

        $torax = DB::table('pacientes')->join('reservacion', 'pacientes.idPaciente', '=', 'reservacion.idPaciente')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->join('tipoExamen', 'regionAnatomica.idTipoExamen', '=', 'tipoExamen.idTipoExamen')->where('nombreTipoExamen','Radiografía de Tórax')->count();
        $miscelanea = DB::table('pacientes')->join('reservacion', 'pacientes.idPaciente', '=', 'reservacion.idPaciente')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->join('tipoExamen', 'regionAnatomica.idTipoExamen', '=', 'tipoExamen.idTipoExamen')->where('nombreTipoExamen','Radiografía de Misceláneas')->count();
        $abdomen = DB::table('pacientes')->join('reservacion', 'pacientes.idPaciente', '=', 'reservacion.idPaciente')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->join('tipoExamen', 'regionAnatomica.idTipoExamen', '=', 'tipoExamen.idTipoExamen')->where('nombreTipoExamen','Ultrasonografía Abdominal')->count();
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
        
        $pdf = PDF::loadView($this->path.'/cantidadTipoExamenPDF', compact('torax','ovarios','utero','cuello','hombro','brazo','codo','antebrazo','muñeca','mano','gluteo','muslo','rodilla','pierna','tobillo','pie','cabeza','abdomen'));
      return $pdf->stream('reporte.pdf');
        
    }

    



    //PDFs Tacticos
    
    
    public function costosInsumosPDF(){


      $placas6 = DB::table('users')->join('entrada', 'users.id', '=', 'entrada.id')->join('material', 'entrada.idEntrada', '=', 'material.idEntrada')->join('tipoUnidad', 'material.idTipoUnidad', '=', 'tipoUnidad.idTipoUnidad')->join('tipoMaterial', 'tipoUnidad.idTipoMaterial', '=', 'tipoMaterial.idTipoMaterial')->where('nombreTipoUnidad','6 1/2')->select(DB::raw('SUM(material.cantidadMaterial*material.cantidadUnidadMaterial*0.05)as total'))->pluck('total');

         $placas6= json_decode($placas6, true);
        if($placas6['0'] == NULL)
             $placas6 = 0;
        else
            $placas6 = $placas6['0'];


        $placas8 = DB::table('users')->join('entrada', 'users.id', '=', 'entrada.id')->join('material', 'entrada.idEntrada', '=', 'material.idEntrada')->join('tipoUnidad', 'material.idTipoUnidad', '=', 'tipoUnidad.idTipoUnidad')->join('tipoMaterial', 'tipoUnidad.idTipoMaterial', '=', 'tipoMaterial.idTipoMaterial')->where('nombreTipoUnidad','8 x 10')->select(DB::raw('SUM(material.cantidadMaterial*material.cantidadUnidadMaterial*0.10)as total'))->pluck('total');

         $placas8= json_decode($placas8, true);
        if($placas8['0'] == NULL)
             $placas8 = 0;
        else
            $placas8 = $placas8['0'];


        $placas10 = DB::table('users')->join('entrada', 'users.id', '=', 'entrada.id')->join('material', 'entrada.idEntrada', '=', 'material.idEntrada')->join('tipoUnidad', 'material.idTipoUnidad', '=', 'tipoUnidad.idTipoUnidad')->join('tipoMaterial', 'tipoUnidad.idTipoMaterial', '=', 'tipoMaterial.idTipoMaterial')->where('nombreTipoUnidad','10 x 12')->select(DB::raw('SUM(material.cantidadMaterial*material.cantidadUnidadMaterial*0.15)as total'))->pluck('total');

         $placas10= json_decode($placas10, true);
        if($placas10['0'] == NULL)
             $placas10 = 0;
        else
            $placas10 = $placas10['0'];


        $placas11 = DB::table('users')->join('entrada', 'users.id', '=', 'entrada.id')->join('material', 'entrada.idEntrada', '=', 'material.idEntrada')->join('tipoUnidad', 'material.idTipoUnidad', '=', 'tipoUnidad.idTipoUnidad')->join('tipoMaterial', 'tipoUnidad.idTipoMaterial', '=', 'tipoMaterial.idTipoMaterial')->where('nombreTipoUnidad','11 x 14')->select(DB::raw('SUM(material.cantidadMaterial*material.cantidadUnidadMaterial*0.20)as total'))->pluck('total');

         $placas11= json_decode($placas11, true);
        if($placas11['0'] == NULL)
             $placas11 = 0;
        else
            $placas11 = $placas11['0'];


        $placas14 = DB::table('users')->join('entrada', 'users.id', '=', 'entrada.id')->join('material', 'entrada.idEntrada', '=', 'material.idEntrada')->join('tipoUnidad', 'material.idTipoUnidad', '=', 'tipoUnidad.idTipoUnidad')->join('tipoMaterial', 'tipoUnidad.idTipoMaterial', '=', 'tipoMaterial.idTipoMaterial')->where('nombreTipoUnidad','14 x 14')->select(DB::raw('SUM(material.cantidadMaterial*material.cantidadUnidadMaterial*0.25)as total'))->pluck('total');

         $placas14= json_decode($placas14, true);
        if($placas14['0'] == NULL)
             $placas14 = 0;
        else
            $placas14 = $placas14['0'];


        $placas17 = DB::table('users')->join('entrada', 'users.id', '=', 'entrada.id')->join('material', 'entrada.idEntrada', '=', 'material.idEntrada')->join('tipoUnidad', 'material.idTipoUnidad', '=', 'tipoUnidad.idTipoUnidad')->join('tipoMaterial', 'tipoUnidad.idTipoMaterial', '=', 'tipoMaterial.idTipoMaterial')->where('nombreTipoUnidad','14 x 17')->select(DB::raw('SUM(material.cantidadMaterial*material.cantidadUnidadMaterial*0.30)as total'))->pluck('total');

         $placas17= json_decode($placas17, true);
        if($placas17['0'] == NULL)
             $placas17 = 0;
        else
            $placas17 = $placas17['0'];


        $setRevelador = DB::table('users')->join('entrada', 'users.id', '=', 'entrada.id')->join('material', 'entrada.idEntrada', '=', 'material.idEntrada')->join('tipoUnidad', 'material.idTipoUnidad', '=', 'tipoUnidad.idTipoUnidad')->join('tipoMaterial', 'tipoUnidad.idTipoMaterial', '=', 'tipoMaterial.idTipoMaterial')->where('nombreTipoUnidad','Set')->where('nombreTipoMaterial','Revelador')->select(DB::raw('SUM(material.cantidadMaterial*material.cantidadUnidadMaterial*0.35)as total'))->pluck('total');

         $setRevelador= json_decode($setRevelador, true);
        if($setRevelador['0'] == NULL)
             $setRevelador = 0;
        else
            $setRevelador = $setRevelador['0'];



        $setFijador = DB::table('users')->join('entrada', 'users.id', '=', 'entrada.id')->join('material', 'entrada.idEntrada', '=', 'material.idEntrada')->join('tipoUnidad', 'material.idTipoUnidad', '=', 'tipoUnidad.idTipoUnidad')->join('tipoMaterial', 'tipoUnidad.idTipoMaterial', '=', 'tipoMaterial.idTipoMaterial')->where('nombreTipoUnidad','Set')->where('nombreTipoMaterial','Fijador')->select(DB::raw('SUM(material.cantidadMaterial*material.cantidadUnidadMaterial*0.35)as total'))->pluck('total');

         $setFijador= json_decode($setFijador, true);
        if($setFijador['0'] == NULL)
             $setFijador = 0;
        else
            $setFijador = $setFijador['0'];
         

      $pdf = PDF::loadView($this->path.'/costosInsumosPDF', compact('placas6','placas8','placas10','placas11','placas14','placas17','setRevelador','setFijador'));
       
      return $pdf->stream('reporte.pdf');

    }
    
    
    
    public function gananciasExamenesPDF(){


     $torax = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Torax')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');
        
         $torax= json_decode($torax, true);
        if($torax['0'] == NULL)
             $torax = 0;
        else
            $torax = $torax['0'];

        $ovarios = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Ovarios')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');

          $ovarios= json_decode($ovarios, true);
        if($ovarios['0'] == NULL)
             $ovarios = 0;
        else
            $ovarios = $ovarios['0'];

        $utero = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Utero')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');

          $utero= json_decode($utero, true);
        if($utero['0'] == NULL)
             $utero = 0;
        else
            $utero = $utero['0'];

        $cuello = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Cuello')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');

          $cuello= json_decode($cuello, true);
        if($cuello['0'] == NULL)
             $cuello = 0;
        else
            $cuello = $cuello['0'];

        $hombro = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Hombro')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');

          $hombro= json_decode($hombro, true);
        if($hombro['0'] == NULL)
             $hombro = 0;
        else
            $hombro = $hombro['0'];

        $brazo = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Brazo')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');

          $brazo= json_decode($brazo, true);
        if($brazo['0'] == NULL)
             $brazo = 0;
        else
            $brazo = $brazo['0'];

        $codo = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Codo')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');

          $codo= json_decode($codo, true);
        if($codo['0'] == NULL)
             $codo = 0;
        else
            $codo = $codo['0'];

        $antebrazo = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Antebrazo')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');

        $antebrazo= json_decode($antebrazo, true);
        if($antebrazo['0'] == NULL)
             $antebrazo = 0;
        else
            $antebrazo = $antebrazo['0'];

        $muñeca = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Muñeca')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');

          $muñeca= json_decode($muñeca, true);
        if($muñeca['0'] == NULL)
             $muñeca = 0;
        else
            $muñeca = $muñeca['0'];

        $mano = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Mano')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');

          $mano= json_decode($mano, true);
        if($mano['0'] == NULL)
             $mano = 0;
        else
            $mano = $mano['0'];

        $gluteo = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Gluteo')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');

          $gluteo= json_decode($gluteo, true);
        if($gluteo['0'] == NULL)
             $gluteo = 0;
        else
            $gluteo = $gluteo['0'];

        $muslo = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Muslo')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');

          $muslo= json_decode($muslo, true);
        if($muslo['0'] == NULL)
             $muslo = 0;
        else
            $muslo = $muslo['0'];

        $rodilla = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Rodilla')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');

          $rodilla= json_decode($rodilla, true);
        if($rodilla['0'] == NULL)
             $rodilla = 0;
        else
            $rodilla = $rodilla['0'];

        $pierna = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Pierna')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');

          $pierna= json_decode($pierna, true);
        if($pierna['0'] == NULL)
             $pierna = 0;
        else
            $pierna = $pierna['0'];

        $tobillo = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Tobillo')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');

          $tobillo= json_decode($tobillo, true);
        if($tobillo['0'] == NULL)
             $tobillo = 0;
        else
            $tobillo = $tobillo['0'];

        $pie = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Pie')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');

          $pie= json_decode($pie, true);
        if($pie['0'] == NULL)
             $pie = 0;
        else
            $pie = $pie['0'];

        $cabeza = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Cabeza')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');

          $cabeza= json_decode($cabeza, true);
        if($cabeza['0'] == NULL)
             $cabeza = 0;
        else
            $cabeza = $cabeza['0'];

        $abdomen = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Abdomen')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');

          $abdomen= json_decode($abdomen, true);
        if($abdomen['0'] == NULL)
             $abdomen = 0;
        else
            $abdomen = $abdomen['0'];

        $pdf = PDF::loadView($this->path.'/gananciasExamenesPDF', compact('torax','ovarios','utero','cuello','hombro','brazo','codo','antebrazo','muñeca','mano','gluteo','muslo','rodilla','pierna','tobillo','pie','cabeza','abdomen'));
      return $pdf->stream('reporte.pdf');


    }

    public function presupuestoPDF(){


       $torax = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Torax')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');
        
         $torax= json_decode($torax, true);
        if($torax['0'] == NULL)
             $torax = 0;
        else
            $torax = $torax['0'];

        $ovarios = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Ovarios')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');

          $ovarios= json_decode($ovarios, true);
        if($ovarios['0'] == NULL)
             $ovarios = 0;
        else
            $ovarios = $ovarios['0'];

        $utero = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Utero')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');

          $utero= json_decode($utero, true);
        if($utero['0'] == NULL)
             $utero = 0;
        else
            $utero = $utero['0'];

        $cuello = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Cuello')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');

          $cuello= json_decode($cuello, true);
        if($cuello['0'] == NULL)
             $cuello = 0;
        else
            $cuello = $cuello['0'];

        $hombro = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Hombro')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');

          $hombro= json_decode($hombro, true);
        if($hombro['0'] == NULL)
             $hombro = 0;
        else
            $hombro = $hombro['0'];

        $brazo = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Brazo')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');

          $brazo= json_decode($brazo, true);
        if($brazo['0'] == NULL)
             $brazo = 0;
        else
            $brazo = $brazo['0'];

        $codo = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Codo')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');

          $codo= json_decode($codo, true);
        if($codo['0'] == NULL)
             $codo = 0;
        else
            $codo = $codo['0'];

        $antebrazo = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Antebrazo')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');

        $antebrazo= json_decode($antebrazo, true);
        if($antebrazo['0'] == NULL)
             $antebrazo = 0;
        else
            $antebrazo = $antebrazo['0'];

        $muñeca = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Muñeca')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');

          $muñeca= json_decode($muñeca, true);
        if($muñeca['0'] == NULL)
             $muñeca = 0;
        else
            $muñeca = $muñeca['0'];

        $mano = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Mano')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');

          $mano= json_decode($mano, true);
        if($mano['0'] == NULL)
             $mano = 0;
        else
            $mano = $mano['0'];

        $gluteo = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Gluteo')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');

          $gluteo= json_decode($gluteo, true);
        if($gluteo['0'] == NULL)
             $gluteo = 0;
        else
            $gluteo = $gluteo['0'];

        $muslo = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Muslo')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');

          $muslo= json_decode($muslo, true);
        if($muslo['0'] == NULL)
             $muslo = 0;
        else
            $muslo = $muslo['0'];

        $rodilla = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Rodilla')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');

          $rodilla= json_decode($rodilla, true);
        if($rodilla['0'] == NULL)
             $rodilla = 0;
        else
            $rodilla = $rodilla['0'];

        $pierna = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Pierna')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');

          $pierna= json_decode($pierna, true);
        if($pierna['0'] == NULL)
             $pierna = 0;
        else
            $pierna = $pierna['0'];

        $tobillo = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Tobillo')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');

          $tobillo= json_decode($tobillo, true);
        if($tobillo['0'] == NULL)
             $tobillo = 0;
        else
            $tobillo = $tobillo['0'];

        $pie = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Pie')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');

          $pie= json_decode($pie, true);
        if($pie['0'] == NULL)
             $pie = 0;
        else
            $pie = $pie['0'];

        $cabeza = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Cabeza')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');

          $cabeza= json_decode($cabeza, true);
        if($cabeza['0'] == NULL)
             $cabeza = 0;
        else
            $cabeza = $cabeza['0'];

        $abdomen = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Abdomen')->select(DB::raw('SUM(reservacion.precio)as total'))->pluck('total');

          $abdomen= json_decode($abdomen, true);
        if($abdomen['0'] == NULL)
             $abdomen = 0;
        else
            $abdomen = $abdomen['0'];

        $placas6 = DB::table('users')->join('entrada', 'users.id', '=', 'entrada.id')->join('material', 'entrada.idEntrada', '=', 'material.idEntrada')->join('tipoUnidad', 'material.idTipoUnidad', '=', 'tipoUnidad.idTipoUnidad')->join('tipoMaterial', 'tipoUnidad.idTipoMaterial', '=', 'tipoMaterial.idTipoMaterial')->where('nombreTipoUnidad','6 1/2')->select(DB::raw('SUM(material.cantidadMaterial*material.cantidadUnidadMaterial*0.05)as total'))->pluck('total');

         $placas6= json_decode($placas6, true);
        if($placas6['0'] == NULL)
             $placas6 = 0;
        else
            $placas6 = $placas6['0'];


        $placas8 = DB::table('users')->join('entrada', 'users.id', '=', 'entrada.id')->join('material', 'entrada.idEntrada', '=', 'material.idEntrada')->join('tipoUnidad', 'material.idTipoUnidad', '=', 'tipoUnidad.idTipoUnidad')->join('tipoMaterial', 'tipoUnidad.idTipoMaterial', '=', 'tipoMaterial.idTipoMaterial')->where('nombreTipoUnidad','8 x 10')->select(DB::raw('SUM(material.cantidadMaterial*material.cantidadUnidadMaterial*0.10)as total'))->pluck('total');

         $placas8= json_decode($placas8, true);
        if($placas8['0'] == NULL)
             $placas8 = 0;
        else
            $placas8 = $placas8['0'];


        $placas10 = DB::table('users')->join('entrada', 'users.id', '=', 'entrada.id')->join('material', 'entrada.idEntrada', '=', 'material.idEntrada')->join('tipoUnidad', 'material.idTipoUnidad', '=', 'tipoUnidad.idTipoUnidad')->join('tipoMaterial', 'tipoUnidad.idTipoMaterial', '=', 'tipoMaterial.idTipoMaterial')->where('nombreTipoUnidad','10 x 12')->select(DB::raw('SUM(material.cantidadMaterial*material.cantidadUnidadMaterial*0.15)as total'))->pluck('total');

         $placas10= json_decode($placas10, true);
        if($placas10['0'] == NULL)
             $placas10 = 0;
        else
            $placas10 = $placas10['0'];


        $placas11 = DB::table('users')->join('entrada', 'users.id', '=', 'entrada.id')->join('material', 'entrada.idEntrada', '=', 'material.idEntrada')->join('tipoUnidad', 'material.idTipoUnidad', '=', 'tipoUnidad.idTipoUnidad')->join('tipoMaterial', 'tipoUnidad.idTipoMaterial', '=', 'tipoMaterial.idTipoMaterial')->where('nombreTipoUnidad','11 x 14')->select(DB::raw('SUM(material.cantidadMaterial*material.cantidadUnidadMaterial*0.20)as total'))->pluck('total');

         $placas11= json_decode($placas11, true);
        if($placas11['0'] == NULL)
             $placas11 = 0;
        else
            $placas11 = $placas11['0'];


        $placas14 = DB::table('users')->join('entrada', 'users.id', '=', 'entrada.id')->join('material', 'entrada.idEntrada', '=', 'material.idEntrada')->join('tipoUnidad', 'material.idTipoUnidad', '=', 'tipoUnidad.idTipoUnidad')->join('tipoMaterial', 'tipoUnidad.idTipoMaterial', '=', 'tipoMaterial.idTipoMaterial')->where('nombreTipoUnidad','14 x 14')->select(DB::raw('SUM(material.cantidadMaterial*material.cantidadUnidadMaterial*0.25)as total'))->pluck('total');

         $placas14= json_decode($placas14, true);
        if($placas14['0'] == NULL)
             $placas14 = 0;
        else
            $placas14 = $placas14['0'];


        $placas17 = DB::table('users')->join('entrada', 'users.id', '=', 'entrada.id')->join('material', 'entrada.idEntrada', '=', 'material.idEntrada')->join('tipoUnidad', 'material.idTipoUnidad', '=', 'tipoUnidad.idTipoUnidad')->join('tipoMaterial', 'tipoUnidad.idTipoMaterial', '=', 'tipoMaterial.idTipoMaterial')->where('nombreTipoUnidad','14 x 17')->select(DB::raw('SUM(material.cantidadMaterial*material.cantidadUnidadMaterial*0.30)as total'))->pluck('total');

         $placas17= json_decode($placas17, true);
        if($placas17['0'] == NULL)
             $placas17 = 0;
        else
            $placas17 = $placas17['0'];


        $setRevelador = DB::table('users')->join('entrada', 'users.id', '=', 'entrada.id')->join('material', 'entrada.idEntrada', '=', 'material.idEntrada')->join('tipoUnidad', 'material.idTipoUnidad', '=', 'tipoUnidad.idTipoUnidad')->join('tipoMaterial', 'tipoUnidad.idTipoMaterial', '=', 'tipoMaterial.idTipoMaterial')->where('nombreTipoUnidad','Set')->where('nombreTipoMaterial','Revelador')->select(DB::raw('SUM(material.cantidadMaterial*material.cantidadUnidadMaterial*0.35)as total'))->pluck('total');

         $setRevelador= json_decode($setRevelador, true);
        if($setRevelador['0'] == NULL)
             $setRevelador = 0;
        else
            $setRevelador = $setRevelador['0'];



        $setFijador = DB::table('users')->join('entrada', 'users.id', '=', 'entrada.id')->join('material', 'entrada.idEntrada', '=', 'material.idEntrada')->join('tipoUnidad', 'material.idTipoUnidad', '=', 'tipoUnidad.idTipoUnidad')->join('tipoMaterial', 'tipoUnidad.idTipoMaterial', '=', 'tipoMaterial.idTipoMaterial')->where('nombreTipoUnidad','Set')->where('nombreTipoMaterial','Fijador')->select(DB::raw('SUM(material.cantidadMaterial*material.cantidadUnidadMaterial*0.35)as total'))->pluck('total');

         $setFijador= json_decode($setFijador, true);
        if($setFijador['0'] == NULL)
             $setFijador = 0;
        else
            $setFijador = $setFijador['0'];


        $ganancias = $torax + $ovarios + $utero + $cuello + $hombro + $brazo + $codo + $antebrazo + $muñeca + $mano + $gluteo + $muslo + $rodilla + $pierna + $tobillo + $pie + $cabeza + $abdomen;

        $costos = $placas6 + $placas8 + $placas10 + $placas11 + $placas14 + $placas17 + $setFijador + $setRevelador;

        $presupuesto = $ganancias - $costos; 
    
         

      $pdf = PDF::loadView($this->path.'/presupuestoPDF', compact('ganancias','costos','presupuesto'));
       
      return $pdf->stream('reporte.pdf');

    }

     public function reservacionCitasPDF(){


    $torax = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Torax')->count();
        
        $ovarios = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Ovarios')->count();

        $utero = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Utero')->count();

        $cuello = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Cuello')->count();

        $hombro = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Hombro')->count();

        $brazo = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Brazo')->count();

        $codo = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Codo')->count();

        $antebrazo = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Antebrazo')->count();

        $muñeca = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Muñeca')->count();

        $mano = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Mano')->count();

        $gluteo = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Gluteo')->count();

        $muslo = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Muslo')->count();

        $rodilla = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Rodilla')->count();

        $pierna = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Pierna')->count();

        $tobillo = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Tobillo')->count();

        $pie = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Pie')->count();

        $cabeza = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Cabeza')->count();

        $abdomen = DB::table('reservacion')->join('regionAnatomica', 'reservacion.idRegionAnatomica', '=', 'regionAnatomica.idRegionAnatomica')->where('nombreRegionAnatomica','Abdomen')->count();

        

      $pdf = PDF::loadView($this->path.'/reservacionCitasPDF', compact('torax','ovarios','utero','cuello','hombro','brazo','codo','antebrazo','muñeca','mano','gluteo','muslo','rodilla','pierna','tobillo','pie','cabeza','abdomen'));
       
      return $pdf->stream('reporte.pdf');

    }

     public function pacientesDepartamentoPDF(){


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

        
        
      $pdf = PDF::loadView($this->path.'/pacientesDepartamentoPDF', compact('ahuachapan','cabañas','chalatenango','cuscatlan','morazan','lalibertad','lapaz','launion','sanmiguel','sansalvador','sanvicente','santaana','sonsonate','usulutan'));
       
      return $pdf->stream('reporte.pdf');

    }

    public function inventarioMaterialesPDF(){


      $placas6 = DB::table('users')->join('entrada', 'users.id', '=', 'entrada.id')->join('material', 'entrada.idEntrada', '=', 'material.idEntrada')->join('tipoUnidad', 'material.idTipoUnidad', '=', 'tipoUnidad.idTipoUnidad')->join('tipoMaterial', 'tipoUnidad.idTipoMaterial', '=', 'tipoMaterial.idTipoMaterial')->where('nombreTipoUnidad','6 1/2')->select(DB::raw('SUM(material.cantidadMaterial*material.cantidadUnidadMaterial)as total'))->pluck('total');

       $placas6= json_decode($placas6, true);
        if($placas6['0'] == NULL)
             $placas6 = 0;
        else
            $placas6 = $placas6['0'];

        $placas8 = DB::table('users')->join('entrada', 'users.id', '=', 'entrada.id')->join('material', 'entrada.idEntrada', '=', 'material.idEntrada')->join('tipoUnidad', 'material.idTipoUnidad', '=', 'tipoUnidad.idTipoUnidad')->join('tipoMaterial', 'tipoUnidad.idTipoMaterial', '=', 'tipoMaterial.idTipoMaterial')->where('nombreTipoUnidad','8 x 10')->select(DB::raw('SUM(material.cantidadMaterial*material.cantidadUnidadMaterial)as total'))->pluck('total');
       
        $placas8= json_decode($placas8, true);
        if($placas8['0'] == NULL)
             $placas8 = 0;
        else
            $placas8 = $placas8['0'];

        $placas10 = DB::table('users')->join('entrada', 'users.id', '=', 'entrada.id')->join('material', 'entrada.idEntrada', '=', 'material.idEntrada')->join('tipoUnidad', 'material.idTipoUnidad', '=', 'tipoUnidad.idTipoUnidad')->join('tipoMaterial', 'tipoUnidad.idTipoMaterial', '=', 'tipoMaterial.idTipoMaterial')->where('nombreTipoUnidad','10 x 12')->select(DB::raw('SUM(material.cantidadMaterial*material.cantidadUnidadMaterial)as total'))->pluck('total');

        $placas10= json_decode($placas10, true);
        if($placas10['0'] == NULL)
             $placas10 = 0;
        else
            $placas10 = $placas10['0'];

        $placas11 = DB::table('users')->join('entrada', 'users.id', '=', 'entrada.id')->join('material', 'entrada.idEntrada', '=', 'material.idEntrada')->join('tipoUnidad', 'material.idTipoUnidad', '=', 'tipoUnidad.idTipoUnidad')->join('tipoMaterial', 'tipoUnidad.idTipoMaterial', '=', 'tipoMaterial.idTipoMaterial')->where('nombreTipoUnidad','11 x 14')->select(DB::raw('SUM(material.cantidadMaterial*material.cantidadUnidadMaterial)as total'))->pluck('total');

        $placas11= json_decode($placas11, true);
        if($placas11['0'] == NULL)
             $placas11 = 0;
        else
            $placas11 = $placas11['0'];

        $placas14 = DB::table('users')->join('entrada', 'users.id', '=', 'entrada.id')->join('material', 'entrada.idEntrada', '=', 'material.idEntrada')->join('tipoUnidad', 'material.idTipoUnidad', '=', 'tipoUnidad.idTipoUnidad')->join('tipoMaterial', 'tipoUnidad.idTipoMaterial', '=', 'tipoMaterial.idTipoMaterial')->where('nombreTipoUnidad','14 x 14')->select(DB::raw('SUM(material.cantidadMaterial*material.cantidadUnidadMaterial)as total'))->pluck('total');

         $placas14= json_decode($placas14, true);
        if($placas14['0'] == NULL)
             $placas14 = 0;
        else
            $placas14 = $placas14['0'];

        $placas17 = DB::table('users')->join('entrada', 'users.id', '=', 'entrada.id')->join('material', 'entrada.idEntrada', '=', 'material.idEntrada')->join('tipoUnidad', 'material.idTipoUnidad', '=', 'tipoUnidad.idTipoUnidad')->join('tipoMaterial', 'tipoUnidad.idTipoMaterial', '=', 'tipoMaterial.idTipoMaterial')->where('nombreTipoUnidad','14 x 17')->select(DB::raw('SUM(material.cantidadMaterial*material.cantidadUnidadMaterial)as total'))->pluck('total');

        $placas17= json_decode($placas17, true);
        if($placas17['0'] == NULL)
             $placas17 = 0;
        else
            $placas17 = $placas17['0'];

        $setRevelador = DB::table('users')->join('entrada', 'users.id', '=', 'entrada.id')->join('material', 'entrada.idEntrada', '=', 'material.idEntrada')->join('tipoUnidad', 'material.idTipoUnidad', '=', 'tipoUnidad.idTipoUnidad')->join('tipoMaterial', 'tipoUnidad.idTipoMaterial', '=', 'tipoMaterial.idTipoMaterial')->where('nombreTipoUnidad','Set')->where('nombreTipoMaterial','Revelador')->select(DB::raw('SUM(material.cantidadMaterial*material.cantidadUnidadMaterial)as total'))->pluck('total');

         $setRevelador= json_decode($setRevelador, true);
        if($setRevelador['0'] == NULL)
             $setRevelador = 0;
        else
            $setRevelador = $setRevelador['0'];


        $setFijador = DB::table('users')->join('entrada', 'users.id', '=', 'entrada.id')->join('material', 'entrada.idEntrada', '=', 'material.idEntrada')->join('tipoUnidad', 'material.idTipoUnidad', '=', 'tipoUnidad.idTipoUnidad')->join('tipoMaterial', 'tipoUnidad.idTipoMaterial', '=', 'tipoMaterial.idTipoMaterial')->where('nombreTipoUnidad','Set')->where('nombreTipoMaterial','Fijador')->select(DB::raw('SUM(material.cantidadMaterial*material.cantidadUnidadMaterial)as total'))->pluck('total');

         $setFijador= json_decode($setFijador, true);
        if($setFijador['0'] == NULL)
             $setFijador = 0;
        else
            $setFijador = $setFijador['0'];
      
        

      $pdf = PDF::loadView($this->path.'/inventarioMaterialesPDF', compact('placas6','placas8','placas10','placas11','placas14','placas17','setRevelador','setFijador'));
       
      return $pdf->stream('reporte.pdf');

    }
}
