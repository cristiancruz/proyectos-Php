@extends('admin.template.main')
@section('title','Listar tags')


@section('content')
<a href="{{ route('admin.tags.create')}}" class="btn btn-success">Registrar tag</a>
<!-- BUSCADOR -->
{!! Form::open(['route'=>'admin.tags.index', 'method'=>'GET', 'class'=>'navbar-form pull-right']) !!}
<div class="input-group">
	{!! Form::text('name',null,['class'=>'form-control','placeholder'=>'buscador de tags','aria-describedby'=>'search']) !!}
	<span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden=true></span></span>
</div>

{!! Form::close() !!}
<hr>
<!-- FIN BUSCADOR -->
<div class="table-responsive">
	<table class="table table-striped text-center">
	<thead >
		<th class="text-center">Id</th>
		<th class="text-center">Nombre</th>
		<th class="text-center">Opciones</th>
	</thead>
	<tbody>
		@foreach($tags as $tag)
		<tr>
			<td>{{$tag->id}}</td>
			<td>{{$tag->name}}</td>
			<td>
				<a href="{{ route('admin.tags.edit', $tag->id)}}" class="btn btn-warning">Editar</a>
				<a href="{{route('admin.tags.destroy',$tag->id)}}" onclick="return confirm('Seguro que desea eliminarlo')" class="btn btn-danger">Borrar</a> 
			</td>
		</tr>
		@endforeach
	</tbody>
		
	</table>
</div>
<div class="text-center">{!! $tags->render() !!}</div>

@endsection