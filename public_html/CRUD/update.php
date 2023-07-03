<?php
	
	require 'conexion.php';
	
	$id = $_req['id'];
	$Nombre = $_req['nombre_proveedor'];
	$Apellidos = $_req['apellidos_proveedor'];
	$Curp = $_req['curp_proveedor'];
	
	
	$sql = "UPDATE datos_del_proveedor 
	SET nombre_proveedor='$Nombre', apellidos_proveedor='$Apellidos', curp_proveedor='$Curp' WHERE id = '$id'";
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
					
					<a href="index.php" class="btn btn-primary">Regresar</a>
					
				</div>
			</div>
		</div>
	</body>
</html>
