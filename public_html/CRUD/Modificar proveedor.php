<?php
include('../conexiones/conexion.php');
	
	$id = $_GET['id'];
	
	$sql = "SELECT * FROM proveedores WHERE id_pro = '$id'";
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
				<h3 style="text-align:center">MODIFICAR PROVEEDOR</h3>
			</div>
			
			<form class="form-horizontal" method="POST" action="Update proveedor.php" autocomplete="off">
				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Nombre</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nombre_pro" name="nombre_pro" placeholder="Nombre" value="<?php echo $row['nombre_pro']; ?>" required>
					</div>
				</div>
				
				<input type="hidden" id="id" name="id_pro" value="<?php echo $row['id_pro']; ?>">
				
				<div class="form-group">
					<label for="apellido" class="col-sm-2 control-label">Apellido</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="apellidos_pro" name="apellido_pro" placeholder="Apellido" value="<?php echo $row['apellido_pro']; ?>"  required>
					</div>
				</div>
				
				<div class="form-group">
					<label for="empresa" class="col-sm-2 control-label">Empresa</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="empresa" name="empresa" placeholder="Empresa" value="<?php echo $row['empresa']; ?>" required>
					</div>
				</div>
				<div class="form-group">
					<label for="direccion" class="col-sm-2 control-label">Direccion</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion" value="<?php echo $row['direccion']; ?>" required>
					</div>
				</div>
				<div class="form-group">
					<label for="telefono" class="col-sm-2 control-label">Telefono</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="tel" name="tel" placeholder="Telefono" value="<?php echo $row['tel']; ?>" required>
					</div>
				</div>
				<div class="form-group">
					<label for="correo" class="col-sm-2 control-label">Correo</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="correo" name="correo" placeholder="Correo" value="<?php echo $row['correo']; ?>" required>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<a href="/oasis_virtual/public_html/inventario/providers.php" class="btn btn-default">Regresar</a>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>