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
Route::get('/vista_borrar/{idPaciente},{idReservacion}', 'ReservacionController@vista_borrar')->name('vista_borrar'); //mostrar la pantalla de confirmacion
Route::get('/region/{idTipoExamen}','ReservacionController@getRegion');
Route::get('/consulta/{idTipoExamen}','ReservacionController@getConsulta');
Route::get('/citasDisponibles/{idTipoExamen}','ReservacionController@getCitasDisponibles');
Route::get('/habilitarCita/{id}','CitasController@habilitarCita')->name('habilitarCita');
Route::get('/inhabilitarCita/{id}','CitasController@inhabilitarCita')->name('inhabilitarCita');

/*Gestion de Citas*/
Route::resource('/admin_citas', 'CitasController');

Route::resource('/admin_users','UserController');
Route::get('vista_borrarUsuarios/{id}', 'UserController@vista_borrarUsuarios')->name('vista_borrarUsuarios'); //mostrar la pantalla de confirmacion
Route::resource('/admin_roles', 'RolController');
Route::get('vista_borrarRoles/{id}', 'RolController@vista_borrarRoles')->name('vista_borrarRoles'); //mostrar la pantalla de confirmacion

/*modificacion de contraseña */
Route::get('/editPassword/{id}', 'UserController@editPassword')->name('editPassword');
Route::post('/actualizarPassword/{id}','UserController@actualizarPassword')->name('actualizarPassword');


/*Salidas de Material*/
Route::resource('/admin_salidas','SalidasController');
Route::get('/tomarIdMaterialEliminar/{idMaterial},{idSalida}','SalidasController@tomarIdMaterialEliminar')->name('tomarIdMaterialEliminar');
Route::get('vista_borrarMaterial/{idMaterial},{idSalida}', 'SalidasController@vista_borrarMaterial')->name('vista_borrarMaterial'); //mostrar la pantalla de confirmacion
Route::get('/unidades/{idTipoMaterial}','SalidasController@getTipoUnidad');


/*Entradas de Material*/
Route::resource('/admin_entradas','EntradaController');
Route::get('/tomarIdMaterialEliminarEntrada/{idMaterial},{idEntrada}','EntradaController@tomarIdMaterialEliminarEntrada')->name('tomarIdMaterialEliminarEntrada');
Route::get('/borrarMaterialEntrada/{idMaterial},{idEntrada}', 'EntradaController@borrarMaterialEntrada')->name('borrarMaterialEntrada'); //mostrar la pantalla de confirmacion


/* Gestión de examen */
Route::resource('/admin_examenes','ExamenController');

Route::get('/crearcita/{id}', 'ExamenController@create')->name('crearcita');

/*graficas*/
Route::resource('/admin_graficos','GraficaController');

//graficas individuales
Route::get('/graficaRegionAnatomica', 'GraficaController@graficaRegionAnatomica')->name('graficaRegionAnatomica');
Route::get('/graficoEdades', 'GraficaController@graficoEdades')->name('graficoEdades');
Route::get('/graficaPacientesDepartamento','GraficaController@graficaPacientesDepartamento')->name('graficaPacientesDepartamento');
Route::get('/graficaPacientesPorSexo','GraficaController@graficaPacientesPorSexo')->name('graficaPacientesPorSexo');
Route::get('/graficaExamenesRealizadosRegionAnatomica','GraficaController@graficaExamenesRealizadosRegionAnatomica')->name('graficaExamenesRealizadosRegionAnatomica');
Route::get('/graficoPatologico', 'GraficaController@graficoPatologico')->name('graficoPatologico');

//graficas de intervalos
Route::get('/graficaExamenesTotalEntre', 'GraficaController@graficaExamenesTotalEntre')->name('graficaExamenesTotalEntre');
Route::get('/graficaExamenesRealizadosRegionAnatomicaDiario', 'GraficaController@graficaExamenesRealizadosRegionAnatomicaDiario')->name('graficaExamenesRealizadosRegionAnatomicaDiario');
Route::get('/graficaExamenesRealizadosRegionAnatomica', 'GraficaController@graficaExamenesRealizadosRegionAnatomica')->name('graficaExamenesRealizadosRegionAnatomica');

