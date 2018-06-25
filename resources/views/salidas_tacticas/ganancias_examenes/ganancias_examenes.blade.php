@extends('layouts.app')

@section('content')
  
    <section>
        <div class="container" id="panelGanExamenes">
            <div class="row">
                <div class="panel panel-default">

                    <div class="panel-heading">Ganancias por Tipos de Examen</div>
                    <div class="panel-body">

                        <h2 style="display: inline;">Ganancias por Tipos de Examen </h2>

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

								<td class="text-center"><?php 
								    $torax1= json_decode($torax, true);
								    if($torax1['0'] == NULL)
                                        print_r( $cero = "0");
                                    else
                                    	print_r($torax1['0']);
								?></td>
								<td class="text-center"><?php 
								    $abdomen1= json_decode($abdomen, true);
								    if($abdomen1['0'] == NULL)
                                        print_r( $cero = "0");
                                    else
                                    	print_r($abdomen1['0']);
								?></td>
								<td class="text-center"><?php 
								    $ovarios1= json_decode($ovarios, true);
								    if($ovarios1['0'] == NULL)
                                        print_r( $cero = "0");
                                    else
                                    	print_r($ovarios1['0']);
								?></td>
								<td class="text-center"><?php 
								    $utero1= json_decode($utero, true);
								    if($utero1['0'] == NULL)
                                        print_r( $cero = "0");
                                    else
                                    	print_r($utero1['0']);
								?></td>
								<td class="text-center"><?php 
								    $cuello1= json_decode($cuello, true);
								    if($cuello1['0'] == NULL)
                                        print_r( $cero = "0");
                                    else
                                    	print_r($cuello1['0']);
								?></td>
								<td class="text-center"><?php 
								    $hombro1= json_decode($hombro, true);
								    if($hombro1['0'] == NULL)
                                        print_r( $cero = "0");
                                    else
                                    	print_r($hombro1['0']);
								?></td>
								<td class="text-center"><?php 
								    $brazo1= json_decode($brazo, true);
								    if($brazo1['0'] == NULL)
                                        print_r( $cero = "0");
                                    else
                                    	print_r($brazo1['0']);
								?></td>
								<td class="text-center"><?php 
								    $codo1= json_decode($codo, true);
								    if($codo1['0'] == NULL)
                                        print_r( $cero = "0");
                                    else
                                    	print_r($codo1['0']);
								?></td>
								<td class="text-center"><?php 
								    $antebrazo1= json_decode($antebrazo, true);
								    if($antebrazo1['0'] == NULL)
                                        print_r( $cero = "0");
                                    else
                                    	print_r($antebrazo1['0']);
								?></td>
								<td class="text-center"><?php 
								    $muñeca1= json_decode($muñeca, true);
								    if($muñeca1['0'] == NULL)
                                        print_r( $cero = "0");
                                    else
                                    	print_r($muñeca1['0']);
								?></td>
								<td class="text-center"><?php 
								    $mano1= json_decode($mano, true);
								    if($mano1['0'] == NULL)
                                        print_r( $cero = "0");
                                    else
                                    	print_r($mano1['0']);
								?></td>
								<td class="text-center"><?php 
								    $gluteo1= json_decode($gluteo, true);
								    if($gluteo1['0'] == NULL)
                                        print_r( $cero = "0");
                                    else
                                    	print_r($gluteo1['0']);
								?></td>
								<td class="text-center"><?php 
								    $muslo1= json_decode($muslo, true);
								    if($muslo1['0'] == NULL)
                                        print_r( $cero = "0");
                                    else
                                    	print_r($muslo1['0']);
								?></td>
								<td class="text-center"><?php 
								    $rodilla1= json_decode($rodilla, true);
								    if($rodilla1['0'] == NULL)
                                        print_r( $cero = "0");
                                    else
                                    	print_r($rodilla1['0']);
								?></td>
								<td class="text-center"><?php 
								    $pierna1= json_decode($pierna, true);
								    if($pierna1['0'] == NULL)
                                        print_r( $cero = "0");
                                    else
                                    	print_r($pierna1['0']);
								?></td>
								<td class="text-center"><?php 
								    $tobillo1= json_decode($tobillo, true);
								    if($tobillo1['0'] == NULL)
                                        print_r( $cero = "0");
                                    else
                                    	print_r($tobillo1['0']);
								?></td>
								<td class="text-center"><?php 
								    $pie1= json_decode($pie, true);
								    if($pie1['0'] == NULL)
                                        print_r( $cero = "0");
                                    else
                                    	print_r($pie1['0']);
								?></td>
								<td class="text-center"><?php 
								    $cabeza1= json_decode($cabeza, true);
								    if($cabeza1['0'] == NULL)
                                        print_r( $cero = "0");
                                    else
                                    	print_r($cabeza1['0']);
								?></td>
								<td> <a href="{{ route('gananciasExamenesPDF') }}" target="_blank" class="btn btn-info btn-sm">
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