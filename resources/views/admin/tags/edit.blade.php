@extends('admin.template.main')

@section('title' , 'Editar Tag '.$tag->name)

@section('content')
	{!! Form::open(['route' => ['tags.update' , $tag] , 'method' => 'PUT']) !!}
		<div class="from-group">
			{!! Form::label('name', 'Nombre') !!}
			{!! Form::text('name', $tag->name, ['class' => 'form-control' , 'required' , 'placeholder' => 'Nombre del tag' , 'autofocus']) !!}<br>
		</div>
		<div class="form-group">
			{!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
		</div>
	{!! Form::close() !!}
@endsection