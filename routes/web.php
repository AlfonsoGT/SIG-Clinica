<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();
Route::get('/homeAdministrador', 'UserController@home')->name('homeAdministrador');
/*activación y desactivación de perfiles de pacientes*/
Route::get('/inactivar/{id}', 'PacienteController@inactivar')->name('inactivar');
Route::get('/activar/{id}', 'PacienteController@activar')->name('activar');

/* asignar y revocar permisos a roles*/
Route::get('/asignarPermiso/{id}', 'RolController@asignarPermiso')->name('asignarPermiso');
Route::get('/revocarPermiso/{id},{idpermiso}', 'RolController@revocarPermiso')->name('revocarPermiso');

/* asignar y revocar roles a usuarios*/
Route::get('/asignarRol/{id}', 'UserController@asignarRol')->name('asignarRol');
Route::get('/revocarRol/{id},{idpermiso}', 'UserController@revocarRol')->name('revocarRol');

/*Secretaria*/
Route::get('/homeSecretaria', 'PacienteController@home')->name('homeSecretaria');
Route::resource('/admin_pacientes','PacienteController');

/*Reservacion de Cita*/
Route::resource('/admin_reservaciones','ReservacionController');
Route::get('/tomarIdPaciente/{id}','ReservacionController@tomaridPaciente')->name('tomarIdPaciente');
Route::get('/tomarIdPacienteUpdate/{idPaciente},{idReservacion}','ReservacionController@tomaridPacienteUpdate')->name('tomarIdPacienteUpdate');
Route::get('/tomarIdPacienteEliminar/{idPaciente},{idReservacion}','ReservacionController@tomarIdPacienteEliminar')->name('tomarIdPacienteEliminar');
Route::get('vista_borrar/{idPaciente},{idReservacion}', 'ReservacionController@vista_borrar'); //mostrar la pantalla de confirmacion
Route::get('/region/{idTipoExamen}','ReservacionController@getRegion');
Route::get('/consulta/{idTipoExamen}','ReservacionController@getConsulta');
Route::get('/citasDisponibles/{idTipoExamen}','ReservacionController@getCitasDisponibles');
Route::get('/habilitarCita/{id}','CitasController@habilitarCita')->name('habilitarCita');
Route::get('/inhabilitarCita/{id}','CitasController@inhabilitarCita')->name('inhabilitarCita');

/*Gestion de Citas*/
Route::resource('/admin_citas', 'CitasController');

Route::resource('/admin_users','UserController');
Route::get('vista_borrarUsuarios/{id}', 'UserController@vista_borrarUsuarios'); //mostrar la pantalla de confirmacion
Route::resource('/admin_roles', 'RolController');
Route::get('vista_borrarRoles/{id}', 'RolController@vista_borrarRoles'); //mostrar la pantalla de confirmacion

/*modificacion de contraseña */
Route::get('/editPassword/{id}', 'UserController@editPassword')->name('editPassword');
Route::post('/actualizarPassword/{id}','UserController@actualizarPassword')->name('actualizarPassword');


/*Salidas de Material*/
Route::resource('/admin_salidas','SalidasController');
Route::post('/ingresarMaterial/{idSalida}','SalidasController@IngresarMaterial')->name('ingresarMaterial');

/* Gestión de examen */
Route::resource('/admin_examenes','ExamenController');

Route::get('/crearcita/{id}', 'ExamenController@create')->name('crearcita');
