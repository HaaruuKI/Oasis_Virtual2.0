<?php
// Conexión a la base de datos
$conexion = mysqli_connect('localhost', 'root', '', 'oasis_virtual2.0');

// Verificar si se recibió el parámetro "id" en la URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta para eliminar la fila con el ID especificado
    $consulta = "DELETE FROM proveedores WHERE id_pro = $id";
    $result = mysqli_query($conexion, $consulta);

    
} else {
    echo "No se proporcionó un ID válido.";
}


// Cerrando la conexión a la base de datos
mysqli_close($conexion);

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
				<?php if($result) { ?>
				<h3>REGISTRO ELIMINADO</h3>
				<?php } else { ?>
				<h3>ERROR AL ELIMINAR</h3>
				<?php } ?>
				
				<a href="/oasis_virtual/public_html/inventario/providers.php" class="btn btn-primary">Regresar</a>
				
				</div>
			</div>
		</div>
	</body>
</html>

