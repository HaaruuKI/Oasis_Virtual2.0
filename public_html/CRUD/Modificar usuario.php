<?php
	require 'conexion.php';
	
	$id = $_GET['id'];
	
	$sql = "SELECT * FROM usuario WHERE id_usuario = '$id'";
	$resultado = $mysqli->query($sql);
	$row = $resultado->fetch_array(MYSQLI_ASSOC);
	
?>
<html lang="es">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="cssss/bootstrap.min.css" rel="stylesheet">
		<link href="cssss/bootstrap-theme.css" rel="stylesheet">
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<h3 style="text-align:center">MODIFICAR USUARIO</h3>
			</div>
			
			<form class="form-horizontal" method="POST" action="Update usuario.php" autocomplete="off">
				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Nombre</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="nombre_usuario" placeholder="Usuario" value="<?php echo $row['nombre_usuario']; ?>" required>
					</div>
				</div>
				
				<input type="hidden" name="id_usuario" value="<?php echo $row['id_usuario']; ?>">
				
				<div class="form-group">
					<label for="apellido" class="col-sm-2 control-label">Apellido</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="pais_usuario" placeholder="Pais" value="<?php echo $row['pais_usuario']; ?>"  required>
					</div>
				</div>
				
				<div class="form-group">
					<label for="empresa" class="col-sm-2 control-label">Empresa</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="correo_usuario" placeholder="Correo" value="<?php echo $row['correo_usuario']; ?>" required>
					</div>
				</div>
				<div class="form-group">
					<label for="direccion" class="col-sm-2 control-label">Direccion</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="contraseña_usuario" placeholder="Contraseña" value="<?php echo $row['contraseña_usuario']; ?>" required>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<a href="/oasis_virtual/public_html/inventario/user.php" class="btn btn-default">Regresar</a>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>