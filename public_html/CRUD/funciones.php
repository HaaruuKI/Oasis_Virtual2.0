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
?>