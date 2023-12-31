<?php
// Conexión a la base de datos
require_once('../conexiones/conexion.php');


// Obtener los valores del formulario
$nombre_usuario = $_POST['nombre_usuario'];
$pais_usuario = $_POST['pais_usuario'];
$correo_usuario = $_POST['correo_usuario'];
$contraseña_usuario = $_POST['contraseña_usuario'];
$rol = 1;

// Preparar la consulta de inserción
$sql = "INSERT INTO usuario (nombre_usuario, pais_usuario, correo_usuario, contraseña_usuario, rol)
        VALUES ('$nombre_usuario', '$pais_usuario', '$correo_usuario', '$contraseña_usuario', '$rol')";
$resultado = ($mysqli->query($sql) === TRUE);
// Ejecutar la consulta de inserción
if ($mysqli->query($sql) === TRUE) {
    // Registro exitoso, redirigir a la página de éxito después de 5 segundos
    echo '<script>
            setTimeout(function() {
                window.location.href = "../iniciar sesion usuario.html";
            }, 3000);
          </script>';
} else {
    // Error en el registro, redirigir a la página de error después de 5 segundos
    echo '<script>
            setTimeout(function() {
                window.location.href = "../registrar usuario.html";
            }, 3000);
          </script>';
}

// Cerrar la conexión a la base de datos
$mysqli->close();
?>

<html lang="es">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.css" rel="stylesheet">
		<link rel="stylesheet" href="css/style.css">
		
		<style>
			body{
				background-color: #1e1f26;
			}
		</style>
	</head>

	<body>	
		<div class="container">
			<div class="row">
				<div class="row">
					<?php if ($resultado) { ?>
<div class="circle">
	<div class="checkmark"></div>
</div>
						<h3 style="font-size: 4vw; color: white;" >REGISTRO GUARDADO</h3>
						<span style="color: white;" >Espere unos segundos esta siendo redireccionado...</span>
					<?php } else { ?>
<div class="circle-error">
	<div class="x-shape"></div>
</div>
						<h3 style="color: white" >ALGO SALIO MAL</h3>
					<?php } ?>
				</div>
			</div>
		</div>
	</body>
</html>
