<?php
include('../conexiones/conexion.php');
	
	
$id_juego = $_POST['id_juego'];
$nombre_juego = $_POST['nombre_juego'];
$descripcion = $_POST['descripcion'];
$plataforma = $_POST['plataforma'];
$genero = $_POST['genero'];
$desarrollador = $_POST['desarrollador'];
$precio = $_POST['precio'];
$fecha_creacion = $_POST['fecha_creacion'];
$clave = $_POST['clave'];

$uploadOk = 1;
$rutaImagen = '';

if (isset($_FILES['imagen']['tmp_name']) && !empty($_FILES['imagen']['tmp_name'])) {
    $targetDir = "../assets/imgs/";
    $targetFile = $targetDir . basename($_FILES["imagen"]["name"]);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["imagen"]["tmp_name"]);
    if ($check !== false) {
        echo "El archivo es una imagen válida - " . $check["mime"] . ".";
        $uploadOk = 1;
        if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $targetFile)) {
            $rutaImagen = $targetFile;
        } else {
            echo "Lo siento, hubo un error al subir tu archivo.";
            $uploadOk = 0;
        }
    } else {
        echo "El archivo no es una imagen válida.";
        $uploadOk = 0;
    }
}

$query = "UPDATE juegos 
          SET nombre_juego='$nombre_juego', descripcion='$descripcion', plataforma='$plataforma', genero='$genero',  desarrollador='$desarrollador', precio= '$precio', fecha_creacion='$fecha_creacion', clave = '$clave'";

if (!empty($rutaImagen)) {
    $query .= ", imagen = '$rutaImagen'";
}

$query .= " WHERE id_juego='$id_juego'"; 

$execute = $mysqli->query($query) or die(mysqli_error($mysqli));

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
                <?php if ($execute) { ?>
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
