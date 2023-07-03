<!-- Insertar los datos de "Registrarse administrador" -->
<?php
// Crea una conexion en la base de datos
$mysqli = new mysqli("localhost", "root", "", "oasis_virtual");

// Verifica si la conexion fue exitosa
if ($mysqli->connect_error) {
  die("Conexion fallida: " . $mysqli->connect_error);
}

// Obtiene los datos de el fomulario HTML

$correo_admin = $_POST["correo_admin"];
$nombre_admin = $_POST["nombre_admin"];
$apellido_admin = $_POST["apellido_admin"];
$telefono_admin = $_POST["telefono_admin"];
$contraseña_admin = $_POST["contraseña_admin"];
$pais_admin = $_POST["pais_admin"];
$direccion_admin = $_POST["direccion_admin"];

// Insertar los datos a la base de datos
$sql = "INSERT INTO administrador (correo_admin, nombre_admin, apellido_admin, telefono_admin, contraseña_admin, pais_admin, direccion_admin)
VALUES ('$correo_admin','$nombre_admin', '$apellido_admin', '$telefono_admin','$contraseña_admin','$pais_admin','$direccion_admin')";

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