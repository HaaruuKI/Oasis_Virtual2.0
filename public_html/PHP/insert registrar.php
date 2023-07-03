
<!-- Insertar los datos de "Registrar" -->
<?php
// Crea una conexion en la base de datos
$mysqli = new mysqli("localhost", "root", "", "oasis_virtual");

// Verifica si la conexion fue exitosa
if ($mysqli->connect_error) {
  die("Conexion fallida: " . $mysqli->connect_error);
}

// Obtiene los datos de el fomulario HTML

$usuario = $_POST["usuario"];
$fecha_nacimiento = $_POST["fecha_nacimiento"];
$contraseña = $_POST["contraseña"];
$numero_telefono = $_POST["numero_telefono"];
$pais = $_POST["pais"];

// Insertar los datos a la base de datos
$sql = "INSERT INTO cliente (usuario, fecha_nacimiento, contraseña, numero_telefono, pais)
VALUES ('$usuario', '$fecha_nacimiento', '$contraseña','$numero_telefono','$pais')";

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