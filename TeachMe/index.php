<?php
if(!isset($_SESSION)) {
  session_start();
  if(isset($_SESSION['userEmail']) && $_SESSION['userEmail'] != "") header("Location: home.php");
}

require_once('conexiones/conexion.php');
include('includes/codigoComun.php');


//Validar si el botón fue presionados
if(isset($_POST['registrar'])) {
  //valida si los password coinciden
  if($_POST['password'] != $_POST['password2']){
   $error = "Los password no coinciden";
   echo "<script type=\"text/javascript\">alert(\"Los password no coinciden, por favor intenta de nuevo\");</script>";
  }
  
  //validamos si no existe algún error.
  if(!isset($error)) {
      //creamos la consulta para ver si el email no ha sido registrado con otro usuario.
      $queryCheckEmail = sprintf("SELECT id FROM tblUsuarios WHERE email = '%s'",
            mysql_real_escape_string(trim($_POST['email']))
      );

      //mandamos el query
      $resQueryCheckEmail = mysql_query($queryCheckEmail, $connLocalhost) or die ("No se pudo comprobar el email");

      //Verificamos si se econtró algun registro con el email
      if(mysql_num_rows($resQueryCheckEmail)) {
        $error[] = "El correo proporcionado ya existe";
        echo "<script type=\"text/javascript\">alert(\"El email ya ha sido registrado, intenta de nuevo por favor\");</script>";
        
      }
      else {
        //Insertamos los valores en la base de datos
        $queryUserRegister = sprintf("INSERT INTO tblUsuarios (nombre, apellidos, email, fotoPerfil, password, nivel) VALUES ('%s', '%s', '%s','fondo.jpg', '%s', 'normal')",
              mysql_real_escape_string(trim($_POST['nombre'])),
              mysql_real_escape_string(trim($_POST['apellidos'])),
              mysql_real_escape_string(trim($_POST['email'])),
              mysql_real_escape_string(trim($_POST['password']))
        ); 

        //enviamos el query
        $resQueryUserRegister = mysql_query($queryUserRegister, $connLocalhost) or die("No se pudo insertar en la BD..."); 
        //redireccionamos
        
        //traemos el registro que se acaba de hacer para loguearlo automaticamente
        $queryLogin = sprintf("SELECT id, nombre, apellidos, email, password, nivel FROM tblUsuarios WHERE email = '%s'",
              mysql_real_escape_string(trim($_POST['email']))
        ); 

        // obtenemos el resultado de la consulta
        $resQueryLogin = mysql_query($queryLogin, $connLocalhost) or die("Error de conexión");

        // Contamos el result set para determinar si se encontró el email
        if(mysql_num_rows($resQueryLogin)) {
            $resultado = mysql_fetch_assoc($resQueryLogin);
            // Comparamos el password proporcionado con el password en la BD
            if($_POST['password'] == $resultado['password']) {
                  $_SESSION['userID'] = $resultado['id'];
                  $_SESSION['userEmail'] = $resultado['email'];
                  $_SESSION['userName'] = $resultado['nombre'];
                  $_SESSION['userApellidos']=$resultado['apellidos'];
                 
                  $_SESSION['userLevel'] = $resultado['nivel'];
                  header("Location: home.php");
            }else {
                  $error[] = "El password es incorrecto... intentalo de nuevo";
                  echo "<script type=\"text/javascript\">alert(\"El password es incorrecto\");</script>";
             }
            }else {
                  $error[] = "No se encontro el email... Verifica tus datos";
                  echo "<script type=\"text/javascript\">alert(\"No existe un registro de este email\");</script>";
            }  
      }
  }
}
if(isset($_POST['login'])) {
      //validamos si existe campos vacíos
      foreach($_POST as $contenedor => $contenido) {
        if($contenido == "") $error[] = "$contenedor es un campo obligatorio";
      }

      //validamos si hay errores.
      if(!isset($error)) {
          $queryLogin = sprintf("SELECT id, nombre, apellidos, email, password, nivel FROM tblUsuarios WHERE email = '%s'",
                mysql_real_escape_string(trim($_POST['emailL']))
          ); 

      // obtenemos el resultado.
      $resQueryLogin = mysql_query($queryLogin, $connLocalhost) or die("Error de conexión");

          // Contamos el result set para determinar si se encontro el email
          if(mysql_num_rows($resQueryLogin)) {
              $resultado = mysql_fetch_assoc($resQueryLogin);
              // Comparamos el password proporcionado con el password en la BD
              if($_POST['password'] == $resultado['password']) {
                $_SESSION['userID'] = $resultado['id'];
                $_SESSION['userEmail'] = $resultado['email'];
                $_SESSION['userName'] = $resultado['nombre'];
                $_SESSION['userApellidos'] = $resultado['apellidos'];
                $_SESSION['userLevel'] = $resultado['nivel'];
                header("Location: home.php");
          }else {
                $error[] = "El password es incorrecto... intentalo de nuevo";
                echo "<script type=\"text/javascript\">alert(\"El password es incorrecto\");</script>";
           }
          }else {
                $error[] = "No se encontro el email... Verifica tus datos";
                echo "<script type=\"text/javascript\">alert(\"No existe un registro de este email\");</script>";
          }  
      }
  }
