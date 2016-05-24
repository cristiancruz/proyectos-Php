<?php

if(!isset($_SESSION)) {
  session_start();
  if(!isset($_SESSION['userEmail']) && $_SESSION['userEmail'] == "") header("Location: index.php");

}

require_once('conexiones/conexion.php');
include('includes/codigoComun.php');

if (isset($_POST['guardar'])) {
    $name=$_FILES['userfile']['name'] ;
    
    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $name)) {

        $queryVideoUpload = sprintf("INSERT INTO tblvideos (ruta, categoria, curso, nombreVideo, nombreAutor, descripcion) VALUES ('%s', '%s', '%s', '%s', '%s', '%s')",
            mysql_real_escape_string(trim($name)),
             mysql_real_escape_string(trim($_POST['categoria'])),
            mysql_real_escape_string(trim($_POST['cursos'])),
            mysql_real_escape_string(trim($_POST['nombreVideo'])),
             mysql_real_escape_string(trim($_POST['nombreAutor'])),
             mysql_real_escape_string(trim($_POST['descripcion']))
      ); 

      $resQueryVideoUploadResult = mysql_query($queryVideoUpload, $connLocalhost) 
        or die("No se pudo insertar en la BD...");
 echo "<script type=\"text/javascript\">alert(\"El video se subio exitosamente\");</script>";
  }  
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="description" content="Página donde puedes aprender distintos lenguajes de programación">
    <meta rel= "keywords" content="Videos tutoriales gratuitos" >
    	<link rel="stylesheet" href="css/home.css">
	<link rel="stylesheet" href="css/video.css">
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

<div class="formulario-video ">
	
	  <form method="post" action="cargarVideo.php" enctype="multipart/form-data">
                <input type="file" name="userfile" style="display:none;" id="botonFileReal">
                <input  class=" cajasTexto" type="text" name="nombreVideo" required placeholder="Nombre del video" />
                <input class=" cajasTexto"  type="text" name="nombreAutor" required placeholder="Autor" />
                <input type="button" value="Seleccionar video" onclick="document.getElementById('botonFileReal').click();" class="boton-video"><br />
                
                <select class=" cajasTexto" name="cursos">
                    <option value="Android">Android</option>
                    <option value="HTML5">HTML5</option>
                    <option value="Photoshop">Photoshop</option>
                    <option value="Ilustrator">Ilustrator</option>
                </select>

                <select class=" cajasTexto" name="categoria">
                    <option value="Desarrollo">Programacion</option>
                    <option value="Diseño">Diseño</option>
                    <option value="Web">Web</option>
                    <option value="Fotografia">Fotografia</option>
                </select>
                <input class=" cajasTexto" type="text" name="descripcion" required  placeholder="Descripción" /><br /><br /><br /><br /><br />

                <input  name="guardar" type="submit" class="video"  value="guardar">
               </form>
</div>
		
		
</body>
</html>