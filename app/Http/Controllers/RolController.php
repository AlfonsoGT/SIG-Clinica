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
    $this->validate($request,[
      'nombre_rol' => 'required|max:75|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
      'descripcion' => 'required|max:75|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
    ]);

    try{
      $revision=DB::table('roles')->where('name',$request->nombre_rol)->count();

      if($revision==0)
      {  $rol = new Role();
        $rol->name = $request->nombre_rol;
        $rol->description=$request->descripcion;
        $rol->save();
        return redirect($this->path)->with('msj','Rol guardado exitosamente');
      }else{
        return back()->with('msj2','Rol no registrado, es posible que el nombre ya se encuentre registrado');
      }



    }catch(Exception $e){

      return back()->with('msj2','Rol no registrado, es posible que el nombre ya se encuentre registrado');
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
  $this->validate($request,[
    'nombre_rol' => 'required|max:75|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
    'descripcion' => 'required|max:75|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
  ]);
  try {

    $rol = Role::findOrFail($id);
    $almacenado=$rol->name;
    $cambio=$request->nombre_rol;
    if($almacenado==$cambio){
      $rol->description=$request->descripcion;
      $rol->save();
      return Redirect()->action('RolController@show',['id' => $rol->id])->with('msj','Actualización guardada');
    }else{
      $revision=DB::table('roles')->where('name',$request->nombre_rol)->count();

      if($revision!=1){
        $rol->name=$request->nombre_rol;
        $rol->description=$request->descripcion;
        $rol->save();
        return Redirect()->action('RolController@show',['id' => $rol->id])->with('msj','Actualización guardada');
      }else{
        return back()->with('msj2','Actualización no pudo ser guardada, el nombre ya ha sido asignado a otro rol anteriormente');
      }

    }

  }

  catch(Exception $e){
    return back()->with('msj2','Actualización no pudo ser guardada');
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
  try{
    $rol = Role::findOrFail($id);
    $rol->delete();
    return redirect($this->path)->with('msj2','Rol eliminado Exitosamente');
  }catch(Exception $e){
    return "No se pudo eliminar el Rol Especificado";
  }
}


public function vista_borrarRoles($id){
         //recuperar de la base el elemento que queremos borrar en base al ID que recibimos en la URL con el unico fin de mostrar el detalle

         $rol = Role::find($id);
        return view($this->path.'/vista_borrarRoles')->with('rol', $rol);
    }

}
