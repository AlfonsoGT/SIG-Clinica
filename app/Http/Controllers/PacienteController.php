<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Redirect;

use App\Paciente;

use App\Sexo;
use App\procedencias;

use App\Http\Requests\PacienteRequest;

use Exception;


class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $path = '/admin_pacientes';

    //Referencia al middleware adminMiddleware
  public function __construct(){
     //$this->middleware('auth');
    //  $this->middleware('secretaria');
 }

    public function index(Request $request)
    {

        $pacientes = Paciente::busqueda($request->busqueda)
            ->latest('pacientes.updated_at')
            ->join('sexo', 'pacientes.idSexo', '=', 'sexo.idSexo')
            ->join('procedencia', 'pacientes.idProcedencia', '=', 'procedencia.idProcedencia')
            ->select('pacientes.*', 'sexo.nombreSexo', 'procedencia.nombreProcedencia')

            ->paginate(10);
        return view($this->path.'/admin_pacientes')->with('pacientes',$pacientes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sexos = DB::table('sexo')->select('idSexo', 'nombreSexo')->get();
        $procedencias = DB::table('procedencia')->select('idProcedencia', 'nombreProcedencia')->get();
        $departamentos=DB::table('departamentos')->select('idDepartamento','nombreDepartamento')->get();
        return view($this->path.'/crearPaciente')->with('sexos',$sexos)->with('procedencias',$procedencias)->with('departamentos',$departamentos);

    }
    public function home()
    {
        return view($this->path.'/homeSecretaria');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PacienteRequest $request)
    {
        $this->validate($request,[
            'primerNombre' => 'required|max:75|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
            'segundoNombre' => 'required|max:75|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
            'primerApellido'=> 'required|max:75|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
            'segundoApellido'=> 'required|max:75|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
             'nombreEncargado' => 'nullable|max:75|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
            'duiPaciente' => 'nullable|max:10|min:10|regex:/^\d{8}-\d$/',
            'duiEncargado' => 'nullable| max:10|min:10|regex:/^\d{8}-\d$/',
            'numeroCelular' => 'required|max:8|min:8|regex:/^[0-9]*$/',
        ]);
        try{
        //
        $paciente = new Paciente();
        $paciente->duiPaciente = $request->duiPaciente;
        $paciente->primerNombre = $request->primerNombre;
        $paciente->segundoNombre = $request->segundoNombre;
        $paciente->primerApellido = $request->primerApellido;
        $paciente->segundoApellido = $request->segundoApellido;
        $paciente->fechaNacimiento = $request->fechaNacimiento;
        $paciente->numeroCelular = $request->numeroCelular;
        $paciente->duiEncargado = $request->duiEncargado;
        $paciente->nombreEncargado = $request->nombreEncargado;
        $paciente->idSexo = $request->sexo;
        $paciente->idProcedencia = $request->procedencia;
        $paciente->idDepartamento= $request->departamento;
        $paciente->created_at=date('Y-m-d G:i:s');
        $paciente->updated_at=date('Y-m-d G:i:s');
        $paciente->activo=true;

        //guardado y envío de mensaje de confirmacion
        if($paciente->save()){
        return redirect($this->path)->with('msj','Paciente Registrado');
        }else{
          return back()->with();
        }

        }catch(Exception $e){
            //return "Fatal error - ".$e->getMessage();
            return back()->with('msj2','Paciente no registrado, es posible que el DUI PACIENTE ya se encuentra registrado');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idPaciente)
    {
      $paciente = Paciente::findOrFail($idPaciente);
      $pacientes = DB::table('pacientes')
          ->join('sexo', 'pacientes.idSexo', '=', 'sexo.idSexo')
          ->join('procedencia', 'pacientes.idProcedencia', '=', 'procedencia.idProcedencia')
          ->join('departamentos','pacientes.idDepartamento','=','departamentos.idDepartamento')
          ->select('pacientes.*', 'sexo.nombreSexo', 'procedencia.nombreProcedencia','departamentos.nombreDepartamento')
          ->where('pacientes.idPaciente',
              $paciente->idPaciente)
          ->get();
    $reservaciones= DB::table('citas')->select('citas.fechaCita','citas.horaCita','tipoExamen.nombreTipoExamen',
        'reservacion.numeroRecibo','reservacion.fechaPago','reservacion.referencia','regionAnatomica.nombreRegionAnatomica',
        'reservacion.idPaciente','reservacion.idReservacion','reservacion.idPaciente','reservacion.realizado')
        ->orderBy('idReservacion', 'desc')
        ->join('tipoExamen','tipoExamen.idTipoExamen','=','citas.idTipoExamen')
        ->join('reservacion','citas.idCita','=','reservacion.idCita')
        ->join('pacientes','pacientes.idPaciente','=','reservacion.idPaciente')
        ->join('regionAnatomica','reservacion.idRegionAnatomica','=','regionAnatomica.idRegionAnatomica')
        ->where('reservacion.idPaciente','=',$idPaciente)
        ->paginate(5);
    return view($this->path.'/perfilPaciente')->with('pacientes',$pacientes)->with('reservaciones',$reservaciones);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idPaciente)
    {
        try{
             $paciente = Paciente::findOrFail($idPaciente);

             $sexoPaciente= DB::table('sexo')->where('idSexo',$paciente->idSexo)->select('idSexo','nombreSexo')->get();
             $sexoDiferente =DB::table('sexo')->where('idSexo','<>',$paciente->idSexo)->select('idSexo','nombreSexo')->get();

             $procedenciaPaciente =DB::table('procedencia')->where('idProcedencia',$paciente->idProcedencia)
                 ->select('nombreProcedencia','idProcedencia')->get();
             $procedenciaDiferente =DB::table('procedencia')->where('idProcedencia','<>',$paciente->idProcedencia)
                 ->select('idProcedencia','nombreProcedencia')->get();

            $departamentoPaciente=DB::table('departamentos')->where('idDepartamento',$paciente->idDepartamento)
            ->select('idDepartamento','nombreDepartamento')->get();
            $departamentoDiferente =DB::table('departamentos')->where('idDepartamento','<>',$paciente->idDepartamento)
                ->select('idDepartamento','nombreDepartamento')->get();


            return view($this->path.'/editarPaciente')
            ->with("paciente",$paciente)
            ->with('sexoPaciente',$sexoPaciente)->with('sexoDiferente',$sexoDiferente)
            ->with('procedenciaPaciente',$procedenciaPaciente)->with('procedenciaDiferente',$procedenciaDiferente)
            ->with('departamentoPaciente',$departamentoPaciente)->with('departamentoDiferente',$departamentoDiferente);
        }catch(Exception $e){
            return "Error al intentar modificar al Paciente".$e->getMessage();
        }
    }

   public function inactivar($id)
    {
      $paciente = Paciente::findOrFail($id);
      if($paciente->activo==false){
        return redirect()->action('PacienteController@show',['idPaciente' => $id])->with('msj3','EL PERFIL DEL PACIENTE YA SE ENCUENTRA INHABILITADO');
      }else{
        $paciente->activo=False;
      $paciente->save();
      return redirect()->action('PacienteController@show',['idPaciente' => $id])->with('msj3','PERFIL DE PACIENTE INHABILITADO');
    }
    }

    public function activar($id)
     {
       $paciente = Paciente::findOrFail($id);
       if($paciente->activo==true){
         return redirect()->action('PacienteController@show',['idPaciente' => $id])->with('msj3','EL PERFIL DEL PACIENTE YA SE ENCUENTRA INHABILITADO');

       }else{$paciente->activo=true;
       $paciente->save();
       return redirect()->action('PacienteController@show',['idPaciente' => $id])->with('msj3','PERFIL DE PACIENTE HABILITADO');
     }


     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PacienteRequest $request, $id)
    {
        $this->validate($request,[
            'primerNombre' => 'required|max:75|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
            'segundoNombre' => 'required|max:75|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
            'primerApellido'=> 'required|max:75|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
            'segundoApellido'=> 'required|max:75|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
            'nombreEncargado' => 'nullable|max:75|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
            'duiPaciente' => 'nullable|max:10|min:10|regex:/^\d{8}-\d$/',
            'duiEncargado' => 'nullable|max:10|min:10|regex:/^\d{8}-\d$/',
            'numeroCelular' => 'required|max:8|min:8|regex:/^[0-9]*$/',
        ]);
        try{
            //
        $paciente = Paciente::findOrFail($id);
        $paciente->duiPaciente = $request->duiPaciente;
        $paciente->primerNombre = $request->primerNombre;
        $paciente->segundoNombre = $request->segundoNombre;
        $paciente->primerApellido = $request->primerApellido;
        $paciente->segundoApellido = $request->segundoApellido;
        $paciente->fechaNacimiento = $request->fechaNacimiento;
        $paciente->numeroCelular = $request->numeroCelular;
        $paciente->duiEncargado = $request->duiEncargado;
        $paciente->nombreEncargado = $request->nombreEncargado;
        $paciente->idSexo = $request->sexo;
        $paciente->idProcedencia = $request->procedencia;
        $paciente->idDepartamento= $request->departamento;
        $paciente->updated_at=date('Y-m-d G:i:s');

        if($paciente->save()){
        return redirect()->action('PacienteController@show',['idPaciente' => $id])->with('msj3','Paciente modificado');
        }else{
          return back()->with();
        }



       // return redirect($this->path);
        }catch(Exception $e){
            //return "Fatal error - ".$e->getMessage();
            return back()->with('msj2','Paciente no modificado, es posible que el DUI PACIENTE ya se encuentra registrado');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $paciente = Paciente::findOrFail($id);
            $paciente->delete();
            return redirect($this->path);

        }catch(Exception $e){
            return "No se pudo eliminar el Paciente Especificado";
        }
    }


}
