<?php
	include('conexion.php');
	
	
	$id_juego = $_POST['id_juego'];
	$nombre_juego = $_POST['nombre_juego'];
	$descripcion = $_POST['descripcion'];
	$plataforma = $_POST['plataforma'];
	$genero = $_POST['genero'];
	$desarrollador = $_POST['desarrollador'];
	$precio = $_POST['precio'];
	$descuento = $_POST['descuento'];
	$cantidad = $_POST['cantidad'];
	$fecha_creacion = $_POST['fecha_creacion'];
	$imagen = $_FILES['imagen']['tmp_name'];

$targetDir = "../assets/imgs/";
$targetFile = $targetDir . basename($_FILES["imagen"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["imagen"]["tmp_name"]);
    if ($check !== false) {
        echo "El archivo es una imagen válida - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "El archivo no es una imagen válida.";
        $uploadOk = 0;
    }
}
if ($uploadOk == 0) {
    echo "Lo siento, tu archivo no fue actualizado.";

} else {
    if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $targetFile)) {

	$rutaImagen = $targetFile;

	$query="UPDATE juegos 
	SET nombre_juego='$nombre_juego', descripcion='$descripcion', plataforma='$plataforma', genero='$genero',  desarrollador='$desarrollador', precio= '$precio',descuento= '$descuento',  cantidad= '$cantidad', fecha_creacion='$fecha_creacion', imagen = '$rutaImagen' WHERE id_juego='$id_juego'"; 
    $execute = $mysqli->query($query) or die(mysqli_error($mysqli));

        if ($mysqli->query($query) === TRUE) {
            echo "La imagen ha sido actualizada correctamente.";
        } else {
            echo "Error al actualizar la imagen: " ;
        }
    } else {
        echo "Lo siento, hubo un error al subir tu archivo.";
    }
}

	
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
					<?php if($execute) { ?>
						<h3>REGISTRO MODIFICADO</h3>
						<?php } else { ?>
						<h3>ERROR AL MODIFICAR</h3>
					<?php } ?>
					
					<a href="../inventario/products.php" class="btn btn-primary">Regresar</a>
					
				</div>
			</div>
		</div>
	</body>
</html>
