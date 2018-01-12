<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ArticleRequest;
use Laracasts\Flash\Flash;
use App\Category;
use App\Tag;
use App\Article;
use App\Image;


class ArticlesController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		$articles = Article::search($request->title)->orderBy('id' , 'DESC')->paginate(3);
		$articles->each(function($articles){
			$articles->category;
			$articles->user;
		});

		return view('admin.articles.index')->with('articles' , $articles);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		/*El metodo pluck es el metodo encargado para poder enviar una objeto de tipo lista a la vista*/
		$categories = Category::orderBy('name' , 'ASC')->pluck('name','id');
		$tags = Tag::orderBy('name' , 'ASC')->pluck('name','id');
		return view('admin.articles.create')->with('categories' , $categories)->with('tags' , $tags);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(ArticleRequest $request)
	{
		/*Manipulacion de Imagenes*/
		$file = $request->file('image');
		$name ='blogfacilito_' . time() .'.' . $file->getClientOriginalExtension();
		$path = public_path() . '/img/admin/articles';
		$file->move($path, $name);

		$article = new Article($request->all());
		//$article->user_id = \Auth::user()->id;
		$article->user_id = "2";
		$article->save();

		//Hacemos referencia a tags() que es la relacion que se tiene entre tags y articulos y con la funcion sync lo que nos ayuda es insertar la informacion en la tabla pivvot
		$article->tags()->sync($request->tags);

		$image = new Image();
		$image->name = $name;
		//Hacemos referencia con article() a la relacion que se tiene en el modelo Image con esa tabla , luego con la funcion associate lo que haceos es pasarle el objeto de los articulos y el se encargara de asociar el id de la tala de articulos con el id de articulos en la tabla images
		$image->article()->associate($article);
		$image->save();

		Flash::success('Se ha creado el articulo '. '<strong>'.$article->title.'</strong>'.' de forma Satisfactoria!!!');
		return redirect()->route('articles.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//Buscamos el articulo con el id
		$article = Article::find($id);
		//Llamamos a la relacion entre articulos y categorias
		$article->category;
		//Creamos un objeto de todas las categorias y las listamos por medio de la funcion pluck
		$categories = Category::orderBy('name' , 'DESC')->pluck('name' , 'id');
		$tags = Tag::orderBy('name' , 'DESC')->pluck('name' , 'id');

		$myTags = $article->tags->pluck('id')->ToArray();

		return view('admin.articles.edit')->with('article' , $article)->with('categories' , $categories)->with('tags' , $tags)->with('myTags' , $myTags);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		$article = Article::find($id);
		$article->fill($request->all());
		$article->save();

		$article->tags()->sync($request->tags);
		Flash::warning('El articulo '. '<strong>'. $article->title .'</strong>'.' Se ha actualizado con exito!!');
		return redirect()->route('articles.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$article = Article::find($id);
		$article->delete();

		Flash::error('El articulo '. $article->title .' Ha sido eliminado con exito!!!');
		return redirect()->route('articles.index');
	}
}
