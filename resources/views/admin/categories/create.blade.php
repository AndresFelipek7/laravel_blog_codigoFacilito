@extends('admin.template.main')

@section('title' , 'Agregar Categoria')

@section('content')
	{!! Form::open(['route' => 'categories.store' , 'method' => 'POST']) !!}
		<div class="form-group">
			{!! Form::label('name' , 'Nombre') !!}
			{!! Form::text('name', null, ['class' => 'form-control' , 'placeholder' => 'Ingrese nombre' , 'required' , 'autofocus']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
		</div>

	{!! Form::close() !!}
@endsection