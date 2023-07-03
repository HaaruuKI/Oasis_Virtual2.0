<?php
	
	$mysqli = new mysqli('localhost', 'root', '', 'oasis_virtual2.0');
	
	if($mysqli->connect_error){
		
		die('Error en la conexion' . $mysqli->connect_error);
		
	}
?>