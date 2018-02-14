<nav class="navbar navbar-default">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#"><img src="{{ asset('img/admin/AtomFlower.png') }}" class="img-admin"></a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li class="active"><a href="#">Incio <span class="sr-only">(current)</span></a></li>
				<li><a href="{{ route('users.index') }}">Usuarios</a></li>
				<li><a href="{{ route('categories.index') }}">Categorias</a></li>
				<li><a href="{{ route('articles.index') }}">Articulos</a></li>
				<li><a href="{{ route('admin.images.index') }}">Imagenes</a></li>
				<li><a href="{{ route('tags.index') }}">Tags</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="{{ route('front.index') }}" target="_blank">Pagina Principal</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Opciones{{-- {{ Auth::user()->name }} --}} <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li>
							<a href="{{ route('logout') }}"
								onclick="event.preventDefault();
										 document.getElementById('logout-form').submit();">
								Cerrar Sesion
							</a>
							 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								{{ csrf_field() }}
							</form>
						</li>
						{{-- <li><a href="{{ route('logout') }}">Salir</a></li> --}}
					</ul>
				</li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>