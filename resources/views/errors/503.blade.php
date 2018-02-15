<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Acceso Denegado</title>
	<link rel="stylesheet" href="{{ asset('plugins/Bootstrap/css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ asset('css/general.css') }}">
</head>
<body class="admin-body">
	<div class="container text-center">
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
							<a href="{{ route('logout') }}"
								onclick="event.preventDefault();
										 document.getElementById('logout-form').submit();">
								¿Desea Volver al inicio?
							</a>
							 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								{{ csrf_field() }}
							</form>
						</p>
					</strong>
				</div>
			</div>
		</div>
	</div>
</body>
</html>