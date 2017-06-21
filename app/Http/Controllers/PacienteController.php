<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Redirect;

use App\Paciente;

use App\Sexo;
use App\procedencias;

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
       $this->middleware('auth');
       $this->middleware('secretaria');
 }

    public function index()
    {
        $pacientes = DB::table('pacientes')
            ->join('sexo', 'pacientes.idSexo', '=', 'sexo.idSexo')
            ->join('procedencia', 'pacientes.idProcedencia', '=', 'procedencia.idProcedencia')
            ->select('pacientes.*', 'sexo.nombre_sexo', 'procedencia.nombre_procedencia')
            ->orderBy('id', 'desc')
            ->paginate(5);
        return view($this->path.'/admin_pacientes')->with('pacientes',$pacientes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sexos = DB::table('sexo')->select('idSexo', 'nombre_sexo')->get();
        $procedencias = DB::table('procedencia')->select('idProcedencia', 'nombre_procedencia')->get();
        return view($this->path.'/crearPaciente')->with('sexos',$sexos)->with('procedencias',$procedencias);

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
    public function store(Request $request)
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

        //guardado y envío de mensaje de confirmacion
        if($paciente->save()){
        return redirect($this->path)->with('msj','Paciente Registrado');
        }else{
          return back()->with();
        }

      return redirect($this->path);
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
        try{
             $paciente = Paciente::findOrFail($id);
             $sexoPaciente= DB::table('sexo')->where('idSexo',$paciente->idSexo)->select('idSexo','nombre_sexo')->get();
             $sexoDiferente =DB::table('sexo')->where('idSexo','<>',$paciente->idSexo)->select('idSexo','nombre_sexo')->get();
             $procedenciaPaciente =DB::table('procedencia')->where('idProcedencia',$paciente->idProcedencia)->select('nombre_procedencia','idProcedencia')->get();
             $procedenciaDiferente =DB::table('procedencia')->where('idProcedencia','<>',$paciente->idProcedencia)->select('idProcedencia','nombre_procedencia')->get();
            return view($this->path.'/editarPaciente')->with("paciente",$paciente)->with('sexoPaciente',$sexoPaciente)->with('sexoDiferente',$sexoDiferente)->with('procedenciaPaciente',$procedenciaPaciente)->with('procedenciaDiferente',$procedenciaDiferente);
        }catch(Exception $e){
            return "Error al intentar modificar al Paciente".$e->getMessage();
        }
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

        if($paciente->save()){
        return redirect($this->path)->with('msj','Paciente modificado');
        }else{
          return back()->with();
        }



        return redirect($this->path);
        }catch(Exception $e){
            return "Fatal error - ".$e->getMessage();
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
