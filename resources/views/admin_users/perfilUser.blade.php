@extends('layouts.app')

@section('content')
<section>
	<div class="alert alert-info" role="alert">
		<strong>Perfil del Paciente</strong>
   </div>
	<div class="container">
		<div id="loginbox" style="margin-top:30px">
			<div class="panel panel-primary" >
				<div class="panel-heading">
					<div class="panel-title">Información del usuario</div>
				</div>

				<div style="padding-top:30px" class="panel-body" >
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> <!--Seguridad Otorgada por blade -->

<!--tabla 1-->
<div class="table-responsive">
	 <table class="table table-striped table-hover table-bordered">
		<thead>
			<tr>

				<th class="text-center">Nombre Completo</th>
				<th class="text-center">Nombre de Usuario</th>
				<th class="text-center">Rol del Usuario</th>
        <th class="text-center">Acceso Nivel 1</th>
        <th class="text-center">Acceso Nivel 2</th>
        <th class="text-center">Acceso Nivel 3</th>

			</tr>
		</thead>
		<tbody>
		@foreach($users as $user)
					<tr>

						<td class="text-center">{{ $user->name }}</td>
						<td class="text-center"> {{ $user->username }} </td>
						<td class="text-center"> {{ $user->nombre_rol }} </td>
            @if($user->nivel_1==true)
            <td class="text-center"> Concedido </td>
            @else
            <td class="text-center"> Denegado </td>
            @endif
            @if($user->nivel_2==true)
            <td class="text-center"> Concedido </td>
            @else
            <td class="text-center"> Denegado </td>
            @endif
            @if($user->nivel_3==true)
            <td class="text-center"> Concedido </td>
            @else
            <td class="text-center"> Denegado </td>
            @endif
					</tr>
		@endforeach
		</tbody>
	</table>
  @if (Auth::user()->nivel_3==true)
<a href="{{ route('admin_users.edit',$user->id) }}" class="btn btn-info btn-sm">Editar información</a>
@endif
	</div>
</section>
@endsection
