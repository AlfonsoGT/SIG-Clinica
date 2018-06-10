
@extends('layouts.app')

@section('content')
  
    <section>
        <div class="container" id="panelCantPacientes">
            <div class="row">
                <div class="panel panel-default">

                    <div class="panel-heading">Cantidad de Pacientes Registrados por año</div>
                    <div class="panel-body">

                        <h2 style="display: inline;">Numero de Pacientes</h2>
                        
                        <div class="table-responsive">
					<table class="table table-striped table-hover table-bordered">
						<thead>
							<tr>

								<th class="text-center">Cantidad de pacientes</th>
							</tr>
						</thead>
						<tbody>
							<tr>

								<td class="text-center">{{ $pacientes }}</td>
								
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