<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Article;
use App\Category;
use App\Tag;
use Carbon\Carbon;
class NormalController extends Controller
{
	public function __construct(){
		Carbon::setLocale('es');
	}
    public function index(){

    	$articles = Article::OrderBy('id','DESC')->paginate(4);
    	$articles->each(function($articles){
    		$articles->category;
    		$articles->images;
    	});

        $category = Category::all();
        $tags = Tag::all();
       //$category = Category::OrderBy('id','DESC')->paginate(6);
       // $tags = Tag::OrderBy('name','ASC')->paginate(6);

    	return view('normal.index')
    	->with('articles',$articles)
        ->with('category',$category)
        ->with('tags',$tags);

    }
    public function searchCategory($name){

       $category = Category::SearchCategory($name)->first();

       $articles = $category->articles()->paginate(4);

       $articles->each(function($articles){
            $articles->category;
            $articles->images;
        });
       $category = Category::all();
        $tags = Tag::all();
       return view('normal.index')
        ->with('articles',$articles)
        ->with('category',$category)
        ->with('tags',$tags);
    }

    public function searchTag($name){

        $tag = Tag::SearchTag($name)->first();
        $articles = $tag->articles()->paginate(4);

        $articles->each(function($articles){
            $articles->category;
            $articles->images;
        });
        
        $category = Category::all();
        $tags = Tag::all();

       return view('normal.index')
        ->with('articles',$articles)
        ->with('category',$category)
        ->with('tags',$tags);

    }

    public function viewArticle($id){
      $article = Article::find($id);
      $article->category;
      $article->user;
      $article->tags;
      $article->images;

      $category = Category::all();
      $tags = Tag::all();

     return view('normal.article')
     ->with('article',$article)
     ->with('category',$category)
     ->with('tags',$tags);
    }
}
