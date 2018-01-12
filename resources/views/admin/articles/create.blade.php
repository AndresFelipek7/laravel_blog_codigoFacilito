@extends('admin.template.main')

@section('title' , 'Agregar Articulo')

@section('content')
	{!! Form::open(['route' => 'articles.store' , 'method' => 'POST' , 'files' => true]) !!}
		<div class="form-group">
			{!! Form::label('title', 'Titulo') !!}
			{!! Form::text('title', null, ['class' => 'form-control' , 'placeholder' => 'Nombre del articulo...' , 'autofocus']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('category_id', 'Categorias') !!}
			{!! Form::select('category_id' , $categories,null ,['class' => 'form-control' , 'placeholder' => 'Seleccione una opcion' , 'required']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('content', 'Titulo') !!}
			{!! Form::textarea('content', null, ['class' => 'form-control' , 'placeholder' => 'Contenido del articulo....'] , 'required') !!}
		</div>

		<div class="form-group">
			{!! Form::label('tags', 'Tags') !!}
			{!! Form::select('tags[]' , $tags,null ,['class' => 'form-control select-tag' , 'multiple']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('image', 'Imagen') !!}
			{!! Form::file('image') !!}

		</div>

		<div class="form-group">
			{!! Form::submit('Agregar', ['class' => 'btn btn-primary']) !!}
		</div>
	{!! Form::close() !!}
@endsection

@section('js')
	<script>
		$(".select-tag").chosen({
			no_results_text: 'No se encontro el elemento buscado',
			placeholder_text_multiple: 'Seleccion Elemento',
			max_selected_options: 6
		});
	</script>
@endsection