//gestion de lecturas
Route::resource('/admin_lecturas','LecturaController');
//Para pasar parametros de la pantalla
Route::get('/crearLectura/{idExamen}', 'LecturaController@create')->name('crearLectura');
Route::get('/crearLecturaGinecologica/{idExamen}', 'LecturaController@createGinecologica')->name('crearLecturaGinecologica');
//descargar pdf
Route::get('/downloadPDF/{idPaciente},{idLecturaExamen}','LecturaController@downloadPDF');
//ver pdf
Route::get('/seePDF/{idExamen}','LecturaController@seePDF')->name('seePDF');
Route::get('/seePDFGinecologica/{idExamen}','LecturaController@seePDFGinecologica')->name('seePDFGinecologica');





//salidas estrategicas

Route::get('/homeEstrategico', 'EstrategicoController@home')->name('homeEstrategico');

Route::resource('salidas_estrategicas/numero_pacientes', 'Controllers_Estrategicos\CantidadPacientesController');

Route::resource('salidas_estrategicas/porcentaje_pacientes', 'Controllers_Estrategicos\PorcentajePacientesController');

Route::resource('salidas_estrategicas/cantidad_patologias', 'Controllers_Estrategicos\CantidadPatologiasController');

Route::resource('salidas_estrategicas/cantidad_tipoExamen', 'Controllers_Estrategicos\CantidadTipoExamenController');

Route::resource('salidas_estrategicas/cantidad_insumos', 'Controllers_Estrategicos\CantidadInsumosController');

//salidas tacticas

Route::get('/homeTactico', 'TacticoController@home')->name('homeTactico');

Route::resource('salidas_tacticas/costos_insumos', 'Controllers_Tacticos\CostosInsumosController');

Route::resource('salidas_tacticas/presupuesto', 'Controllers_Tacticos\PresupuestoController');

Route::resource('salidas_tacticas/pacientes_departamento', 'Controllers_Tacticos\PacientesDepartamentoController');

Route::resource('salidas_tacticas/reservacion_citas', 'Controllers_Tacticos\ReservacionCitasController');

Route::resource('salidas_tacticas/inventario_materiales', 'Controllers_Tacticos\InventarioMaterialesController');

Route::resource('salidas_tacticas/ganancias_examenes', 'Controllers_Tacticos\GananciasExamenesController');

// rutas estrategicas pdf

Route::get('/cantidadPacientesPDF','ReporteController@cantidadPacientesPDF')->name('cantidadPacientesPDF');

Route::get('/cantidadInsumosPDF','ReporteController@cantidadInsumosPDF')->name('cantidadInsumosPDF');

Route::get('/cantidadPatologiasPDF','ReporteController@cantidadPatologiasPDF')->name('cantidadPatologiasPDF');

Route::get('/porcentajePacientesPDF','ReporteController@porcentajePacientesPDF')->name('porcentajePacientesPDF');

Route::get('/cantidadTipoExamenPDF','ReporteController@cantidadTipoExamenPDF')->name('cantidadTipoExamenPDF');

// rutas tacticas pdf

Route::get('/costosInsumosPDF','ReporteController@costosInsumosPDF')->name('costosInsumosPDF');

Route::get('/gananciasExamenesPDF','ReporteController@gananciasExamenesPDF')->name('gananciasExamenesPDF');

Route::get('/presupuestoPDF','ReporteController@presupuestoPDF')->name('presupuestoPDF');

Route::get('/reservacionCitasPDF','ReporteController@reservacionCitasPDF')->name('reservacionCitasPDF');

Route::get('/pacientesDepartamentoPDF','ReporteController@pacientesDepartamentoPDF')->name('pacientesDepartamentoPDF');

Route::get('/inventarioMaterialesPDF','ReporteController@inventarioMaterialesPDF')->name('inventarioMaterialesPDF');