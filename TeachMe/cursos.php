<?php
//Iniciamos la session
if(!isset($_SESSION)) {
  session_start();
  if(!isset($_SESSION['userEmail']) && $_SESSION['userEmail'] = "") header("Location: index.php");

}
require_once('conexiones/conexion.php');
include('includes/codigoComun.php');
$imagen1="";
$imagen2="";
$imagen3="";
$imagen4="";

$curso1="";
$curso2="";
$curso3="";
$curso4="";

$href1="";
$href2="";
$href3="";
$href4="";

if($_GET['curso']=="programacion"){ 
	$imagen1= "img/android.png";
	$imagen2= "img/java.png";
	$imagen3= "img/python.png";
	$imagen4= "img/swift.png";

	$curso1="ANDROID";
	$curso2="JAVA";
	$curso3="PYTHON";
	$curso4="SWIFT";

	$href1="videos.php?curso=android";
	$href2="videos.php?curso=java";
	$href3="videos.php?curso=python";
	$href4="videos.php?curso=swift";
}
if($_GET['curso']=="web"){ 
	$imagen1= "img/html5.png";
	$imagen2= "img/js.png";
	$imagen3= "img/php.png";
	$imagen4= "img/css3.png";

	$curso1="HTML5";
	$curso2="JAVASCRIPT";
	$curso3="PHP";
	$curso4="CSS3";

	$href1="videos.php?curso=html5";
	$href2="videos.php?curso=javascript";
	$href3="videos.php?curso=php";
	$href4="videos.php?curso=css3";
}
if($_GET['curso']=="diseno"){ 
	$imagen1= "img/photoshop.png";
	$imagen2= "img/coreldraw.png";


	$curso1="PHOTOSHOP";
	$curso2="CORELDRAW";

	$href1="videos.php?curso=photoshop";
	$href2="videos.php?curso=coreldraw";
	
	
}
if($_GET['curso']=="fotografia"){ 
	
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="description" content="Página donde puedes aprender distintos lenguajes de programación">
    <meta rel= "keywords" content="Videos tutoriales gratuitos" >
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/home.css">
	<link rel="stylesheet" href="css/normal.css">
	<title>TeachMe</title>
</head>
<body>
	
		<div id="menu">
			<header>
			<?php include('includes/menu-button.php'); ?> 
			 <div class="logo"><a href="home.php"><img  class="logo-tm" src="img/logo-tm.png" alt=""></a></a></div>
               <div  class="userName"><?php echo $_SESSION['userName']." ".$_SESSION['userApellidos'] ?></a></div>
		</header>
		</div>


			<?php if($imagen1 != ""){ ?>
				<div class="container">
					<h1>CURSOS</h1>
			<div class="row linea">
			<div class="col-xs-6 ">
					<h4><?php echo "$curso1" ?></h4>
					<a href='<?php echo "$href1" ?>'><img src='<?php echo "$imagen1" ?>' alt="Curso" class="img-rounded efec" /></a> 
				</div>
				<?php  } ?>
				
				<?php if($imagen2 != ""){ ?>
				<div class="col-xs-6">
					<h4><?php echo "$curso2" ?></h4>
					<a href='<?php echo "$href2" ?>'><img src='<?php echo "$imagen2" ?>' alt="Curso" class="img-rounded efec" /></a> 
				</div>
				<?php  } ?>

			</div>
			<?php if($imagen3 != ""){ ?>
			<div class="row linea">
				<div class="col-xs-6">
					<h4><?php echo "$curso3" ?></h4>
					<a href='<?php echo "$href3" ?>'><img src='<?php echo "$imagen3" ?>' alt="Curso" class="img-rounded efec" /></a> 

				</div>
				<?php  } ?>

				<?php if($imagen4 != ""){ ?>
				<div class="col-xs-6">
					<h4><?php echo "$curso4" ?></h4>
					<a href='<?php echo "$href4" ?>'><img src='<?php echo "$imagen4" ?>' alt="Curso" class="img-rounded efec" /></a> 
				</div>
				<?php  } ?>

			</div>
		</div>
		



		
		
</body>
</html>