<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;
use App\Rol;
class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $path = '/admin_roles';
    public function index()
    {
        $roles = DB::table('roles')->paginate(10);
        return view($this->path.'/admin_roles')->with('roles',$roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->path.'/crearRol');
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
      $rol = new Role();
       $rol->name = $request->nombre_rol;
       $rol->description=$request->descripcion;

       if( $rol->save()){
       return redirect($this->path)->with('msj','Usuario Registrado');
       }else{
         return back()->with('msj2','Usuario no registrado, es posible que el username ya se encuentre registrado');
       }

       }catch(Exception $e){
           //return "Fatal error - ".$e->getMessage();
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
      //informacion del rol
      $rol = Role::findOrFail($id);
      $Rol = DB::table('roles')->select('*')->where('roles.id','=',$rol->id)->get();

//permisos para el combobox

$permisos= DB::table('permissions')->select('*')
->whereNotIn('permissions.id', DB::table('permission_role')
->select('permission_role.permission_id')->where('permission_role.role_id', '=', $rol->id))->get();

// permisos para la tabla de permisos asignados
      $permisosAsignados= DB::table('permission_role')
      ->join('permissions','permission_role.permission_id','=','permissions.id')
      ->select('permissions.*')->where('permission_role.role_id',$id)->get();

       /*$permisoscontados= DB::table('permission_role')
      ->join('permissions','permission_role.permission_id','=','permissions.id')
      ->select('permissions.*')->where('permission_role.role_id',$id)->count();

      //Sirve para capturar los id de los Permisos Asignados respectivos a cada Rol
      $permisosIdAsignados=array();
      foreach ( $permisos as $per2) {
      foreach ( $permisosAsignados as $per) {
          if( $per2->id == $per->id)
         array_push($permisosIdAsignados, $per2->id);
      }
    }
      //Sirve para capturar solamente los id de todos los permisos
      $permisosIdTodos=array();
      foreach ( $permisos as $per2) {
         array_push($permisosIdTodos, $per2->id);
      }
      //sirve para contar todos los datos que posee el array de permisosIdAsignados
      $indices = [];
        for($i=0; $i<sizeof($permisosIdAsignados);$i++){
            array_push($indices, $i);
        }
      //sirve para contar todos los datos que posee el array de permisosIdTodos
      $indices2 = [];
        for($i=0; $i<sizeof($permisosIdTodos);$i++){
            array_push($indices2, $i);
        }

      //Este proceso es para capturar nada mas los permisos NO asignados
      $permisosNo=[];
      foreach ($indices2 as $indice2) {
       foreach ($indices as $indice) {
          $permisosNo = array_diff($permisosIdTodos,$permisosIdAsignados);
       }
      }
       //sirve para contar todos los datos que posee el array de permisosNo
       $indices3 = [];
        for($i=0; $i<sizeof($permisosNo);$i++){
            array_push($indices3, $i);
        }
     //Este proceso es para capturar toda la información de los permisos no asignados
     $permisosNoMostrados = [];
    foreach ($permisosNo as $permisos) {
      $aux =DB::table('permissions')->orderBy('id', 'asc')
      ->where('permissions.id','=',$permisos)->select('*')->get();
      array_push($permisosNoMostrados, $aux);
      }*/
      return view($this->path.'/perfilRol')->with('Rol',$Rol)->with('permisosAsignados',$permisosAsignados)->with('permisos',$permisos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rol = Role::findOrFail($id);
        return view($this->path.'/editarRol')->with("rol",$rol);
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
        try {
            //
            $rol = Role::findOrFail($id);
            $rol->name = $request->nombre_rol;
            $rol->description=$request->descripcion;
            $rol->save();
        return redirect($this->path);
        }catch(Exception $e){
            return "Error al intentar modificar al Rol".$e->getMessage();
}
    }





public function asignarPermiso(Request $request,$idrol){
$rol = Role::find($idrol);
$idpermiso= $request->permiso_asignado;

$rol->assignPermission($idpermiso);

$rol->save();
return redirect()->action('RolController@show',['id' => $idrol]);
}





public function revocarPermiso($idrol,$idpermiso){

$rol = Role::find($idrol);
$rol->revokePermission($idpermiso);
$rol->save();
return redirect()->action('RolController@show',['id' => $idrol]);
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
