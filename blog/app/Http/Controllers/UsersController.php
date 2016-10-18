<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Http\Requests\UserRequest;

class UsersController extends Controller
{
    public function index(){
    	$users = User::orderBy('id','ASC')->paginate(5);
    	return view('admin.users.index')->with('users', $users);
    }
    public function create(){
    	return view('admin.users.create');
    }
    public function store(UserRequest $request){
    	//dd($request->all());
    	$user = new User($request->all());
    	$user->password =bcrypt($request->password);
    	$user->save();
        return redirect()->route('admin.users.index')->with('mensajetrue',"Usuario ".$user->name." creado exitosamente!");
    
    }
     public function destroy($id){
        $users = User::find($id);
        $users->delete();
        return redirect()->route('admin.users.index')->with('mensajefalse',"Usuario eliminado exitosamente!");
    }
    public function edit($id){
       // dd($id);
        $user = User::find($id);
       return view('admin.users.edit')->with('user', $user);
    }
    public function update(Request $request, $id){
       $user = User::find($id);
       $user->name = $request->name;
       $user->email = $request->email;
       $user->type = $request->type;
       // $user->fill($request->all());
       $user->save();
       
        return redirect()->route('admin.users.index')->with('mensajeedit',"Usuario ".$user->name." editado exitosamente!");
    }
}
