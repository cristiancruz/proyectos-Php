<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//RUTAS DE USUARIOS NORMALES-LECTORES

/*Route::get('/',['as' => 'normal.index', function(){
	return view('normal.index');
}]);*/

Route::get('/',
	['as' => 'normal.index', 
	'uses' => 'NormalController@index'
	]);
Route::get('categories/{name}',[
	'uses'=>'NormalController@searchCategory',
	'as'=> 'normal.search.category'

	]);
Route::get('tags/{name}',[
	'uses'=>'NormalController@searchTag',
	'as'=> 'normal.search.tag'

	]);
Route::get('articles/{id}',[
	'uses' => 'NormalController@viewArticle',
	'as' => 'normal.view.article'

	]);
//RUTAS DE ADMINISTRACION


Route::group(['prefix' =>'admin','middleware' =>'auth'],function(){

	Route::get('/',['as'=>'admin.index', function() {
    return view('admin.index');//welcome

}]);
//VALIDACION PARA NEGAR OPCIONES DE USUARIO SI NO ES DE TIPO ADMIN
	Route::group(['middleware'=>'admin'], function(){

		Route::resource('users','UsersController');
		
		Route::get('users/{id}/destroy', [
		'uses' => 'UsersController@destroy',
		'as' => 'admin.users.destroy'
		]);

	});
	
	Route::resource('categories','CategoriesController');

	Route::get('categories/{id}/destroy', [
	'uses' => 'CategoriesController@destroy',
	'as' => 'admin.categories.destroy'
	]);

	Route::resource('tags','TagsController');

	Route::get('tags/{id}/destroy', [
	'uses' => 'TagsController@destroy',
	'as' => 'admin.tags.destroy'
	]);

	Route::resource('articles','ArticlesController');
	Route::get('articles/{id}/destroy', [
	'uses' => 'ArticlesController@destroy',
	'as' => 'admin.articles.destroy'
	]);

	Route::get('images',[
		'uses' => 'ImagesController@index',
		'as' => 'admin.images.index'
		]);

});

	Route::get('admin/auth/login', [
		'uses' => 'Auth\AuthController@getLogin',
		'as' => 'admin.auth.login'
		]);
	Route::post('admin/auth/login', [
		'uses' => 'Auth\AuthController@postLogin',
		'as' => 'admin.auth.login'
		]);
	/*
	Route::get('auth/logout', 'Auth\AuthController@logout');
	solo se cambia "getLogout" por  "logout" abajo
	 */
	Route::get('admin/auth/logout', [
		'uses' => 'Auth\AuthController@logout',
		'as' => 'admin.auth.logout'
		]);

