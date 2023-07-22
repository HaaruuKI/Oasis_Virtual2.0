<?php
	
	include('../conexiones/conexion.php');
	
	$id_usuario = $_POST['id_usuario'];
	$nombre_usuario = $_POST['nombre_usuario'];
	$pais_usuario = $_POST['pais_usuario'];
	$correo_usuario = $_POST['correo_usuario'];
	$contraseña_usuario = $_POST['contraseña_usuario'];

	$sql = "UPDATE usuario
	SET nombre_usuario='$nombre_usuario', pais_usuario='$pais_usuario', correo_usuario='$correo_usuario', contraseña_usuario='$contraseña_usuario' WHERE id_usuario = '$id_usuario'";
	$resultado = $mysqli->query($sql);
	
?>

<html lang="es">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.css" rel="stylesheet">
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<div class="row" style="text-align:center">
					<?php if($resultado) { ?>
						<h3>REGISTRO MODIFICADO</h3>
						<?php } else { ?>
						<h3>ERROR AL MODIFICAR</h3>
					<?php } ?>
					
					<a href="/oasis_virtual/public_html/inventario/user.php" class="btn btn-primary">Regresar</a>
					
				</div>
			</div>
		</div>
	</body>
</html>
