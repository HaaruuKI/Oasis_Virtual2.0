<?php
include('../conexiones/conexion.php');

$nombre_juego = $_POST['nombre_juego'];
$descripcion = $_POST['descripcion'];
$plataforma = $_POST['plataforma'];
$genero = $_POST['genero'];
$desarrollador = $_POST['desarrollador'];
$precio = $_POST['precio'];
$fecha_creacion = $_POST['fecha_creacion'];
$clave = $_POST['clave'];

$genero = implode(",", $genero);

if(isset($_REQUEST['submit'])){
    $nombre_imagenes = $_FILES['imagen']['name'];
    $temporal = $_FILES['imagen']['tmp_name'];
    $carpeta = '../assets/imgs';
    $ruta = $carpeta.'/'.$nombre_imagenes;
    
    move_uploaded_file($temporal,$carpeta.'/'. $nombre_imagen);

    $query="INSERT INTO juegos (nombre_juego, descripcion,plataforma, genero, desarrollador, precio, fecha_creacion, imagen, clave) 
    VALUES('$nombre_juego', '$descripcion', '$plataforma', '$genero', '$desarrollador', '$precio', '$fecha_creacion','$ruta','$clave')";
    $execute = mysqli_query($mysqli,$query) or die(mysqli_error($mysqli));

	if ($execute) {
        // Obtener el "id_juego" recién insertado
        $id_juego = mysqli_insert_id($mysqli);

        // Insertar el juego en la tabla "inventario"
        $query_inventario = "INSERT INTO inventario (id_juego) VALUES ('$id_juego')";
        $execute_inventario = mysqli_query($mysqli, $query_inventario) or die(mysqli_error($mysqli));

        if ($execute_inventario) {
            header("Location: ../inventario/products.php");
        } else {
            echo "hubo un error al agregar a inventario";
        }
    } else {
        echo "hubo un error";
    }
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
					
					<a href="/oasis_virtual/public_html/inventario/products.php" class="btn btn-primary">Regresar</a>
					
				</div>
			</div>
		</div>
	</body>
</html>
