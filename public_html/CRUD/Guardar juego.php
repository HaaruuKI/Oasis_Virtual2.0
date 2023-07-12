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
$nombre_juego = $_POST['nombre_juego'];
$descripcion = $_POST['descripcion'];
$plataforma = $_POST['plataforma'];
$genero = $_POST['genero'];
$desarrollador = $_POST['desarrollador'];
$precio = $_POST['precio'];
$descuento = $_POST['descuento'];
$cantidad = $_POST['cantidad'];
$fecha_creacion = $_POST['fecha_creacion'];
$imagen = $_POST['$imagen'];

$genero = implode(",", $genero);


// Preparar la consulta de inserción
$sql = "INSERT INTO juegos (nombre_juego, descripcion, plataforma, genero, desarrollador, precio, descuento, cantidad, fecha_creacion, imagen)
        VALUES ('$nombre_juego', '$descripcion', '$plataforma', '$genero', '$desarrollador', '$precio', '$descuento', '$cantidad', '$fecha_creacion', '$imagen')";
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
