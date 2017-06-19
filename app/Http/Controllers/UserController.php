<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Redirect;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     private $path = '/admin_users';

     //Referencia al middleware adminMiddleware
     public function __construct(){
       $this->middleware('auth');
      $this->middleware('admin');
  }
    public function index()
    {
      $users = DB::table('users')
          ->join('roles', 'users.id_rol', '=', 'roles.id_rol')
          ->select('users.id','users.name', 'users.username', 'roles.nombre_rol')
          ->orderBy('id', 'asc')
          ->get();
          return view($this->path.'/admin_users')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $roles=DB::table('roles')->select('id_rol', 'nombre_rol')->get();
          return view($this->path.'/crearUsuario')->with('roles',$roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /**Necesario para el home de Administrador*/
     public function home()
     {
         return view($this->path.'/homeAdministrador');
     }

    public function store(Request $request)
    {
      $this->validate($request,[
        'name' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:users',
        'password' => 'required|string|min:6',

      ]);
      try{
     $user = new User();
      $user->name = $request->name;
      $user->username=$request->username;
      $user->id_rol=$request->id_rol;
      $user->password= bcrypt($request->password);

      if($user->save()){
      return redirect($this->path)->with('msj','Usuario Registrado');
      }else{
        return back()->with();
      }


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
             $user = User::findOrFail($id);
             $rolUser= DB::table('roles')->where('id_rol',$user->id_rol)->select('id_rol','nombre_rol')->get();
             $rolDiferente =DB::table('roles')->where('id_rol','<>',$user->id_rol)->select('id_rol','nombre_rol')->get();;
  return view($this->path.'/editarUsuario')->with("user",$user)->with('rolUser',$rolUser)->with('rolDiferente',$rolDiferente);
        }catch(Exception $e){
            return "Error al intentar modificar al Usuario".$e->getMessage();
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

      ]);
      try{
          //
      $user = User::findOrFail($id);
      $user->name = $request->name;
      $user->username = $request->username;
      $user->id_rol = $request->id_rol;

//validacion de nueva contraseña para campo no vacío
      if($request->password != null){
        $user->password=bcrypt($request->password);
      }

//guardado y envío de confirmacion
      if($user->save()){
      return redirect($this->path)->with('msj','Usuario modificado');
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
            $user = User::findOrFail($id);
            $user->delete();
            return redirect($this->path);
        }catch(Exception $e){
            return "No se pudo eliminar el Usuario Especificado";
        }
    }
}
