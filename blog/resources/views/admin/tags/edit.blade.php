@extends('admin.template.main')

@section('title','editar tag')

@section('content')
{!! Form::open(['route'=> ['admin.tags.update',$tag->id],'method'=>'PUT']) !!}
<div class="form-group">
	{!! Form::label('name','Nombre') !!}
	{!! Form::text('name',$tag->name,['class'=>'form-control','placeholder'=>'Nombre del tag','required']) !!}
</div>
<div class="form-group">
	{!! Form::submit('Actualizar',['class'=>'btn btn-primary']) !!}
</div>

{!! Form::close() !!}
@endsection
