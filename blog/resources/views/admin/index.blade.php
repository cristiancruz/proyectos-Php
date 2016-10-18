@extends('admin.template.main')

@section('title') 
Home
@endsection

@section('content')
	<hr>
    <h1>Bienvenidos al panel de administracion</h1>
    <hr>
    <a href="{{ route('admin.articles.create')}}">Crear un nuevo articulo</a> | <a href="{{ route('admin.tags.create')}}">Crear nuevo tag</a>

@endsection
