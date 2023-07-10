
<!-- Insertar los datos de "Registrar" -->
<?php
// Crea una conexion en la base de datos
$mysqli = new mysqli("localhost", "root", "", "oasis_virtual2.0");

// Verifica si la conexion fue exitosa
if ($mysqli->connect_error) {
  die("Conexion fallida: " . $mysqli->connect_error);
}

// Obtiene los datos de el fomulario HTML


$nombre_usuario = $_POST["nombre_usuario"];
$pais_usuario = $_POST["pais_usuario"];
$correo_usuario = $_POST["correo_usuario"];
$contraseña_usuario = $_POST["contraseña_usuario"];

// Insertar los datos a la base de datos
$sql = "INSERT INTO usuario (nombre_usuario, pais_usuario, correo_usuario, contraseña_usuario)
VALUES ('$nombre_usuario', '$pais_usuario','$correo_usuario','$contraseña_usuario')";

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