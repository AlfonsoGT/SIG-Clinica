
@extends('layouts.app')

@section('content')
  
    <section>
        <div class="container" id="panelPorcPacientes">
            <div class="row">
                <div class="panel panel-default">

                    <div class="panel-heading">Porcentaje de Pacientes registrados por año</div>
                    <div class="panel-body">

                        <h2 style="display: inline;">Género de Pacientes</h2>

                       <div class="table-responsive">
					<table class="table table-striped table-hover table-bordered">
						<thead>
							<tr>

								<th class="text-center">Hombres</th>
								<th class="text-center">Mujeres</th>
								<th class="text-center">Porcentaje Hombres</th>
								<th class="text-center">Porcentaje Mujeres</th>
							</tr>
						</thead>
						<tbody>
							<tr>

								<td class="text-center">{{ $hombres }}</td>
								<td class="text-center">{{ $mujeres }}</td>
								<td class="text-center">{{ $porHo }}%</td>
								<td class="text-center">{{ $porMu }}%</td>
							</tr>
						</tbody>
					</table>
				</div>
                        
                    </div>
                </div>
            </div>

        </div>
        </div>

    </section>
@endsection