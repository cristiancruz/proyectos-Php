@extends('admin.template.main')

@section('title','listar articulos')

@section('content')
<a href="{{ route('admin.articles.create')}}" class="btn btn-success">Registrar articulo</a></br></br>
<div class="table-responsive">
<table class=" table table-striped text-center">
	<thead>
		<th class="text-center">ID</th>
		<th class="text-center">Titulo</th>
		<th class="text-center"> Categorias</th>
		<th class="text-center">User</th>
		<th class="text-center">Accion</th>
	</thead>
	<tbody>	
		@foreach($articles as $article)
		<tr>	
			<td>{{ $article->id }}</td>
			<td>{{ $article->title}}</td>
			<td>{{ $article->category->name}}</td>
			<td>{{ $article->user->name}}</td>
			<td>
				<a href="{{ route('admin.articles.edit', $article->id)}}" class="btn btn-warning">Editar</a>
				<a href="{{ route('admin.articles.destroy', $article->id) }}" onclick="return confirm('Seguro que desea eliminarlo')" class="btn btn-danger">Borrar</a> 
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
</div>
<div class="text-center">
	{!! $articles->render() !!}
</div>
@endsection 