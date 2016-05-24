<?php


      //validamos si hay errores.
      if(!isset($error)) {
          $queryLogin = sprintf("SELECT id, nombre, apellidos, email, password, fotoPerfil, nivel FROM tblUsuarios WHERE id = '%s'",
                mysql_real_escape_string(trim($_SESSION['userID']))
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
                $_SESSION['userFoto'] =$resultado['fotoPerfil'];
                
          }else {
                $error[] = "El password es incorrecto... intentalo de nuevo";
                echo "<script type=\"text/javascript\">alert(\"El password es incorrecto\");</script>";
           }
          }else {
                $error[] = "No se encontro el email... Verifica tus datos";
                echo "<script type=\"text/javascript\">alert(\"No existe un registro de este email\");</script>";
          }  
      }
?>