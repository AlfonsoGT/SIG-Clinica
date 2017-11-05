<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Paciente;
use App\Reservacion;
class GraficaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     private $path = '/admin_graficos';
    public function index()
    {


      return view($this->path.'/admin_graficos');
    }

    public function graficaRegionAnatomica()
      {
        $titulo='Gráfico de reservaciones hechas en el día';
          $number='Cantidad de reservaciones';
        $resultados = Paciente::join('reservacion','pacientes.idPaciente','=','reservacion.idPaciente')
        ->join('citas','citas.idCita','=','reservacion.idCita')
        ->join('tipoExamen','tipoExamen.idTipoExamen','=','citas.idTipoExamen')
        ->join('regionanatomica','regionanatomica.idRegionAnatomica','=','reservacion.idRegionAnatomica')
        ->select('regionanatomica.nombreRegionAnatomica as titulo',DB::raw('count(reservacion.idReservacion) as conteo'))
        ->where('citas.fechaCita',date('Y-m-d'))
        ->groupBy('regionanatomica.nombreRegionAnatomica')->get();
        $ejex='Region Anatómica';

        return view($this->path.'/graficasIndividual')->with('resultados',$resultados)->with('titulo',$titulo)->with('number',$number)->with('ejex',$ejex);
      }


      public function graficoEdades()
      {   $titulo='Gráfico de pacientes mayores y menores de edad';
        $number='Cantidad de pacientes';

        /* calcula los mayores de edad*/
        $resultado1=Paciente::select(DB::raw('count(pacientes.idPaciente) as conteo'))
        ->where(DB::raw('year(curdate())-year(pacientes.fechaNacimiento)+
        if((month(curdate())>month(pacientes.fechaNacimiento)),0,-1)'),'>=',18)->get();
        /* calcula los menores de edad*/
        $resultado2=Paciente::select(DB::raw('count(pacientes.idPaciente) as conteo'))
        ->where(DB::raw('year(curdate())-year(pacientes.fechaNacimiento)+
        if((month(curdate())>month(pacientes.fechaNacimiento)),0,-1)'),'<',18)->get();

        return view($this->path.'/graficasIndividualDoble')->with('resultado1',$resultado1)->with('resultado2',$resultado2)
        ->with('titulo',$titulo)->with('number',$number);

      }


      public function graficaPacientesDepartamento()
      {
        $titulo='Gráfico de pacientes registrados por Departamento';
        $number='Cantidad de pacientes';
        $ejex='Departamento';

        $resultados = Paciente::join('departamentos','pacientes.idDepartamento','=','departamentos.idDepartamento')
        ->select('departamentos.nombreDepartamento as titulo',DB::raw('count(pacientes.idDepartamento) as conteo'))
        ->groupBy('departamentos.nombreDepartamento')->get();


        return view($this->path.'/graficasIndividual')->with('resultados',$resultados)->with('titulo',$titulo)->with('number',$number)->with('ejex',$ejex);
      }





      public function graficaPacientesPorSexo()
      {

        $titulo='Gráfico de pacientes registrados por Sexo';
        $number='Cantidad de pacientes';
        $ejex='Sexo';

        $resultados = Paciente::join('sexo','pacientes.idSexo','=','sexo.idSexo')
        ->select('nombreSexo as titulo',DB::raw('count(pacientes.idPaciente) as conteo'))
        ->groupBy('sexo.nombreSexo')->get();


        return view($this->path.'/graficasIndividual')->with('resultados',$resultados)->with('titulo',$titulo)->with('number',$number)->with('ejex',$ejex);

      }


      public function graficaExamenesRealizadosRegionAnatomica()
      {
        $titulo='Gráfico de exámenes realizados por región anatómica en el año actual';
        $number='Cantidad de exámenes';
        $ejex='Region Anatómica';

        $resultados = Reservacion::join('regionanatomica','reservacion.idRegionAnatomica','=','regionanatomica.idRegionAnatomica')
        ->select('regionanatomica.nombreRegionAnatomica as titulo',DB::raw('count(reservacion.idReservacion) as conteo'))
        ->where('realizado',1)
        ->groupBy('regionanatomica.nombreRegionAnatomica')
        ->get();

        return view($this->path.'/graficasIndividual')->with('resultados',$resultados)->with('titulo',$titulo)->with('number',$number)->with('ejex',$ejex);
      }


      public function graficaExamenesTotalEntre(Request $request)
      {
        $anio1=$request->A1;
        $anio2=$request->A2;
        if(($anio1==null)&&($anio2==null)){
          $anio1=date('Y');
          $anio2=$anio1;
        }

        if($anio1==null){
          $anio1=date('Y');
        }
        if($anio2==null){
          $anio2=date('Y');
        }

        if($anio1>$anio2){
          $aux=$anio2;
          $anio2=$anio1;
          $anio1=$aux;
        }

        $titulo='Gráfico de total de examenes realizados entre los años';
          $number='Cantidad de examenes realizados';
          $ejex='Año';

        $resultados=DB::table('examen')->select(DB::raw('year(examen.fechaRealizacion) as titulo,count(examen.idExamen) as conteo'))
        ->whereBetween(DB::raw('year(examen.fechaRealizacion)'), [$anio1,$anio2])
        ->groupBy(DB::raw('year(examen.fechaRealizacion)'))->get();

      return view($this->path.'/graficaTotalExamenesEntre')->with('resultados',$resultados)->with('titulo',$titulo)
      ->with('number',$number)
      ->with('anio1',$anio1)
      ->with('anio2',$anio2)
      ->with('ejex',$ejex);
      }




      public function graficaExamenesRealizadosRegionAnatomicaDiario(Request $request)
      {
        $titulo='Gráfico de examenes realizados por región anatómica del dia';
        $number='Cantidad de examenes realizados en la fecha indicada';
        $ejex='Region Anatómica';

        $fecha=$request->fecha;
        if($fecha==null){
          $fecha=date('Y-m-d');
        }
          $newFecha = date("d-m-Y", strtotime($fecha));

        $resultados = Reservacion::join('regionanatomica','reservacion.idRegionAnatomica','=','regionanatomica.idRegionAnatomica')
        ->join('examen','reservacion.idReservacion','=','examen.idReservacion')
        ->select('regionanatomica.nombreRegionAnatomica as titulo',DB::raw('count(reservacion.idReservacion) as conteo'))
        ->where('realizado',1)
        ->where('examen.fechaRealizacion',$fecha)
        ->groupBy('regionanatomica.nombreRegionAnatomica')
        ->get();

        return view($this->path.'/graficaExamenesDiarios')->with('resultados',$resultados)->with('titulo',$titulo)->with('number',$number)
        ->with('newFecha',$newFecha)->with('ejex',$ejex);
      }


}
