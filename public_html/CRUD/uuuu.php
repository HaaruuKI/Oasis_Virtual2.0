<?php
// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "oasis_virtual2.0";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Verificar si se envió un formulario para guardar modificaciones
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos enviados por el formulario
    $id_inventario = $_POST['id_inventario'];
    $id_juego = $_POST['id_juego'];
    $nombre_juego = $_POST['nombre_juego'];
    $cantidad = $_POST['cantidad'];
    
    // Actualizar los registros en la base de datos
    for ($i = 0; $i < count($id_inventario); $i++) {
        $sql = "UPDATE inventario SET id_juego = '".$id_juego[$i]."', cantidad = '".$cantidad[$i]."' WHERE id_inventario = '".$id_inventario[$i]."'";
        $conn->query($sql);
    }
}

// Obtener el juego seleccionado para editar
if (isset($_GET['id'])) {
    $edit_id = $_GET['id'];
    $sql = "SELECT inventario.id_inventario, inventario.id_juego, juegos.nombre_juego, inventario.cantidad FROM inventario JOIN juegos ON inventario.id_juego = juegos.id_juego WHERE inventario.id_inventario = '".$edit_id."'";
    $result = $conn->query($sql);

    // Mostrar los datos en inputs de HTML para editar
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    
    } else {
        echo "No se encontraron registros.";
    }
} else {
    echo "No se proporcionó un ID de inventario para editar.";
}

// Cerrar conexión
$conn->close();
?>
<html lang="es">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="cssss/bootstrap.min.css" rel="stylesheet">
		<link href="cssss/bootstrap-theme.css" rel="stylesheet">
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<h3 style="text-align:center">MODIFICAR USUARIO</h3>
			</div>
			
			<form class="form-horizontal" method="POST" action="Update usuario.php" autocomplete="off">
				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Nombre</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="id_juego" placeholder="id_juego" value="<?php echo $row['id_juego']; ?>" required>
					</div>
				</div>
				
				<input type="text" name="id_inventario" value="<?php echo $row['id_inventario']; ?>">
				
				<div class="form-group">
					<label for="apellido" class="col-sm-2 control-label">Apellido</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="nombre_juego" placeholder="Juego" value="<?php echo $row['nombre_juego']; ?>"  required>
					</div>
				</div>
				
				<div class="form-group">
					<label for="empresa" class="col-sm-2 control-label">Empresa</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" name="cantidad" placeholder="Cantidad" value="<?php echo $row['cantidad']; ?>" required>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<a href="/oasis_virtual/public_html/inventario/user.php" class="btn btn-default">Regresar</a>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>