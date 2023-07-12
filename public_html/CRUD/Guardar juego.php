<?php
require_once('conexion.php');

$nombre_juego = $_POST['nombre_juego'];
$descripcion = $_POST['descripcion'];
$plataforma = $_POST['plataforma'];
$genero = $_POST['genero'];
$desarrollador = $_POST['desarrollador'];
$precio = $_POST['precio'];
$descuento = $_POST['descuento'];
$cantidad = $_POST['cantidad'];
$fecha_creacion = $_POST['fecha_creacion'];

$genero = implode(",", $genero);

if(isset($_REQUEST['submit'])){
    $nombre_imagenes = $_FILES['imagen']['name'];
    $temporal = $_FILES['imagen']['tmp_name'];
    $carpeta = '../assets/imgs';
    $ruta = $carpeta.'/'.$nombre_imagenes;
    
    move_uploaded_file($temporal,$carpeta.'/'. $nombre_imagen);

    $query="INSERT INTO juegos (nombre_juego, descripcion,plataforma, genero, desarrollador, precio, descuento, cantidad, fecha_creacion, imagen) 
    VALUES('$nombre_juego', '$descripcion', '$plataforma', '$genero', '$desarrollador', '$precio', '$descuento', '$cantidad', '$fecha_creacion','$ruta')";
    $execute = mysqli_query($mysqli,$query) or die(mysqli_error($mysqli));

    if($execute){
        header("Location: ../inventario/products.php");
    }else{
        echo "hubo un error"; 
    }
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
