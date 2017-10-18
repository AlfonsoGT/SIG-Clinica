<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
    //$this->middleware('auth');
    //$this->middleware('admin',['except'=>'show']);
  }
    public function index(Request $request)
    {
      $users =  User::busqueda($request->busqueda)
          ->orderBy('id', 'desc')
          ->select('users.id','users.name', 'users.username')
          ->paginate(7);
          return view($this->path.'/admin_users')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $roles=DB::table('roles')->select('id', 'name')->get();
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
        'name' => 'required|max:75|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
        'username' => 'required|string|max:255|unique:users',
        'password' => 'required|string|min:6',

      ]);
      try{
     $user = new User();
      $user->name = $request->name;
      $user->username=$request->username;
      $user->password= bcrypt($request->password);


      if($user->save()){
        $user->assignRole($request->rol_asignado);
        $user->save();
      return redirect($this->path)->with('msj','Usuario Registrado');
      }else{
        return back()->with('msj2','Usuario no registrado, es posible que el username ya se encuentre registrado');
      }


      }catch(Exception $e){
          return back()->with('msj2','Usuario no registrado, es posible que el username ya se encuentre registrado');
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
        $user = User::findOrFail($id);
        $users = DB::table('users')
        ->select('users.*')->where('users.id',$user->id)->get();


        //roles para el combobox
        $roles=DB::table('roles')->select('*')
          ->whereNotIn('roles.id', DB::table('role_user')
          ->select('role_user.role_id')->where('role_user.user_id', '=', $user->id))->get();

        // roles para la tabla de roles asignados
              $rolesAsignados= DB::table('role_user')
              ->join('roles','role_user.role_id','=','roles.id')
              ->select('roles.*')->where('role_user.user_id',$user->id)->get();


        return view($this->path.'/perfilUser')->with('users',$users)->with('roles',$roles)->with('rolesAsignados',$rolesAsignados);
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

             return view($this->path.'/editarUsuario')->with("user",$user);
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
        'name' => 'required|max:75|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
        'username' => 'required|string|max:255',
       'password' => 'nullable|confirmed|string|min:6',

      ]);
      try{
          //
      $user = User::findOrFail($id);
      $user->name = $request->name;
      $user->username = $request->username;

//validacion de nueva contraseña para campo no vacío
      if($request->password != null){
        $user->password=bcrypt($request->password);
      }

//guardado y envío de confirmacion
      if($user->save()){
      return redirect($this->path)->with('msj','Usuario modificado');
      }else{
        return back()->with('msj2','Usuario no registrado, es posible que el username ya se encuentre registrado');
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
            return redirect($this->path)->with('msj2','Usuario Eliminado Exitosamente');
        }catch(Exception $e){
            return "No se pudo eliminar el Usuario Especificado";
        }
    }



    public function asignarRol(Request $request,$id){
    $user = User::findOrFail($id);
    $idrol= $request->rol_asignado;
    $user->assignRole($idrol);
    $user->save();
    return redirect()->action('UserController@show',['id' => $user->id]);
    }


    public function revocarRol($iduser,$idrol){

    $user = User::find($iduser);
    $user->revokeRole($idrol);
    $user->save();
    return redirect()->action('UserController@show',['id' => $iduser]);
    }


    public function editPassword($id)
    {
                   try{
                  $user = User::findOrFail($id);
                  return view($this->path.'/editarPassword')->with("user",$user);
             }catch(Exception $e){
                 return "Error al intentar modificar al Usuario".$e->getMessage();
             }

    }


public function actualizarPassword(Request $request, $id){

  $this->validate($request,[
    'old_password' => 'required|string|min:6',
   'password' => 'confirmed|required|string|min:6',

  ]);
$user=User::findOrFail($id);
$almacenada=$user->password;
$recibida=$request->old_password;

if (Hash::check($recibida, $almacenada)) {
  $nueva_password=$request->password;
  $user->password=bcrypt($nueva_password);
  $user->save();
  return redirect()->action('UserController@show',['id' => $user->id])->with('msj','la contraseña ha sido modificada con éxito');
}else{
  return redirect()->action('UserController@show',['id' => $user->id])->with('msj2','La contraseña anterior está incorrecta, intentelo nuevamente');
}



}

public function vista_borrarUsuarios($id){
         //recuperar de la base el elemento que queremos borrar en base al ID que recibimos en la URL con el unico fin de mostrar el detalle

         $usuario = User::find($id);
        return view($this->path.'/vista_borrarUsuarios')->with('usuario', $usuario);
    }

}
