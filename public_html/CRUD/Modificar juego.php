<?php
include('../conexiones/conexion.php');
	
$id = $_GET['id'];

	$sql = "SELECT * FROM juegos WHERE id_juego = '$id'";
	$resultado = $mysqli->query($sql);
	$row = $resultado->fetch_array(MYSQLI_ASSOC);
	
?>
<html lang="es">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="cssss/bootstrap.min.css" rel="stylesheet">
		<link href="cssss/bootstrap-theme.css" rel="stylesheet">
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
		
		<script>
    function actualizarTexto() {
    var checkboxes = document.getElementsByName('genero[]');
    var texto = '';

    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
        if (texto !== '') {
            texto += ', ';
        }
        texto += checkboxes[i].value;
        }
    }

    document.getElementById('resultado').value = texto;
    }
</script>
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<h3 style="text-align:center">MODIFICAR JUEGO</h3>
			</div>
			
			<form class="form-horizontal" method="POST" action="Update juego.php" autocomplete="off" enctype="multipart/form-data">
				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Nombre del juego</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nombre_juego" name="nombre_juego" placeholder="Nombre juego" value="<?php echo $row['nombre_juego']; ?>" required>
					</div>
				</div>
				
				<input type="hidden" id="id_juego" name="id_juego" value="<?php echo $row['id_juego']; ?>">
				
				<div class="form-group">
					<label for="apellido" class="col-sm-2 control-label">Descripcion</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion" value="<?php echo $row['descripcion']; ?>" >
					</div>
				</div>
				
				<div class="form-group">
					<label for="empresa" class="col-sm-2 control-label">Plataforma</label>
					<div class="col-sm-10">
					<select name="plataforma" class="mdl-textfield__input">
						<option value="" disabled="" selected="">Seleccionar plataforma</option>
						<option value="Steam">Steam</option>
						<option value="Epicgames">Epicgames</option>
						<option value="Ubisoft">Ubisoft</option>
						<option value="EA">EA</option>
					</select>
						<input type="text" class="form-control" id="plataforma" name="plataforma" placeholder="Plataforma" value="<?php echo $row['plataforma']; ?>" required>
					</div>
				</div>
				<label style="padding-left: 110px;">Genero</label>
				<div style="padding-left: 200px;" class="mdl-textfield mdl-js-textfield">
												<label>
													<input id="miCheckbox" onchange="actualizarTexto()" type="checkbox" name="genero[]" value="Acción"> Acción
												</label>
												<label>
													<input id="miCheckbox" onchange="actualizarTexto()" type="checkbox" name="genero[]" value="Aventura"> Aventura
												</label>
												<label>
													<input id="miCheckbox" onchange="actualizarTexto()" type="checkbox" name="genero[]" value="Rol (RPG)"> Rol (RPG)
												</label>
												<label>
													<input id="miCheckbox" onchange="actualizarTexto()" type="checkbox" name="genero[]" value="Estrategia"> Estrategia    											
												</label>
												<label>
													<input id="miCheckbox" onchange="actualizarTexto()" type="checkbox" name="genero[]" value="Simulación"> Simulación
												</label>
												<label>
													<input id="miCheckbox" onchange="actualizarTexto()" type="checkbox" name="genero[]" value="Deportes"> Deportes <br>
												</label>
												<label>
													<input id="miCheckbox" onchange="actualizarTexto()" type="checkbox" name="genero[]" value="Disparos (Shooter)"> Disparos (Shooter)												
												</label>
												<label>
													<input id="miCheckbox" onchange="actualizarTexto()" type="checkbox" name="genero[]" value="Lucha"> Lucha													
												</label>
												<label>
													<input id="miCheckbox" onchange="actualizarTexto()" type="checkbox" name="genero[]" value="Carreras">Carreras												
												</label>
												<label>
													<input id="miCheckbox" onchange="actualizarTexto()" type="checkbox" name="genero[]" value="Mundo abierto"> Mundo abierto
												</label>
												<label>
													<input id="miCheckbox" onchange="actualizarTexto()" type="checkbox" name="genero[]" value="Sandbox"> Sandbox <br>
												</label>
												<label>
													<input id="miCheckbox" onchange="actualizarTexto()" type="checkbox" name="genero[]" value="Puzzle"> Puzzle
												</label>
												<label>
													<input id="miCheckbox" onchange="actualizarTexto()" type="checkbox" name="genero[]" value="Terror"> Terror
												</label>
												<label>
													<input id="miCheckbox" onchange="actualizarTexto()" type="checkbox" name="genero[]" value="MMO"> MMO 
												</label>
												<label>
													<input id="miCheckbox" onchange="actualizarTexto()" type="checkbox" name="genero[]" value="Estrategia en tiempo real"> Estrategia en tiempo real
												</label>
												<label>
													<input id="miCheckbox" onchange="actualizarTexto()" type="checkbox" name="genero[]" value="Roguelike"> Roguelike <br>
												</label>
												<label>
													<input id="miCheckbox" onchange="actualizarTexto()" type="checkbox" name="genero[]" value="Realidad virtual (VR)"> Realidad virtual (VR) 
												</label>
												<label>
													<input id="miCheckbox" onchange="actualizarTexto()" type="checkbox" name="genero[]" value="Novela visual"> Novela visual
												</label>
											</div>
											
				<div class="form-group">
					<div class="col-sm-10" style="padding-left: 210px;">
						<input type="text" class="form-control" id="resultado" name="genero" placeholder="Genero" value="<?php echo $row['genero']; ?>" required>
					</div>
				</div>
				<div class="form-group">
					<label for="telefono" class="col-sm-2 control-label">Desarrollador</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="desarrollador" name="desarrollador" placeholder="Desarrollador" value="<?php echo $row['desarrollador']; ?>" >
					</div>
				</div>
				<div class="form-group">
					<label for="correo" class="col-sm-2 control-label">Precio</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="precio" name="precio" placeholder="precio" value="<?php echo $row['precio']; ?>" required>
					</div>
				</div>
				<div class="form-group">
					<label for="correo" class="col-sm-2 control-label">Fecha de creacion</label>
					<div class="col-sm-10">
						<input type="date" class="form-control" id="fecha_creacion" name="fecha_creacion" placeholder="Fecha de creacion" value="<?php echo $row['fecha_creacion']; ?>" required>
					</div>
				</div>
				<div class="form-group">
					<label for="telefono" class="col-sm-2 control-label">Clave-Serial</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="clave" name="clave" placeholder="Clave-Serial" value="<?php echo $row['clave']; ?>" >
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-10">
						<label for="imagen" class="col-sm-2 control-label">Imagen</label>
						<img style="padding-left: 25%;" src="../imgs/<?php echo $row['imagen']; ?>" alt="..." class="img-responsive">
					</div>
				</div>
				<div class="form-group">
					<label for="correo" class="col-sm-2 control-label">Cambiar imagen</label>
					<div class="col-sm-10">
						<input type="file"  id="imagen" name="imagen"  >
					</div>
				</div> 
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<a href="../inventario/products.php" class="btn btn-default">Regresar</a>
						<button name="submit" id="submit " type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>