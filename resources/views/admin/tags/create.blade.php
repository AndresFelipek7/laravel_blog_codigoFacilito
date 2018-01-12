@extends('admin.template.main')

@section('title' , 'Agregar Tag')

@section('content')
	{!! Form::open(['route' => 'tags.store' , 'method' => 'POST']) !!}
		<div class="from-group">
			{!! Form::label('name', 'Nombre') !!}
			{!! Form::text('name', null, ['class' => 'form-control' , 'required' , 'placeholder' => 'Nombre del tag' , 'autofocus']) !!}<br>
		</div>
		<div class="form-group">
			{!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
		</div>
	{!! Form::close() !!}
@endsection