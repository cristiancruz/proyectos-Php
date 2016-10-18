@extends('admin.template.main')

@section('title','Lista de usuarios')

@section('content')


<a href="{{ route('admin.users.create')}}" class="btn btn-success">Registrar nuevo usuario</a></br></br>
<div class="table-responsive">
<table class="table table-striped text-center">
	<thead>
		<th class="text-center">ID</th>
		<th class="text-center">Nombre</th>
		<th class="text-center">Correo</th>
		<th class="text-center">Tipo</th>
		<th class="text-center">Accion</th>
	</thead>
	<tbody>
		@foreach($users as $user)
		<tr>
			<td>{{$user->id}}</td>
			<td>{{$user->name}}</td>
			<td>{{$user->email}}</td>
			<td>
			@if($user->type=="admin")
				<span class="label label-danger">{{$user->type}}</span>
			@else
				<span class="label label-primary">{{$user->type}}</span>
			@endif
			
			</td>
			<td>
			<a href="{{ route('admin.users.edit', $user->id)}}" class="btn btn-warning">Editar</a>
				<a href="{{ route('admin.users.destroy', $user->id) }}" onclick="return confirm('Seguro que desea eliminarlo')" class="btn btn-danger">Borrar</a> 
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
</div>
<div class="text-center">
	{!! $users->render() !!}
</div>


@endsection