@extends('admin.template.main')

@section('title' , 'Lista de Tags')

@section('content')
	<a href="{{ route('tags.create') }}" class="btn btn-info">Registrar nuevo tag</a>
	{{-- Buscardor de Tags --}}
		{!! Form::open(['route' => 'tags.index' , 'method' => 'GET' , 'class' => 'navbar-form pull-right']) !!}
			<div class="input-group">
				{!! Form::text('name', null , ['class' => 'form-control' , 'placeholder' => 'Buscar Tag...' , 'aria-describedby' => 'search'] ) !!}
				<span class="input-group-addon glyphicon glyphicon-search" id="search"></span>
			</div>
		{!! Form::close() !!}
	{{-- Fin del Buscador --}}
	<hr>
	<table  class="table table-striped">
		<thead>
			<th>ID</th>
			<th>Nombre</th>
			<th>Acción</th>
		</thead>
		<tbody>
			@foreach ($tags as $tag)
			<tr>
				<td>{{ $tag->id }}</td>
				<td>{{ $tag->name }}</td>
				<td>
					<a href="{{ route('tags.edit' , $tag->id) }}" class="btn btn-warning glyphicon glyphicon-pencil"></a>
					<a href="{{ route('admin.tags.destroy' , $tag->id) }}" onclick="return confirm('¿Seguro que deseas eliminarlo?')" class="btn btn-danger glyphicon glyphicon-remove"></a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<div class="text-center">
		{{ $tags->render() }}
	</div>
@endsection