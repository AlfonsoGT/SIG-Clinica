<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<div class="table-responsive">
					<table class="table table-striped table-hover table-bordered">
						<thead>
							<tr>

								<th class="text-center">Radiografia de Torax</th>
								<th class="text-center">Radiografia de Miscelaneas</th>
								<th class="text-center">Ultrasonografia Abdominal</th>
								<th class="text-center">Ultrasonografia Ginecologica</th>
							</tr>
						</thead>
						<tbody>
							<tr>

								<td class="text-center">{{ $torax }}</td>
								<td class="text-center">{{ $miscelanea }}</td>
								<td class="text-center">{{ $abdominal }}</td>
								<td class="text-center">{{ $ginecologica }}</td>
							</tr>
						</tbody>

                        <thead>
							<tr>

								<th class="text-center">Ovarios</th>
								<th class="text-center">Utero</th>
							</tr>
						</thead>
						<tbody>
							<tr>

								<td class="text-center">{{ $ovarios }}</td>
								<td class="text-center">{{ $utero }}</td>
							</tr>
						</tbody>

						<thead>
							<tr>

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
							</tr>
						</thead>
						<tbody>
							<tr>

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
							</tr>
						</tbody>

					</table>
				</div>
</body>
</html>