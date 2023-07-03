<?php
	
	require 'conexion.php';
	
	$id = $_POST['id_pro'];
	$nombre_pro = $_POST['nombre_pro'];
	$apellido_pro = $_POST['apellido_pro'];
	$empresa = $_POST['empresa'];
	$direccion = $_POST['direccion'];
	$tel = $_POST['tel'];
	$correo = $_POST['correo'];

	$sql = "UPDATE proveedores
	SET nombre_pro='$nombre_pro', apellido_pro='$apellido_pro', empresa='$empresa', direccion='$direccion', tel='$tel', correo='$correo'  WHERE id_pro = '$id'";
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
					
					<a href="/oasis_virtual/public_html/inventario/providers.php" class="btn btn-primary">Regresar</a>
					
				</div>
			</div>
		</div>
	</body>
</html>
