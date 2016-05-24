<?php
//Iniciamos la session
if(!isset($_SESSION)) {
  session_start();
  if(!isset($_SESSION['userEmail']) && $_SESSION['userEmail'] == "") header("Location: index.php");
 
}
require_once('conexiones/conexion.php');
include('includes/codigoComun.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="description" content="Página donde puedes aprender distintos lenguajes de programación">
    <meta rel= "keywords" content="Videos tutoriales gratuitos" >
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/home.css">
	<link rel="stylesheet" href="css/scroll.css">
	<link rel="stylesheet" href="css/animate.css">
	<title>TeachMe</title>
</head>
<body>
	<div id="vacio">
		<div id="menu">
			<header>
			<?php include('includes/menu-buttonAdmin.php'); ?> 
			 <div class="logo"><a href="home.php"><img  class="logo-tm" src="img/logo-tm.png" alt=""></a></a></div>
               <div  class="userName"><?php echo $_SESSION['userName']." ".$_SESSION['userApellidos'] ?></a></div>
		</header>
		</div>
		<!--AREA FOTO -->
		<div class="frases">
			
		<p class="titulo animated fadeIn retraso-1">APRENDE A TU RITMO</p>
		<p class="frase-normal animated fadeIn retraso-2">Cuando tu quieras, donde tu quieras!</p>	
		</div>
		
		<!-- FIN AREA FOTO-->
	</div>


		<div id="body">
		<div id="contenedor">
				<div class="container">
					<img src="img/flecha.png" class="img-flecha animated  bounceInDown retraso-3" alt="">
					<h1>CATEGORIAS</h1>

			<div class="row linea">
			<div class="col-xs-6 ">
					<h4>Programación</h4>
					<a href="cursos.php?curso=programacion"><img src="img/programacion.png" alt="Curso" class="img-rounded efec" /></a> 
				</div>
				<div class="col-xs-6">
					<h4>Web</h4>
					<a href="cursos.php?curso=web"><img src="img/web.png" alt="Curso" class="img-rounded efec" /></a> 
				</div>
			</div>
			<div class="row linea">
				<div class="col-xs-6">
					<h4>Diseño</h4>
						<a href="cursos.php?curso=diseno"><img src="img/diseño.png" alt="Curso" class="img-rounded efec" /></a> 

				</div>

				<div class="col-xs-6">
					<h4>Fotografía</h4>
					<a href="cursos.php?curso=fotografia"><img src="img/fotografia.png" alt="Curso" class="img-rounded efec" /></a> 
				</div>
			</div>
		</div>
</body>
</html>