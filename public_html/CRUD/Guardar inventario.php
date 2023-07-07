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


// Obtener los datos enviados por el formulario
    $id_inventario = $_POST['id_inventario'];
    $id_juego = $_POST['id_juego'];
    $nombre_juego = $_POST['nombre_juego'];
    $cantidad = $_POST['cantidad'];

// Preparar la consulta de inserción
$sql = "INSERT INTO inventario (id_inventario, id_juego, nombre_juego, cantidad)
        VALUES ('$id_inventario', '$id_juego', '$nombre_juego', '$cantidad')";
$resultado = ($conexion->query($sql) === TRUE);
// Ejecutar la consulta de inserción
if ($conexion->query($sql) === TRUE) {
    
} else {
    echo "Error al agregar el juego: " . $conexion->error;
}
 // Insertar los datos en la tabla juegos
$sql_juegos = "INSERT INTO juegos (id_juego, nombre_juego) VALUES ('$id_juego', '$nombre_juego')";
if ($conexion->query($sql) === TRUE) {
	echo "Los datos se insertaron correctamente en la tabla juegos.";
} else {
	echo "Error al insertar datos en la tabla juegos: " . $conexion->error;
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
					
					<a href="/oasis_virtual/public_html/inventario/inventory.php" class="btn btn-primary">Regresar</a>
					
				</div>
			</div>
		</div>
	</body>
</html>
