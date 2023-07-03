<?php
	
// Configuración de la base de datos
$host = "localhost";
$usuario = "root";
$contrasena = "";
$base_datos = "oasis_virtual2.0";

// Conexión a la base de datos
$conexion = new mysqli($host, $usuario, $contrasena, $base_datos);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}

// Obtener los valores del formulario
$correo_admin = $_POST['correo_admin'];
$nombre_admin = $_POST['nombre_admin'];
$apellido_admin = $_POST['apellido_admin'];
$tel_admin = $_POST['tel_admin'];
$contraseña_admin = $_POST['contraseña_admin'];
$pais_admin = $_POST['pais_admin'];
$direccion_admin = $_POST['direccion_admin'];

// Preparar la consulta de inserción
$sql = "INSERT INTO administrador (correo_admin, nombre_admin, apellido_admin, tel_admin, contraseña_admin, pais_admin, direccion_admin)
        VALUES ('$correo_admin', '$nombre_admin', '$apellido_admin', '$tel_admin', '$contraseña_admin', '$pais_admin', '$direccion_admin')";
$resultado = ($conexion->query($sql) === TRUE);
// Ejecutar la consulta de inserción
if ($conexion->query($sql) === TRUE) {
    
} else {
    echo "Error al agregar el juego: " . $conexion->error;
}

// Cerrar la conexión a la base de datos
$conexion->close();
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
					
					<a href="/oasis_virtual/public_html/inventario/products.php" class="btn btn-primary">Regresar</a>
					
				</div>
			</div>
		</div>
	</body>
</html>
