@extends('admin.template.main')

@section('title' , 'Editar Articulo ' . $article->title)

@section('content')
	{!! Form::open(['route' => ['articles.update' , $article] , 'method' => 'PUT']) !!}
		<div class="form-group">
			{!! Form::label('title', 'Titulo') !!}
			{!! Form::text('title', $article->title, ['class' => 'form-control' , 'placeholder' => 'Nombre del articulo...' , 'autofocus']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('category_id', 'Categorias') !!}
			{!! Form::select('category_id' , $categories , $article->category->id ,['class' => 'form-control' , 'placeholder' => 'Seleccione una opcion' , 'required']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('content', 'Titulo') !!}
			{!! Form::textarea('content', $article->content, ['class' => 'form-control' , 'placeholder' => 'Contenido del articulo....'] , 'required') !!}
		</div>

		<div class="form-group">
			{!! Form::label('tags', 'Tags') !!}
			{!! Form::select('tags[]' , $tags,$myTags ,['class' => 'form-control select-tag' , 'multiple']) !!}
		</div>

		<div class="form-group">
			{!! Form::submit('Editar', ['class' => 'btn btn-warning']) !!}
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