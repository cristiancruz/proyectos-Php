
@if(Auth::user()==false)

<div class=" col-md-12 col-xs-12 header-login text-right">
	<a href="{{route('admin.auth.login')}}" class="btn btn-success btn-login ">{{trans('app.log_in')}}</a>			
</div>
@else
	<div class=" col-md-12 col-xs-12 header-login text-right">
	<a href="{{route('admin.auth.logout')}}" class="btn btn-success btn-login ">{{trans('app.log_out')}}</a>			
</div>

@endif

<div class="text-center" id="header-autor">

	<a href="{{ route('normal.index') }}">
		<img src="{{'/images/autor.jpg'}}" alt="foto del autor del sitio" class="img-responsive img-circle zoom" id="img-autor">
	</a>
	

	<h1>Blog <span class="title-web-page">Viury.informando</span></h1>
	<h5>cristian.quijadacruz@gmail.com</h3>
</div>
<hr>
