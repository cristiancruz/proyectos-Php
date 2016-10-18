<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> @yield('title','Viury.informando')</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/main.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/awesome/font-awesome.min.css') }}">
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-12 header-log">
			@include('normal.template.partials.nav')

		</div>
		
			<div class="col-md-8">
				<section>
					@yield('content')
				</section>
			</div>
			<div class="col-md-4" id="aside">
				@include('normal.template.partials.aside')
			</div>
		
		
	</div>
	<hr>
	<footer>
			<div class="row">
				<div class="col-md-12 text-center" >{{ trans('app.title_date')}}</div>
				<div class="col-md-12 text-center" >Cristian Alejandro Quijda Cruz</div>
			</div>
	</footer>
	
</div>
	
	<script type="text/javascript" src="{{asset('plugins/jquery/js/jquery.js')}}"></script>
	<script type="text/javascript" src="{{asset('plugins/bootstrap/js/bootstrap.js')}}"></script>
	<script type="text/javascript" src="{{asset('plugins/main.js')}}"></script>
	
</body>
</html>