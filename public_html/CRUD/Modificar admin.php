<?php
	require 'conexion.php';
	
	$id = $_GET['id'];
	
	$sql = "SELECT * FROM administrador WHERE id_admin = '$id'";
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
				<h3 style="text-align:center">MODIFICAR ADMINISTRADOR</h3>
			</div>
			
			<form class="form-horizontal" method="POST" action="Update admin.php" autocomplete="off">
				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Correo</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" name="correo_admin" placeholder="Correo" value="<?php echo $row['correo_admin']; ?>" required>
					</div>
				</div>
				
				<input type="hidden" name="id_admin" value="<?php echo $row['id_admin']; ?>">
				
				<div class="form-group">
					<label for="apellido" class="col-sm-2 control-label">Nombre</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="nombre_admin" placeholder="Nombre" value="<?php echo $row['nombre_admin']; ?>"  required>
					</div>
				</div>
				
				<div class="form-group">
					<label for="empresa" class="col-sm-2 control-label">Apellido</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="apellido_admin" placeholder="Apellido" value="<?php echo $row['apellido_admin']; ?>" required>
					</div>
				</div>
				<div class="form-group">
					<label for="direccion" class="col-sm-2 control-label">Telefono</label>
					<div class="col-sm-10">
						<input type="tel" class="form-control" name="tel_admin" placeholder="Telefono" value="<?php echo $row['tel_admin']; ?>" required>
					</div>
				</div>
				<div class="form-group">
					<label for="direccion" class="col-sm-2 control-label">Pais</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="pais_admin" placeholder="Pais" value="<?php echo $row['pais_admin']; ?>" required>
					</div>
				</div>
				<div class="form-group">
					<label for="direccion" class="col-sm-2 control-label">Direccion</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="direccion_admin" placeholder="Direccion" value="<?php echo $row['direcciom_admin']; ?>" required>
					</div>
				</div>
				<div class="form-group">
					<label for="direccion" class="col-sm-2 control-label">Contraseña</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" name="contraseña_admin" placeholder="Contraseña" value="<?php echo $row['contraseña_admin']; ?>" required>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<a href="/oasis_virtual/public_html/inventario/admin.php" class="btn btn-default">Regresar</a>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>