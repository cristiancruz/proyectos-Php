@extends('admin.template.main')

@section('title','Editar usuario')

@section('content')
	{!! Form::open(array('route' => ['admin.users.update',$user->id], 'method' => 'put')) !!}﻿
		<div class="form-group">
			{!! Form::label('name', 'Nombre') !!}
			{!! Form::text('name',$user->name, ['class'=>'form-control','placeholder'=>'Nombre completo','required'])!!}
		</div>
		<div class="form-group">
			{!! Form::label('email', 'Correo electronico') !!}
			{!! Form::email('email',$user->email, ['class'=>'form-control','placeholder'=>'example@gmail.com','required'])!!}
		</div>
	
		<div class="form-group">
			{!! Form::label('type','Tipo') !!}
			{!! Form::select('type',['member'=>'Miembro','admin'=>'Administrador'],$user->type,['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Actualizar',['class'=>'btn btn-primary']) !!}
		</div>
	{!! Form::close() !!}
	
@endsection