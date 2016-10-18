<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category;
use App\Http\Requests\CategoryRequest;

class CategoriesController extends Controller
{
    public function index(){
    	$category = Category::orderBy('id','DESC')->paginate(4);
    	return view('admin.categories.index')->with('category', $category);

    }
    public function create(){
    	return view('admin.categories.create');
    }
    public function store(CategoryRequest $request){
        $category = new Category($request->all());
        $category->save();
        return redirect()->route('admin.categories.index')->with('mensajetrue',"Categoria ".$category->name." creado exitosamente!");
    }
    public function destroy($id){
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('admin.categories.index')->with('mensajefalse',"Categoria eliminada exitosamente!");
    }
     public function edit($id){
        $category = Category::find($id);
       return view('admin.categories.edit')->with('category', $category);
    }
    public function update(Request $request, $id){
       $category = Category::find($id);
       
       $category->fill($request->all());
       $category->save();
       
        return redirect()->route('admin.categories.index')->with('mensajeedit',"Categoria ".$category->name." editado exitosamente!");
    }
}
