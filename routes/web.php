<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//RUTAS DEL FRONTEND
Route::get('/', [
	'as' => 'front.index' ,
	'uses' => 'FrontController@index'
]);

Route::get('categories/{name}' , [
	'uses' => 'FrontController@searchCategory',
	'as' => 'front.search.category'
]);

Route::get('tags/{name}' , [
	'uses' => 'FrontController@searchTag',
	'as' => 'front.search.tag'
]);

Route::get('articles/{slug}' , [
	'uses' => 'FrontController@viewArticle' ,
	'as' => 'front.view.article'
]);


//RUTAS DEL PANEL DE ADMINISTRACION
/*Route::group(['prefix' => 'admin' , 'middleware' => ['auth']] , function (){*/
Route::group(['prefix' => 'admin' , 'middleware' => ['admin']] , function (){
	Route::get('/' , ['as' => 'admin.index' , function (){
		return view('admin.index');
	}]);


	/*
	//Esta es la forma de por hacer hacer el filtro en las rutas donde solo cuando cumpla el filtro del middlware admin puede ver est grupo de rutas de usuarios sino va ha permanecer oculto
	Route::group(['middleware' => 'admin'] , function(){

		Route::resource('users','UsersController');
		Route::get('users/{id}/destroy' , [
			'uses' => 'UsersController@destroy',
			'as' => 'admin.users.destroy'
		]);

	});*/

	Route::resource('users','UsersController');
	Route::get('users/{id}/destroy' , [
		'uses' => 'UsersController@destroy',
		'as' => 'admin.users.destroy'
	]);

	Route::resource('categories' , 'CategoriesController');
	Route::get('categories/{id}/destroy' , [
		'uses' => 'CategoriesController@destroy',
		'as' => 'admin.categories.destroy'
	]);

	Route::resource('tags' , 'TagsController');
	Route::get('tags/{id}/destroy' , [
		'uses' => 'TagsController@destroy',
		'as' => 'admin.tags.destroy'
	]);

	Route::resource('articles' , 'ArticlesController');
	Route::get('articles/{id}/destroy' , [
		'uses' => 'ArticlesController@destroy',
		'as' => 'admin.articles.destroy'
	]);

	Route::get('images' , [
		'uses' => 'ImagesController@index',
		'as' => 'admin.images.index'
	]);
});