?>

<!DOCTYPE html>
<html>
    <div>
        <head>
        <meta charset="UTF-8">
        <meta name="description" content="Página donde puedes aprender distintos lenguajes de programación">
        <meta rel= "keywords" content="Videos tutoriales gratuitos" >
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <title>Bienvenido</title>
    </head>



    <body>

    <header>
            <div class="wrapper">
                
            <div class="logo">Teach<a>Me</a></div>
                <nav>
                    <form action="index.php" method="post">
                        <table>
                          <tr>   
                      
                             <td>
                                <label class="loginText" for="email">E-mail:</label>
                             </td>
                             <td>
                                <input class="loginCaja" type="email" name="emailL" required value="<?php echo (isset($_POST['emailL'])) ? $_POST['emailL'] : ''; ?>" placeholder="user@example.com"/>
                             </td>
                              <td> 
                                <label class="loginText" for="password">Password:</label>
                              </td>
                              <td>
                                <input class="loginCaja" required type="password" name="password"  placeholder="password"/>
                              </td>
                              <td>
                                <input  name="login" type="submit" class="botonL"  value="ENTRAR">
                              </td>
                          </tr>       

                        </table>
                      </form>
                </nav>
            </div>
        </header>

        <div class="wrapper">       
                <div class="TFormulario">Regístrate!</div>
        
                <div class="SFormulario">Es gratis y siempre lo será</div> <br /> 
                      
                 <nav>   
                      <form action="index.php" method="post">
                        <table>
                          <tr>
                             <td>
                                <label class="contenido" for="nombre">Nombre:</label>
                             </td>
                             <td>
                                <input class="cajasTexto" type="text" name="nombre" required value="<?php echo (isset($_POST['nombre'])) ? $_POST['nombre'] : ''; ?>" />
                             </td>
                          </tr>
                          <tr>
                             <td>
                                <label class="contenido" for="apellidos">Apellidos:</label>
                             </td>
                             <td>
                                <input class="cajasTexto" type="text" name="apellidos" required value="<?php echo (isset($_POST['apellidos'])) ? $_POST['apellidos'] : ''; ?>" />
                            </td>                           
                          </tr> 
                          <tr>   
                      
                             <td>
                                <label class="contenido" for="email">E-mail:</label>
                             </td>
                             <td>
                                <input class="cajasTexto" type="email" name="email" required value="<?php echo (isset($_POST['email'])) ? $_POST['email'] : ''; ?>" />
                             </td>
                          </tr>
                          <tr> 
                              <td> 
                                <label class="contenido" for="password">Password:</label>
                              </td>
                              <td>
                                <input class="cajasTexto" required type="password" name="password" />
                              </td>
                          </tr> 
                          <tr>
                              <td>
                                 <label class="contenido" for="password">Password:</label>
                              </td>
                              <td>
                                 <input class="cajasTexto" required type="password" name="password2" placeholder="Repetir password" />
                              </td>
                          </tr>
                          <tr>  

                              <td>
                              </td>
                              <td>
                                  <input  name="registrar" type="submit" id="boton"  value="REGISTRAR">
                              </td>
                          </tr>
                        </table>
                      </form>             
                  </nav>
                      
        </div> 

                
    </body>
    </div>
   


</html>