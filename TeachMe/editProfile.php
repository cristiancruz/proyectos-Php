<?php
//Iniciamos la session
if(!isset($_SESSION)) {
  session_start();
  if(!isset($_SESSION['userEmail']) && $_SESSION['userEmail'] = "") header("Location: index.php");

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
		<div class="area-tit">
		 <p class="TFormulario">Edición de perfil</p>
		 <p class="SFormulario">mantén tus datos actualizados</p>    	
			<div id="formulario">
						 <form action="editProfile.php" method="post">
                        
                                <input class="cajasTexto" type="text" name="nombre" required value="<?php echo $_SESSION['userName'] ?>" placeholder="Nombre" />

                                <input class="cajasTexto" type="text" name="apellidos" required value="<?php echo $_SESSION['userApellidos'] ?>" placeholder="Apellidos" /><br /><br /><br />

                                <input class="cajasTextoL" type="email" name="email" required value="<?php echo $_SESSION['userEmail'] ?>" placeholder="Email"/><br /><br /><br />
                      
                                <input class="cajasTexto" required type="password" name="password" placeholder="Password" />
                                 <input class="cajasTexto" required type="password" name="password2" placeholder="Repetir password" /><br /><br /><br />
                                  <input  name="guardar" type="submit" class="botonG"  value="Guardar cambios">
                              
                      </form>    	
			</div>
		</div>
		   
		
		
</body>
</html>