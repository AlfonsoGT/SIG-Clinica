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
</body>
</html>