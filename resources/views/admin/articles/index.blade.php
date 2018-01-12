@extends('admin.template.main')

@section('title' , 'Listado de Articulos')

@section('content')
	<a href="{{ route('articles.create') }}" class="btn btn-info">Registrar Nuevo Articulo</a>
	{{-- Buscardor de Articulos --}}
		{!! Form::open(['route' => 'articles.index' , 'method' => 'GET' , 'class' => 'navbar-form pull-right']) !!}
			<div class="input-group">
				{!! Form::text('title', null , ['class' => 'form-control' , 'placeholder' => 'Buscar Articulo...' , 'aria-describedby' => 'search'] ) !!}
				<span class="input-group-addon glyphicon glyphicon-search" id="search"></span>
			</div>
		{!! Form::close() !!}
	{{-- Fin del Buscador --}}
	<hr>
	<table class="table table-striped">
		<thead>
			<th>ID</th>
			<th>Titulo</th>
			<th>Categoria</th>
			<th>Usuario</th>
			<th>Accion</th>
		</thead>
		<tbody>
			@foreach ($articles as $article)
				<tr>
					<td>{{ $article->id }}</td>
					<td>{{ $article->title }}</td>
					<td>{{ $article->category->name }}</td>
					<td>{{ $article->user->name }}</td>
					<td>
						<a href="{{ route('articles.edit' , $article->id) }}" class="btn btn-warning glyphicon glyphicon-pencil"></a>
						<a href="{{ route('admin.articles.destroy',$article->id) }}" onclick="return confirm('¿Seguro que deseas eliminarlo?')" class="btn btn-danger glyphicon glyphicon-remove"></a>
					</td>
				</tr>
			@endforeach

		</tbody>
	</table>

	<div class="text-center">
		{{ $articles->render() }}
	</div>
@endsection