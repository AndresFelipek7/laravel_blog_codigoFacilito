@extends('admin.template.main')

@section('title' , 'Lista de Categorias')

@section('content')
	<a href="{{ route('categories.create') }}" class="btn btn-info">Regitro nueva Categoria</a><hr>
	<table class="table table-striped">
		<thead>
			<th>Id</th>
			<th>Nombre</th>
			<th>Accion</th>
		</thead>
		<tbody>
			@foreach ($categories as $category)
				<tr>
					<td>{{ $category->id }}</td>
					<td>{{ $category->name }}</td>
					<td>
						<a href="{{ route('categories.edit' , $category->id) }}" class="btn btn-warning glyphicon glyphicon-pencil"></a>
						<a href="{{ route('admin.categories.destroy' , $category->id) }}" onclick="return confirm('¿Seguro que deseas eliminarlo?')" class="btn btn-danger glyphicon glyphicon-remove"></a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<div class="text-center">
		{{ $categories->render() }}
	</div>
@endsection