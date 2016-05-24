<?php
//Iniciamos la session
if(!isset($_SESSION)) {
  session_start();
  if(!isset($_SESSION['userEmail']) && $_SESSION['userEmail'] = "") header("Location: index.php");

}
require_once('conexiones/conexion.php');
include('includes/codigoComun.php');

//Traemos todos los usuarios de la BD
$queryUserSearch = sprintf("SELECT ruta, nombreVideo, nombreAutor, descripcion FROM tblVideos WHERE curso LIKE '%s'",
	mysql_real_escape_string(trim("%".$_GET['curso']."%"))
  );
//Ejecutamos el query
$getUserSearch = mysql_query($queryUserSearch,$connLocalhost) or die ("No se pudo ejecutar la busquedadr34");
//Ejecutamos el primer fetch
$userData = mysql_fetch_assoc($getUserSearch);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="description" content="Página donde puedes aprender distintos lenguajes de programación">
    <meta rel= "keywords" content="Videos tutoriales gratuitos" >
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/home.css">
	<link rel="stylesheet" href="css/repo.css">
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

		
		<div id="body">
			
 		 <h3><?php echo $_GET['curso']?></h3>

		<?php
		

  		
  		do { ?>
         <li><br> <a href="vervideo.php?ruta=<?php echo $userData['ruta'] ?>">
<img clas="rep"src="img/play.png" alt="">
     </a>
         <p> <a href="vervideo.php?ruta=<?php echo $userData['ruta'] ?>"  > <?php  echo $userData['nombreVideo']?></a></p>


         <p> Autor: <?php echo $userData['nombreAutor']?></p>
         <p> Descripcion: <?php echo $userData['descripcion']?></p></br></br>
                  </li>
          
  		<?php 
			
  		} 
  		while($userData = mysql_fetch_assoc($getUserSearch));

  		
 
		?>
		
		</div>
		



		
		
</body>
</html>