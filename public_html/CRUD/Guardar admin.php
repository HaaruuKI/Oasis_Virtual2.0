<?php
// Conexión a la base de datos
include('../conexiones/conexion.php');

// Verificar la conexión
if ($mysqli->connect_error) {
    die("Error de conexión a la base de datos: " . $mysqli->connect_error);
}

// Obtener los valores del formulario
$correo_admin = $_POST['correo_admin'];
$nombre_admin = $_POST['nombre_admin'];
$apellido_admin = $_POST['apellido_admin'];
$tel_admin = $_POST['tel_admin'];
$contraseña_admin = $_POST['contraseña_admin'];
$pais_admin = $_POST['pais_admin'];
$direccion_admin = $_POST['direccion_admin'];
$rol = 2;
// Preparar la consulta de inserción
$sql = "INSERT INTO administrador (correo_admin, nombre_admin, apellido_admin, tel_admin, contraseña_admin, pais_admin, direccion_admin, rol)
        VALUES ('$correo_admin', '$nombre_admin', '$apellido_admin', '$tel_admin', '$contraseña_admin', '$pais_admin', '$direccion_admin','$rol')";
$resultado = ($mysqli->query($sql) === TRUE);
// Ejecutar la consulta de inserción
if ($mysqli->query($sql) === TRUE) {
    
} else {
    echo "Error al agregar el juego: " . $mysqli->error;
}

// Cerrar la conexión a la base de datos
$mysqli->close();
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
					
					<a href="../inventario/admin.php" class="btn btn-primary">Regresar</a>
					
				</div>
			</div>
		</div>
	</body>
</html>
