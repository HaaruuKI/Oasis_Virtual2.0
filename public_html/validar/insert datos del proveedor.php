<?php
// Crea una conexion en la base de datos
$mysqli = new mysqli("localhost", "root", "", "oasis_virtual");

// Verifica si la conexion fue exitosa
if ($mysqli->connect_error) {
  die("Conexion fallida: " . $mysqli->connect_error);
}

// Obtiene los datos de el fomulario HTML

$nombre_proveedor = $_POST["nombre_proveedor"];
$apellidos_proveedor = $_POST["apellidos_proveedor"];
$curp_proveedor = $_POST["curp_proveedor"];

// Insertar los datos a la base de datos
$sql = "INSERT INTO datos_del_proveedor (nombre_proveedor, apellidos_proveedor, curp_proveedor)
VALUES ('$nombre_proveedor', '$apellidos_proveedor', '$curp_proveedor')";

// Corre el query
$result = $mysqli->query($sql);

// Verifica si el query corrio existosamente
if ($result) {
  echo "Los datos fueron salvados exitosamente";
} else {
  echo "Error al salvar los datos: " . $mysqli->error;
}

// Cierra la conexion en la base de datos
$mysqli->close();

?>