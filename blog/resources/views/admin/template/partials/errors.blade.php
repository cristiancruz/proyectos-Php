@if(count($errors) > 0)
	<div class="alert alert-success mensajesAll">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		@foreach($errors->all() as $error)
		<ul>
			<li> {{ $error }} </li>
		</ul>
			
		@endforeach
	</div>
@endif
@if(!session('mensajetrue')==null)
	<div class="alert alert-success mensajesAll">
	 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	{{session('mensajetrue')}}
	</div>
@endif

@if(!session('mensajefalse')==null)
	<div class="alert alert-danger mensajesAll">
	 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	{{session('mensajefalse')}}
	</div>
@endif

@if(!session('mensajeedit')==null)
	<div class="alert alert-success mensajesAll">
	 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	{{session('mensajeedit')}}
	</div>
@endif