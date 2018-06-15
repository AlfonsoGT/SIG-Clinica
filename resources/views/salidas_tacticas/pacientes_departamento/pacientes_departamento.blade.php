@extends('layouts.app')

@section('content')
  
    <section>
        <div class="container" id="panelPacDepartamentos">
            <div class="row">
                <div class="panel panel-default">

                    <div class="panel-heading">Cantidad de Pacientes por Departamento</div>
                    <div class="panel-body">

                        <h2 style="display: inline;">Departamentos</h2>

                       <div class="table-responsive">
					<table class="table table-striped table-hover table-bordered">						
                    	<thead>
							<tr>

								<th class="text-center">Ahuachapán</th>
								<th class="text-center">Cabañas</th>
								<th class="text-center">Chalatenango</th>
								<th class="text-center">Cuscatlán</th>
								<th class="text-center">Morazán</th>
								<th class="text-center">La Libertad</th>
								<th class="text-center">La Paz</th>
								<th class="text-center">La Unión</th>
								<th class="text-center">San Miguel</th>
								<th class="text-center">San Salvador</th>
								<th class="text-center">San Vicente</th>
								<th class="text-center">Santa Ana</th>
								<th class="text-center">Sonsonate</th>
								<th class="text-center">Usulután</th>
							</tr>
						</thead>
						<tbody>
							<tr>

								<td class="text-center">{{ $ahuachapan }}</td>
								<td class="text-center">{{ $cabañas }}</td>
								<td class="text-center">{{ $chalatenango }}</td>
								<td class="text-center">{{ $cuscatlan }}</td>
								<td class="text-center">{{ $morazan }}</td>
								<td class="text-center">{{ $lalibertad }}</td>
								<td class="text-center">{{ $lapaz }}</td>
								<td class="text-center">{{ $launion }}</td>
								<td class="text-center">{{ $sanmiguel }}</td>
								<td class="text-center">{{ $sansalvador }}</td>
								<td class="text-center">{{ $sanvicente }}</td>
								<td class="text-center">{{ $santaana }}</td>
								<td class="text-center">{{ $sonsonate }}</td>
								<td class="text-center">{{ $usulutan }}</td>
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