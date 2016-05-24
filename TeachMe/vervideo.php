<?php
//Iniciamos la session
if(!isset($_SESSION)) {
  session_start();
  if(!isset($_SESSION['userEmail']) && $_SESSION['userEmail'] = "") header("Location: index.php");

}
require_once('conexiones/conexion.php');
include('includes/codigoComun.php');
//Traemos todos los usuarios de la BD
$queryUserSearch = sprintf("SELECT nombreVideo, nombreAutor, descripcion FROM tblVideos WHERE ruta LIKE '%s'",
	mysql_real_escape_string(trim("%".$_GET['ruta']."%"))
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
	
	<link rel="stylesheet" href="css/home.css">
	<link rel="stylesheet" href="css/normal.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript" src="jwplayer/jwplayer.js"></script>	
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

		
 		 
<div class="container">

		<div class="row">

				<div class="col-xs-12">

					<h3><?php echo $userData['nombreVideo']?></h3>
					

						<div id="myElement"></div>
						<script> jwplayer("myElement").setup({
	        			file : "<?php echo $_GET['ruta']?>",
	        			
						width: 640,
	       				height: 360
	  					  });
						</script>
					<p> <?php echo $userData['descripcion']?></p>
				</div>
				
			<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.3";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
				
	<div class="fb-comments" data-href="http://developers.facebook.com/docs/plugins/comments/" data-width="600" data-numposts="5" data-colorscheme="light"></div>

		
		</div>
</div>
		
		
</body>
</html>
