<?php
//Activamos la variable de sesión
session_start();
//Capturamos el valor de la var_sesion (autenticado)
$autenti= isset ($_SESSION["autentificado"])? $_SESSION["autentificado"]:NULL;
//Validamos si corresponde a los datos de valida.php
if($autenti != '#--%*_!@-¡'){
	//
	session_destroy();
	header("Location: index.php");
	exit();
}
?>
