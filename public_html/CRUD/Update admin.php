<?php
	
	include('../conexiones/conexion.php');
	
	$id = $_POST['id_admin'];
	$correo = $_POST['correo_admin'];
	$nombre = $_POST['nombre_admin'];
	$apellido = $_POST['apellido_admin'];
	$tel = $_POST['tel_admin'];
	$contraseña = $_POST['contraseña_admin'];
	$pais = $_POST['pais_admin'];
	$direccion = $_POST['direccion_admin'];


	$sql = "UPDATE administrador
	SET correo_admin='$correo', nombre_admin='$nombre', apellido_admin='$apellido', tel_admin='$tel', contraseña_admin='$contraseña', pais_admin='$pais', direccion_admin='$direccion' WHERE id_admin = '$id'";
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
					
					<a href="/oasis_virtual/public_html/inventario/admin.php" class="btn btn-primary">Regresar</a>
					
				</div>
			</div>
		</div>
	</body>
</html>
