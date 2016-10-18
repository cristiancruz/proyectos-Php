<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ArticleRequest;

use App\Category;
use App\Tag;
use App\Article;
use App\Image;

class ArticlesController extends Controller
{
	 public function index(){
      $articles = Article::orderBy('id','DESC')->paginate(3);

      $articles->each(function($articles){
        $articles->category;
        $articles->user;
      });


    	return view('admin.articles.index')->with('articles',$articles);
    }
    public function create(){
    	$categories = Category::orderBy('name','ASC')->lists('name','id');//contenido - value
    	$tags = Tag::orderBy('name','ASC')->lists('name','id');

    	return view('admin.articles.create')
    	-> with('categories',$categories)
    	->with('tags',$tags);
    }
     public function store(ArticleRequest $request){
       //Manipulacion de imagenes
       
       if($request->file('image'))
       {
       $file = $request->file('image');

       $name = 'blogcristian_' . time() . '.' . $file->getClientOriginalExtension();
       $path = public_path() . '/images/articles/';
      
      $file->move($path, $name);
 	   }
      $article = new Article($request->all());
      $article->user_id = \Auth::user()->id;
      $article->save();

      //llenar tabla pigote
      $article->tags()->sync($request->tags);
      //
      
      $image = new Image();
      $image->name = $name; 
      $image->article()->associate($article);
      $image->save();
  	  
	return redirect()->route('admin.articles.index')->with('mensajetrue',"Articulo ".$article->name." creado exitosamente!");
    }
    public function edit($id){
      $article = Article::find($id);
      $article->category;

      $categories = Category::orderBy('name','DESC')->lists('name','id');
      $tags = Tag::orderBy('name','ASC')->lists('name','id');

      $my_tags = $article->tags->lists('id')->ToArray();// toArray transforma coleciones a array

      return view('admin.articles.edit')
      ->with('categories',$categories)
      ->with('article',$article)
      ->with('tags',$tags)
      ->with('my_tags',$my_tags);
    }
    public function update(Request $request , $id){
      $article = Article::find($id);
      $article->fill($request->all());
      $article->save();

      $article->tags()->sync($request->tags);

      return redirect()->route('admin.articles.index')->with('mensajeedit',"Articulo editado exitosamente!");
    }
    public function destroy($id){
      $article = Article::find($id);
      $article->delete();
      return redirect()->route('admin.articles.index')->with('mensajefalse',"Articulo eliminado exitosamente!");
    }
}




























