<?php
	
	require 'conexion.php';
	
	$Nombre = $_POST['Nombre'];
	$Apellidos = $_POST['Apellidos'];
	$Curp = $_POST['Curp'];
	
	
	$sql = "INSERT INTO datos_del_proveedor 
	(nombre_proveedor, apellidos_proveedor, curp_proveedor) 
	VALUES ('$Nombre', '$Apellidos', '$Curp')";
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
						<h3>REGISTRO GUARDADO</h3>
						<?php } else { ?>
						<h3>ERROR AL GUARDAR</h3>
					<?php } ?>
					
					<a href="/oasis_virtual/public_html/inventario/providers.php" class="btn btn-primary">Regresar</a>
					
				</div>
			</div>
		</div>
	</body>
</html>
