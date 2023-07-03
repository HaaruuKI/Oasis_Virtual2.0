<?php
// Obtiene los datos de el formulario HTML
$usuario=$_POST['usuario'];
$contraseña= $_POST['contraseña'];
// Hace la verificación de inciar sesion
session_start();
$_SESSION['usuario'] = $usuario;

// Crea una conexion en la base de datos de MySQL
$conexion =mysqli_connect("localhost","root","","oasis_virtual");

// Hace un select para verificar si donde nombre_admin con esta en la base de datos hace los mismo con contraseña_admin
$consulta="SELECT * FROM cliente WHERE usuario= '$usuario' AND  contraseña='$contraseña'";
$resultado=mysqli_query($conexion, $consulta);

$filas=mysqli_num_rows($resultado);

// Si si cumple con lo requisitos de lo que piden, te redirige a la pagina para registrar los juegos
if($filas){
  header("Location: juegos.html");
  //Si no cumple con lo requirido, te redirige a la misma donde se encuntran
}else{
  ?>
  <?php
  include("Iniciar Sesion.html");
  ?>
  <h1 class="bad">Error en la autenticacion</h1>
  <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);