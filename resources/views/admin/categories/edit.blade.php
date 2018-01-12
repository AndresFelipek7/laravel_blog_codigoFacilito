@extends('admin.template.main')

@section('title' , 'Editar Categoria '.$categories->name)

@section('content')
	{!! Form::open(['route' => ['categories.update' , $categories] , 'method' => 'PUT']) !!}
		<div class="form-group">
			{!! Form::label('name' , 'Nombre') !!}
			{!! Form::text('name', $categories->name, ['class' => 'form-control' , 'placeholder' => 'Ingrese nombre' , 'required' , 'autofocus']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Editar', ['class' => 'btn btn-primary']) !!}
		</div>

	{!! Form::close() !!}
@endsection