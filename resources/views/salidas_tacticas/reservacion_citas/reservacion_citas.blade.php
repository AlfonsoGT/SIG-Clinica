@extends('layouts.app')

@section('content')
  
    <section>
        <div class="container" id="panelReservCitas">
            <div class="row">
                <div class="panel panel-default">

                    <div class="panel-heading">Cantidad de Reservaciones de citas por tipos de Exámen</div>
                    <div class="panel-body">

                        <h2 style="display: inline;">Tipos de Examen</h2>

                       <div class="table-responsive">
					<table class="table table-striped table-hover table-bordered">						
                    	<thead>
							<tr>

								<th class="text-center">Torax</th>
								<th class="text-center">Abdomen</th>
								<th class="text-center">Ovarios</th>
								<th class="text-center">Utero</th>
								<th class="text-center">Cuello</th>
								<th class="text-center">Hombro</th>
								<th class="text-center">Brazo</th>
								<th class="text-center">Codo</th>
								<th class="text-center">Antebrazo</th>
								<th class="text-center">Muñeca</th>
								<th class="text-center">Mano</th>
								<th class="text-center">Gluteo</th>
								<th class="text-center">Muslo</th>
								<th class="text-center">Rodilla</th>
								<th class="text-center">Pierna</th>
								<th class="text-center">Tobillo</th>
								<th class="text-center">Pie</th>
								<th class="text-center">Cabeza</th>
								<th class="text-center">Acciones</th>
							</tr>
						</thead>
						<tbody>
							<tr>

								<td class="text-center">{{ $torax }}</td>
								<td class="text-center">{{ $abdomen }}</td>
								<td class="text-center">{{ $ovarios }}</td>
								<td class="text-center">{{ $utero }}</td>
								<td class="text-center">{{ $cuello }}</td>
								<td class="text-center">{{ $hombro }}</td>
								<td class="text-center">{{ $brazo }}</td>
								<td class="text-center">{{ $codo }}</td>
								<td class="text-center">{{ $antebrazo }}</td>
								<td class="text-center">{{ $muñeca }}</td>
								<td class="text-center">{{ $mano }}</td>
								<td class="text-center">{{ $gluteo }}</td>
								<td class="text-center">{{ $muslo }}</td>
								<td class="text-center">{{ $rodilla }}</td>
								<td class="text-center">{{ $pierna }}</td>
								<td class="text-center">{{ $tobillo }}</td>
								<td class="text-center">{{ $pie }}</td>
								<td class="text-center">{{ $cabeza }}</td>
								<td> <a href="{{ route('reservacionCitasPDF') }}" target="_blank" class="btn btn-info btn-sm">
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