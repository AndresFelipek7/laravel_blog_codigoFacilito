<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Acceso Denegad</title>
	<link rel="stylesheet" href="{{ asset('plugins/Bootstrap/css/bootstrap.css') }}">
</head>
<body>
	<div class="box-admin">
		<div class="col-md-4 col-md-offset-4">
			<div class="panel panel-warning">
				<div class="panel-heading">
					<div class="panel-title">Acceso Restringido</div>
				</div>
				<div class="panel-body">
					<img src="{{ asset('img/admin/error_access.png') }}" alt="" class="img-responsive center-block">
					<hr>
					<strong class="text-center">
						<p class="text-center">Usted no tiene Acceso a esta Zona.</p>
						<p>
							<a href="{{ route('front.index') }}">¿Desea Volver al inicio?</a>
						</p>
					</strong>
				</div>
			</div>
		</div>
	</div>
</body>
</html>