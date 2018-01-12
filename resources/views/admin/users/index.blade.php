@extends('admin.template.main')

@section('title' , 'Lista de Usuarios')

@section('content')
	<a href="{{ route('users.create') }}" class="btn btn-info">Registrar Nuevo Usuario</a><hr>
	<table class="table table-striped">
		<thead>
			<th>ID</th>
			<th>Nombre</th>
			<th>Correo</th>
			<th>Tipo</th>
			<th>Accion</th>
		</thead>
		<tbody>
			@foreach ($users as $user)
				<tr>
					<td>{{ $user->id }}</td>
					<td>{{ $user->name }}</td>
					<td>{{ $user->email }}</td>
					<td>
						@if ($user->type == "admin")
							<span class="label label-danger">Administrador</span>
						@else
							<span class="label label-primary">Miembro</span>
						@endif
					</td>
					<td>
						<a href="{{ route('users.edit' , $user->id) }}" class="btn btn-warning glyphicon glyphicon-pencil"></a>
						<a href="{{ route('admin.users.destroy',$user->id) }}" onclick="return confirm('¿Seguro que deseas eliminarlo?')" class="btn btn-danger glyphicon glyphicon-remove"></a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<div class="text-center">
		{{-- Esto es para que funcione la paginacion en la vista --}}
		{!! $users->render(); !!}
	</div>

@endsection