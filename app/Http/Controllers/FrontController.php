<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Carbon\Carbon;
use App\Category;
use App\Tag;

class FrontController extends Controller
{
	/*El metodo constructor nos sirve para colocar codigo que se va ha utilizar en otros metodos de este archvio sin necesidad de copiar varias veces ese codigo es decir , que nos ahorra lineas de codigo*/
	public function __construct(){
		Carbon::setlocale('es');
	}

	public function index(){
		$articles = Article::orderBy('id' , 'DESC')->paginate(4);
		$articles->each(function ($articles){
			$articles->category;
			$articles->images;
		});
		return view('front.index')->with('articles' , $articles);
	}

	public function searchCategory($name){
		/*Con el metodo first lo que hacemos es convertir una coleccion a un objeto siempre y cuando el nombre de la categoria sea unico*/
		$category = Category::SearchCategory($name)->first();
		$articles = $category->articles()->paginate(4);
		$articles->each(function ($articles){
			$articles->category;
			$articles->images;
		});
		return view('front.index')->with('articles' , $articles);
	}

	public function searchTag($name){
		$tag = Tag::SearchTag($name)->first();
		$articles = $tag->articles()->paginate(4);
		$articles->each(function ($articles){
			$articles->category;
			$articles->images;
		});
		return view('front.index')->with('articles' , $articles);
	}

	public function viewArticle($slug){
		$article = Article::findBySlugOrFail($slug);
		$article->category;
		$article->user;
		$article->tags;
		$article->images;

		return view('front.article')->with('article' , $article);
	}
}
