@extends('admin.template.main')

@section('title',' Listar categorias')

@section('content')
<a href="{{ route('admin.categories.create')}}" class="btn btn-success">Registrar categoria</a></br></br>
<div class="table-responsive">
<table class="table table-striped text-center">
	<thead >
		<th class="text-center">Id</th>
		<th class="text-center">Nombre</th>
		<th class="text-center">Opciones</th>
	</thead>
	<tbody>
		@foreach($category as $categories)
		<tr>
			<td>{{$categories->id}}</td>
			<td>{{$categories->name}}</td>
			<td>
			<a href="{{ route('admin.categories.edit', $categories->id)}}" class="btn btn-warning">Editar</a>
				<a href="{{ route('admin.categories.destroy', $categories->id) }}" onclick="return confirm('Seguro que desea eliminarlo')" class="btn btn-danger">Borrar</a> 
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
</div>
<div class="text-center">
	{!! $category->render() !!}
</div>


	
		
@endsection