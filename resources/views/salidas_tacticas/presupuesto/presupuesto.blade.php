@extends('layouts.app')

@section('content')
  
    <section>
        <div class="container" id="panelPacDepartamentos">
            <div class="row">
                <div class="panel panel-default">

                    <div class="panel-heading">Presupuesto de Clinica</div>
                    <div class="panel-body">

                        <h2 style="display: inline;">Ganancias Costos y Presupuesto</h2>

                       <div class="table-responsive">
					<table class="table table-striped table-hover table-bordered">						
                    	<thead>
							<tr>

								<th class="text-center">Total de Ganancias</th>
								<th class="text-center">Total de Costos</th>
								<th class="text-center">Presupuesto de la Clinica</th>
								<th class="text-center">Acciones</th>

							</tr>
						</thead>
						<tbody>
							<tr>

								<td class="text-center">{{ $ganancias}}
								</td>
								<td class="text-center">{{ $costos}}
								</td>
								<td class="text-center">{{ $presupuesto}}
								</td>
								<td> <a href="{{ route('presupuestoPDF') }}" target="_blank" class="btn btn-info btn-sm">
												<span class="glyphicon glyphicon-download-alt"></span>Ver PDF</a> 
								</td>
								
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