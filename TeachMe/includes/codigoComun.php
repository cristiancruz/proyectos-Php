<?php

if(isset($_GET['logOff']) && $_GET['logOff'] == 'true') {
	session_destroy();
	header("Location: index.php?loggedOut=true");
}

function printMsg($msg, $type){

echo "<div class=\"mensaje $type\">";
if(is_array($msg)){
	echo "<ul>";
	foreach ($msg as $contenedor => $contenido) {
		echo "<li>$contenido</li>";
	}
	echo "</ul>";
}
else {
	echo $msg;
}
echo "</div>";

}

?>