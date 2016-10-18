<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

 class UserRequest extends Request
{
    public function authorize(){
    	return true;
    }

    public function rules(){
    	return[
    	'name' =>'min:4|max:30|required',
    	'email' =>'min:8|max:30|required|unique:users',
    	'password' =>'min:4|max:30|required|'

    	];
    }
}
