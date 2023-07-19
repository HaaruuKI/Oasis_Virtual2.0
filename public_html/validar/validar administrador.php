<?php
// Obtiene los datos de el formulario HTML
$correo_admin=$_POST['correo_admin'];
$contraseña_admin = $_POST['contraseña_admin'];
// Hace la verificación de inciar sesion
session_start();
$_SESSION['correo_admin'] = $correo_admin;

// Crea una conexion en la base de datos de MySQL
$conexion =mysqli_connect("localhost","root","","oasis_virtual2.0");

// Hace un select para verificar si donde nombre_admin con esta en la base de datos hace los mismo con contraseña_admin
$consulta="SELECT * FROM administrador WHERE correo_admin= '$correo_admin' AND  contraseña_admin='$contraseña_admin'";
$resultado=mysqli_query($conexion, $consulta);

$filas=mysqli_num_rows($resultado);

// Si si cumple con lo requisitos de lo que piden, te redirige a la pagina para registrar los juegos
if($filas){
  header("Location: /oasis_virtual/public_html/inventario/home.php");
  //Si no cumple con lo requirido, te redirige a la misma donde se encuntran
}else{
  ?>
  <?php
  include("Iniciar Sesion administrador.html");
  ?>
  <h1 class="bad">Error en la autenticacion</h1>
  <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);