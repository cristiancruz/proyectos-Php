<?php

$servidor = 'localhost';
$baseDatos = 'dbteachme';
$usuarioBD = 'root';
$passwordBD = '151113';

$connLocalhost = mysql_connect($servidor, $usuarioBD, $passwordBD) 
	or trigger_error(mysql_error(), E_USER_ERROR);

mysql_query("SET NAMES 'utf8'");

mysql_select_db($baseDatos, $connLocalhost);

?>