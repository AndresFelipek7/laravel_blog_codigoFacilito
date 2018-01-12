<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title' , 'Default') | Panel de Administracion</title>
	<link rel="stylesheet" href="{{ asset('plugins/Bootstrap/css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ asset('css/general.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/Chosen/chosen.css') }}">
</head>
<body class="admin-body">
	@include('admin.template.partials.nav')

	<section class="section-admin">
		<div class="panel panel-default">
			<div class="panel panel-heading">
				<h3 class="panel.title">@yield('title')</h3>
			</div>
			<div class="panel-body">
				@include('flash::message')
				@include('admin.template.partials.errors')
				@yield('content')
			</div>
		</div>
	</section>

	<footer class="admin-footer">
		<nav class="nav nav-default">
			<div class="container-fluid">
				<div class="collapse navbar-collapse">
					<p class="navbar-text">Todos los derechos reservados &copy {{ date('Y') }}</p>
					<p class="navbar-text navbar-right"><b>Codigo Facilito</b></p>
				</div>
			</div>
		</nav>
	</footer>

	<script src="{{ asset('plugins/Jquery/js/jquery-1.12.3.js') }}"></script>
	<script src="{{ asset('plugins/Bootstrap/js/bootstrap.js') }}"></script>
	<script src="{{ asset('plugins/Chosen/chosen.jquery.js') }}"></script>

	@yield('js')
</body>
</html>