
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>No tiene permisos</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/main.css') }}">
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			@include('normal.template.partials.nav')

		</div>
		<section class="text-center">
				<div >
					<img src="{{'/images/homero.jpg'}}" alt="pagina no encontrada" class="homero">
				</div>
  				<h1>No tiene permisos ...</h1>
				<a href="{{ route('admin.index') }}">Regresar al panel</a>   
				
		</section>
		
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
	
</body>
</html>