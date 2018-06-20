
@extends('layouts.app')

@section('content')
  
    <section>
        <div class="container" id="panelInvInsumos">
            <div class="row">
                <div class="panel panel-default">

                    <div class="panel-heading">Inventario de insumos de la clinica</div>
                    <div class="panel-body">

                        <h2 style="display: inline;">Tipos de Insumos</h2>

                        <div class="table-responsive">
					<table class="table table-striped table-hover table-bordered">
						<thead>
							<tr>

								<th class="text-center">Cantidad de placas tipo 6 1/2</th>
								<th class="text-center">Cantidad de placas tipo 8 x 10</th>
								<th class="text-center">Cantidad de placas tipo 10 x 12</th>
								<th class="text-center">Cantidad de placas tipo 11 x 14</th>
								<th class="text-center">Cantidad de placas tipo 14 x 14</th>
								<th class="text-center">Cantidad de placas tipo 14 x 17</th>
								<th class="text-center">Cantidad de placas tipo Set Revelador</th>
								<th class="text-center">Cantidad de placas tipo Set Fijador</th>
							</tr>
						</thead>
						<tbody>
							<tr>

								<td class="text-center"><?php 
								    $placa6= json_decode($placas6, true);
								    if($placa6['0'] == NULL)
                                        print_r( $cero = "0");
                                    else
                                    	print_r($placa6['0']);
								?></td>
								<td class="text-center"><?php 
								    $placa8= json_decode($placas8, true);
								    if($placa8['0'] == NULL)
                                        print_r( $cero = "0");
                                    else
                                    	print_r($placa8['0']);
								?></td>
								<td class="text-center"><?php 
								    $placa10= json_decode($placas10, true);
								    if($placa10['0'] == NULL)
                                        print_r( $cero = "0");
                                    else
                                    	print_r($placa10['0']);
								?></td>
								<td class="text-center"><?php 
								    $placa11= json_decode($placas11, true);
								    if($placa11['0'] == NULL)
                                        print_r( $cero = "0");
                                    else
                                    	print_r($placa11['0']);
								?></td>
								<td class="text-center"><?php 
								    $placa14= json_decode($placas14, true);
								    if($placa14['0'] == NULL)
                                        print_r( $cero = "0");
                                    else
                                    	print_r($placa14['0']);
								?></td>
								<td class="text-center"><?php 
								    $placa17= json_decode($placas17, true);
								    if($placa17['0'] == NULL)
                                        print_r( $cero = "0");
                                    else
                                    	print_r($placa17['0']);
								?></td>
								<td class="text-center"><?php 
								    $setRevelador= json_decode($setRevelador, true);
								    if($setRevelador['0'] == NULL)
                                        print_r( $cero = "0");
                                    else
                                    	print_r($setRevelador['0']);
								?></td>
								<td class="text-center"><?php 
								    $setFijador= json_decode($setFijador, true);
								    if($setFijador['0'] == NULL)
                                        print_r( $cero = "0");
                                    else
                                    	print_r($setFijador['0']);
								?></td>
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