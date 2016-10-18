<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Tag;
use App\Http\Requests\TagRequest;

class TagsController extends Controller
{
	public function index(Request $request){
		//$tags = Tag::orderBy('id','DESC')->paginate(2);
    $tags = Tag::search($request->name)->orderBy('id','DESC')->paginate(4);
    	return view('admin.tags.index')->with('tags', $tags);
    }
    public function create(){
    	return view('admin.tags.create');
    }
    public function store(TagRequest $request){
    	$tag = new Tag($request->all());
    	$tag->save();

    	return redirect()->route('admin.tags.index')->with('mensajetrue',"Tag ".$tag->name." creado!");
    }
    public function destroy($id){
    	$tag = Tag::find($id);
    	$tag->delete();
    	return redirect()->route('admin.tags.index')->with('mensajefalse',"Tag eliminado exitosamente!");
    }
    public function edit($id){
	$tag = Tag::find($id); 
	return view('admin.tags.edit')->with('tag',$tag);
    }
    public function update(Request $request, $id){
    	$tag = Tag::find($id);
    	$tag->fill($request->all());
    	$tag->save();
    	return redirect()->route('admin.tags.index')->with('mensajeedit',"Tag ".$tag->name." editado exitosamente!");
    }
 
}
