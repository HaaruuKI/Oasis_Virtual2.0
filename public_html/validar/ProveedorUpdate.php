<?php
	require 'conexion.php';
	
	$id = $_GET['id'];
	
	$sql = "SELECT * FROM oasis_virtual WHERE id = '$id'";
	$resultado = $mysqli->query($sql);
	$row = $resultado->fetch_array(MYSQLI_ASSOC);
	
?>
<header id="home" class="header">
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Start your development with FoodHut landing page.">
        <meta name="author" content="Devcrud">
        <title>Registrar datos del proveedor</title>
       
        <!-- font icons -->
        <link rel="stylesheet" href="assets/vendors/themify-icons/css/themify-icons.css">
    
        <link rel="stylesheet" href="assets/vendors/animate/animate.css">
    
        <!-- Bootstrap + FoodHut main styles -->
        <link rel="stylesheet" href="assets/css/foodhut.css">
        <link rel="stylesheet" href="css/estilo.css">
        
    </head>

<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">   
    <!-- Barra de navegacion -->
    <nav class="custom-navbar navbar navbar-expand-lg navbar-dark fixed-top" data-spy="affix" data-offset-top="10">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li>
                    <a>Administrador</a>
                        <ul>
                          <li><a href="Iniciar Sesion administrador.html">Iniciar Sesion</a></li>
                          <li><a href="Registrarse administrador.html">Registrar</a></li>
                        </ul>
                    </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.html">Inicio</a>
                </li>
                <li>
                    <a href="Iniciar Sesion.html" class="nav-link">Iniciar sesion</a>
                </li>
                <li class="nav-item">   
                    <a href="Registrarse.html" class="nav-link">Registrarse</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- encabezado -->
    <header id="home" class="header">
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="description" content="Start your development with FoodHut landing page.">
            <meta name="author" content="Devcrud">
            <title>Virtual Oasis</title>
           
            <!-- font icons -->
            <link rel="stylesheet" href="assets/vendors/themify-icons/css/themify-icons.css">
        
            <link rel="stylesheet" href="assets/vendors/animate/animate.css">
        
            <!-- Bootstrap + FoodHut main styles -->
            <link rel="stylesheet" href="assets/css/foodhut.css">
        </head>
        <!-- Ingresar datos del proveedor -->
        <header id="home" class="header">
            <div class="overlay text-white text-center">
                <div class="container-fluid has-bg-overlay text-center text-light has-height-lg middle-items" id="book-table">
                    <div class="">
                    <div class="container">
			<div class="row">
				<h3 style="text-align:center">MODIFICAR REGISTRO</h3>
			</div>
			
			<form class="form-horizontal" method="POST" action="update.php" autocomplete="off">
				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Nombre</label>
					<div class="col-sm-10">
                    <div class="container">
			<div class="row">
				<h3 style="text-align:center">MODIFICAR REGISTRO</h3>
			</div>
			
			<form class="form-horizontal" method="POST" action="update.php" autocomplete="off">
				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Nombre</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $row['nombre']; ?>" required>
					</div>
				</div>
				
				<input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>" />
				
				<div class="form-group">
					<label for="email" class="col-sm-2 control-label">Email</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $row['correo']; ?>"  required>
					</div>
				</div>
				
				<div class="form-group">
					<label for="telefono" class="col-sm-2 control-label">Telefono</label>
					<div class="col-sm-10">
						<input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Telefono" value="<?php echo $row['telefono']; ?>" >
					</div>
				</div>
				
				<div class="form-group">
					<label for="estado_civil" class="col-sm-2 control-label">Estado Civil</label>
					<div class="col-sm-10">
						<select class="form-control" id="estado_civil" name="estado_civil">
							<option value="SOLTERO" <?php if($row['estado_civil']=='SOLTERO') echo 'selected'; ?>>SOLTERO</option>
							<option value="CASADO" <?php if($row['estado_civil']=='CASADO') echo 'selected'; ?>>CASADO</option>
							<option value="OTRO" <?php if($row['estado_civil']=='OTRO') echo 'selected'; ?>>OTRO</option>
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label for="hijos" class="col-sm-2 control-label">¿Tiene Hijos?</label>
					
					<div class="col-sm-10">
						<label class="radio-inline">
							<input type="radio" id="hijos" name="hijos" value="1" <?php if($row['hijos']=='1') echo 'checked'; ?>> SI
						</label>
						
						<label class="radio-inline">
							<input type="radio" id="hijos" name="hijos" value="0" <?php if($row['hijos']=='0') echo 'checked'; ?>> NO
						</label>
					</div>
				</div>
				
				<div class="form-group">
					<label for="intereses" class="col-sm-2 control-label">INTERESES</label>
					
					<div class="col-sm-10">
						<label class="checkbox-inline">
							<input type="checkbox" id="intereses[]" name="intereses[]" value="Libros" <?php if(strpos($row['intereses'], "Libros")!== false) echo 'checked'; ?>> Libros
						</label>
						
						<label class="checkbox-inline">
							<input type="checkbox" id="intereses[]" name="intereses[]" value="Musica" <?php if(strpos($row['intereses'], "Musica")!== false) echo 'checked'; ?>> Musica
						</label>
						
						<label class="checkbox-inline">
							<input type="checkbox" id="intereses[]" name="intereses[]" value="Deportes" <?php if(strpos($row['intereses'], "Deportes")!== false) echo 'checked'; ?>> Deportes
						</label>
						
						<label class="checkbox-inline">
							<input type="checkbox" id="intereses[]" name="intereses[]" value="Otros" <?php if(strpos($row['intereses'], "Otros")!== false) echo 'checked'; ?>> Otros
						</label>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<a href="index.php" class="btn btn-default">Regresar</a>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
		</div>
                    </div>
                </div>
            </div>
        </header>
    </header>

    <!-- pie de pagina  -->
    <div class="container-fluid bg-dark text-light has-height-md middle-items border-top text-center wow fadeIn">
        <div class="row">
            <div class="col-sm-4">
                <h3>Nuestro correo</h3>
                <P class="text-muted"></P>
            </div>
            <div class="col-sm-4">
                <h3>Nuestro telefono</h3>
                <P class="text-muted">+52 (631)311-1830</P>
            </div>
            <div class="col-sm-4">
                <h3>Encuentranos en</h3>
                <P class="text-muted">Ave universidad 271, Universitaria, 84097 Nogales, Son.</P>
            </div>
        </div>
    </div>
    <div class="bg-dark text-light text-center border-top wow fadeIn">
        <p class="mb-0 py-3 text-muted small">&copy; Copyright <script>document.write(new Date().getFullYear())</script> Made with <i class="ti-heart text-danger"></i> By <a href="http://devcrud.com">DevCRUD</a></p>
    </div>
    <!-- end of page footer -->

	<!-- core  -->
    <script src="assets/vendors/jquery/jquery-3.4.1.js"></script>
    <script src="assets/vendors/bootstrap/bootstrap.bundle.js"></script>

    <!-- bootstrap affix -->
    <script src="assets/vendors/bootstrap/bootstrap.affix.js"></script>

    <!-- wow.js -->
    <script src="assets/vendors/wow/wow.js"></script>
    
    <!-- google maps -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtme10pzgKSPeJVJrG1O3tjR6lk98o4w8&callback=initMap"></script>

    <!-- FoodHut js -->
    <script src="assets/js/foodhut.js"></script>

</body>
</html>
