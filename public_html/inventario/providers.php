<?php

session_start();
error_reporting(0);

$validar = $_SESSION['nombre_usuario'];

if( $validar == null || $validar = ''){

  header("Location: ./iniciar sesion usuario.html");
  die();
  
}


?>
<?php
require_once ('conexion.php');


?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Proveedores</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/sweetalert2.css">
	<link rel="stylesheet" href="css/material.min.css">
	<link rel="stylesheet" href="css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="css/jquery.mCustomScrollbar.css">
	<link rel="stylesheet" href="css/main.css">
	
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/jquery-1.11.2.min.js"><\/script>')</script>
	<script src="js/material.min.js" ></script>
	<script src="js/sweetalert2.min.js" ></script>
	<script src="js/jquery.mCustomScrollbar.concat.min.js" ></script>
	<script src="js/main.js" ></script>

	
	<style>
        .confirmacion-borrado {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
            z-index: 9999;
        }

        .confirmacion-borrado h2 {
            margin-top: 0;
        }

        .confirmacion-borrado .botones {
            text-align: right;
            margin-top: 20px;
        }

		.cursor{
			cursor: pointer;
		}
    </style>
<style>
	@media screen and (max-width: 320px){
		table{
			display: block;
			overflow-x: auto;
		}
	}
</style>
	

    <script>
        function confirmarBorrado(id) {
            var confirmacion = confirm("¿Estás seguro de que deseas borrar esta fila?");
            if (confirmacion) {
                window.location.href = "/oasis_virtual/public_html/CRUD/Borrar Proveedor.php?id=" + id;
            }
        }
    </script>
</head>
<body>
	<!-- Notifications area -->
	<section class="full-width container-notifications">
		<div class="full-width container-notifications-bg btn-Notification"></div>
	    <section class="NotificationArea">
	        <div class="full-width text-center NotificationArea-title tittles">Notifications <i class="zmdi zmdi-close btn-Notification"></i></div>
	        <a href="#" class="Notification" id="notifation-unread-1">
	            <div class="Notification-icon"><i class="zmdi zmdi-accounts-alt bg-info"></i></div>
	            <div class="Notification-text">
	                <p>
	                    <i class="zmdi zmdi-circle"></i>
	                    <strong>New User Registration</strong> 
	                    <br>
	                    <small>Just Now</small>
	                </p>
	            </div>
	        	<div class="mdl-tooltip mdl-tooltip--left" for="notifation-unread-1">Notification as UnRead</div> 
	        </a>
	        <a href="#" class="Notification" id="notifation-read-1">
	            <div class="Notification-icon"><i class="zmdi zmdi-cloud-download bg-primary"></i></div>
	            <div class="Notification-text">
	                <p>
	                    <i class="zmdi zmdi-circle-o"></i>
	                    <strong>New Updates</strong> 
	                    <br>
	                    <small>30 Mins Ago</small>
	                </p>
	            </div>
	            <div class="mdl-tooltip mdl-tooltip--left" for="notifation-read-1">Notification as Read</div>
	        </a>
	        <a href="#" class="Notification" id="notifation-unread-2">
	            <div class="Notification-icon"><i class="zmdi zmdi-upload bg-success"></i></div>
	            <div class="Notification-text">
	                <p>
	                    <i class="zmdi zmdi-circle"></i>
	                    <strong>Archive uploaded</strong> 
	                    <br>
	                    <small>31 Mins Ago</small>
	                </p>
	            </div>
	            <div class="mdl-tooltip mdl-tooltip--left" for="notifation-unread-2">Notification as UnRead</div>
	        </a> 
	        <a href="#" class="Notification" id="notifation-read-2">
	            <div class="Notification-icon"><i class="zmdi zmdi-mail-send bg-danger"></i></div>
	            <div class="Notification-text">
	                <p>
	                    <i class="zmdi zmdi-circle-o"></i>
	                    <strong>New Mail</strong> 
	                    <br>
	                    <small>37 Mins Ago</small>
	                </p>
	            </div>
	            <div class="mdl-tooltip mdl-tooltip--left" for="notifation-read-2">Notification as Read</div>
	        </a>
	        <a href="#" class="Notification" id="notifation-read-3">
	            <div class="Notification-icon"><i class="zmdi zmdi-folder bg-primary"></i></div>
	            <div class="Notification-text">
	                <p>
	                    <i class="zmdi zmdi-circle-o"></i>
	                    <strong>Folder delete</strong> 
	                    <br>
	                    <small>1 hours Ago</small>
	                </p>
	            </div>
	            <div class="mdl-tooltip mdl-tooltip--left" for="notifation-read-3">Notification as Read</div>
	        </a>  
	    </section>
	</section>
	<!-- navBar -->
	<div class="full-width navBar">
		<div class="full-width navBar-options">
			<i class="zmdi zmdi-more-vert btn-menu" id="btn-menu"></i>	
			<div class="mdl-tooltip" for="btn-menu">Menu</div>
			<nav class="navBar-options-list">
				<ul class="list-unstyle">
					<li class="btn-Notification" id="notifications">
						<i class="zmdi zmdi-notifications"></i>
						<!-- <i class="zmdi zmdi-notifications-active btn-Notification" id="notifications"></i> -->
						<div class="mdl-tooltip mover-arriba" for="notifications">Notificacion</div>
					</li>
					<li class="btn-exit" id="btn-exit">
						<i class="zmdi zmdi-power"></i>
						<div class="mdl-tooltip" for="btn-exit">Cerrar sesion</div>
					</li>
					<li class="text-condensedLight noLink" ><small><?php echo $_SESSION['nombre_usuario']; ?></small></li>
					<li class="noLink">
						<figure>
							<img src="assets/img/avatar-male.png" alt="Avatar" class="img-responsive">
						</figure>
					</li>
				</ul>
			</nav>
		</div>
	</div>
	<!-- navLateral -->
	<section class="full-width navLateral">
		<div class="full-width navLateral-bg btn-menu"></div>
		<div class="full-width navLateral-body">
			<div class="full-width navLateral-body-logo text-center tittles">
				<i class="zmdi zmdi-close btn-menu"></i> ADMINISTRAR 
			</div>
			<figure class="full-width" style="height: 77px;">
				<div class="navLateral-body-cl">
					<img src="assets/img/avatar-male.png" alt="Avatar" class="img-responsive">
				</div>
				<figcaption class="navLateral-body-cr hide-on-tablet">
					<span>
						<?php echo $_SESSION['nombre_usuario']; ?><br>
						<small></small>
					</span>
				</figcaption>
			</figure>
			<div class="full-width tittles navLateral-body-tittle-menu">
				<i class="zmdi zmdi-desktop-mac"></i><span class="hide-on-tablet">&nbsp; PROVEEDOR</span>
			</div>
			<nav class="full-width">
			<ul class="full-width list-unstyle menu-principal">
					<li class="full-width">
						<a href="home.php" class="full-width">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-view-dashboard"></i>
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								INICIO
							</div>
						</a>
					</li>
					<li class="full-width divider-menu-h"></li>
					<li class="full-width">
						<a href="#!" class="full-width btn-subMenu">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-case"></i>
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								ADMINISTRADOR
							</div>
							<span class="zmdi zmdi-chevron-left"></span>
						</a>
						<ul class="full-width menu-principal sub-menu-options">
							<li class="full-width">
								<a href="providers.php" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-truck"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										PROVEEDOR
									</div>
								</a>
							</li>
						</ul>
					</li>
					<li class="full-width divider-menu-h"></li>
					<li class="full-width">
						<a href="#!" class="full-width btn-subMenu">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-face"></i>
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								USUARIO
							</div>
							<span class="zmdi zmdi-chevron-left"></span>
						</a>
						<ul class="full-width menu-principal sub-menu-options">
							<li class="full-width">
								<a href="admin.php" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-account"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										ADMINISTRADOR
									</div>
								</a>
							</li>
							<li class="full-width">
								<a href="user.php" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-accounts"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										USUARIO
									</div>
								</a>
							</li>
						</ul>
					</li>
					<li class="full-width divider-menu-h"></li>
					<li class="full-width">
						<a href="products.php" class="full-width">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-washing-machine"></i>
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								PRODUCTOS
							</div>
						</a>
					</li>
					<li class="full-width divider-menu-h"></li>
					<li class="full-width">
						<a href="sales.php" class="full-width">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-shopping-cart"></i>
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								VENTAS
							</div>
						</a>
					</li>
					<li class="full-width divider-menu-h"></li>
					<li class="full-width">
						<a href="inventory.php" class="full-width">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-store"></i>
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								INVENTORIO
							</div>
						</a>
					</li>
					<li class="full-width divider-menu-h"></li>
					<li class="full-width">
						<a href="#!" class="full-width btn-subMenu">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-wrench"></i>
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								CONFIGURACIONES
							</div>
							<span class="zmdi zmdi-chevron-left"></span>
						</a>
						<ul class="full-width menu-principal sub-menu-options">
							<li class="full-width">
								<a href="#!" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-widgets"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										OPCIONES
									</div>
								</a>
							</li>
						</ul>
					</li>
				</ul>
			</nav>
		</div>
	</section>
	<!-- pageContent -->
	<section class="full-width pageContent">
		<section class="full-width header-well">
			<div class="full-width header-well-icon">
				<i class="zmdi zmdi-truck"></i>
			</div>
			<div class="full-width header-well-text">
				<p class="text-condensedLight">
					Este es el apartado para agregar, ver, editar y borrar a un proveedor.
				</p>
			</div>
		</section>
		<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
			<div class="mdl-tabs__tab-bar">
				<a href="#tabNewProvider" class="mdl-tabs__tab is-active">Nuevo</a>
				<a href="#tabListProvider" class="mdl-tabs__tab">Lista</a>
			</div>
			<div class="mdl-tabs__panel is-active" id="tabNewProvider">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-primary text-center tittles">
								Nuevo proveedor
							</div>
							<div class="full-width panel-content">
							<form class="form-horizontal" method="POST" action="/oasis_virtual/public_html/CRUD/Guardar proveedor.php" autocomplete="off">
									<h5 class="text-condensedLight">Datos Proveedor</h5>
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input class="mdl-textfield__input" type="text" pattern="-?[0-9+()- ]*(\.[0-9]+)?" id="nombre_pro" name="nombre_pro" required>
										<label class="mdl-textfield__label" for="nombreProveedor">Nombre</label>
										<span class="mdl-textfield__error">Nombre Invalida</span>
									</div>
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9 ]*(\.[0-9]+)?" id="apellido_pro" name="apellido_pro" required>
										<label class="mdl-textfield__label" for="apellidoProveedor">Apellido</label>
										<span class="mdl-textfield__error">Apellidos Invalido</span>
									</div>
									<div class="mdl-textfield mdl-js-textfield">
												<select id="empresa" name="empresa" class="mdl-textfield__input">
													<option value="" disabled="" selected="">Seleccionar empresa</option>
													<option value="Steam">Steam</option>
													<option value="Epicgames">Epicgames</option>
													<option value="EA">EA</option>
													<option value="Ubisoft">Ubisoft</option>
												</select>
											</div>
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
									<input class="mdl-textfield__input" type="text" pattern="-?[0-9+()- ]*(\.[0-9]+)?" id="direccion" name="direccion" required>
										<label class="mdl-textfield__label" for="direccionProveedor">Direccion</label>
										<span class="mdl-textfield__error">Direccion Invalida</span>
									</div>
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input class="mdl-textfield__input" type="number" pattern="-?[0-9+()- ]*(\.[0-9]+)?" id="tel" name="tel" required>
										<label class="mdl-textfield__label" for="telefonoProveedor">Telefono</label>
										<span class="mdl-textfield__error">Telefono Invalida</span>
									</div>
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
									<input class="mdl-textfield__input" type="email" pattern="-?[0-9+()- ]*(\.[0-9]+)?" id="correo" name="correo" required>
										<label class="mdl-textfield__label" for="correoProveedor">Correo</label>
										<span class="mdl-textfield__error">Correo Invalida</span>
									</div>
									</class=>
									<p class="text-center">
										<button name="submit" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" id="btn-addProvider">
											<i class="zmdi zmdi-plus"></i>
										</button>
										<div class="mdl-tooltip" for="btn-addProvider">Agregar Proveedor</div>
									</p>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="mdl-tabs__panel" id="tabListProvider">
			<div class="full-width divider-menu-h"></div>
					<div class="mdl-grid">
						<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
						<div class="table-responsive" >	
						<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
							<thead>
								<tr>
									<th class="mdl-data-table__cell--non-numeric">ID</th>
									<th>Nombre</th>
									<th>Apellido</th>
									<th>Empresa</th>
									<th>Direccion</th>
									<th>Telefono</th>
									<th>correo</th>
								</tr>
							</thead>
							<tbody>
<?php
// Conexión a la base de datos
$conexion = mysqli_connect('localhost', 'root', '', 'oasis_virtual2.0');

// Consulta para obtener los datos de la tabla
$consulta = "SELECT * FROM proveedores";
$result = mysqli_query($conexion, $consulta);

// Ejemplo de generación de filas
while ($fila = mysqli_fetch_assoc($result)) {
	$id = $fila['id_pro'];
	$nombre = $fila['nombre_pro'];
    $apellido = $fila['apellido_pro'];
    $empresa = $fila['empresa'];
	$direccion = $fila['direccion'];
	$tel = $fila['tel'];
	$correo = $fila['correo'];
?>
								<tr>
									<td class="mdl-data-table__cell--non-numeric"><?php echo $id; ?></td>
									<td><?php echo $nombre; ?></td>
									<td><?php echo $apellido; ?></td>
									<td><?php echo $empresa; ?></td>
									<td><?php echo $direccion; ?></td>
									<td><?php echo $tel; ?></td>
									<td><?php echo $correo; ?></td>
									<td>
										<ul>
											<li> <a style="color: #337ab7;" href="/oasis_virtual/public_html/CRUD/Modificar proveedor.php?id=<?php echo $id; ?>" >Editar</a>
												<a style="color: #337ab7;" class="cursor" onclick="mostrarConfirmacion(<?php echo $id; ?>)">Borrar</a>
											</li>
										</ul>
										
									</td>
								</tr>
<?php
	}
?>
							</tbody>
							</table>
							</div>

	<div class="confirmacion-borrado" id="confirmacionBorrado">
        <h2>Confirmación de borrado</h2>
        <p>¿Estás seguro de que deseas borrar esta fila?</p>
        <div class="botones">
            <button onclick="borrarFila()">Aceptar</button>
            <button onclick="cancelarBorrado()">Cancelar</button>
        </div>
    </div>

    <script>
        function mostrarConfirmacion(id) {
            document.getElementById("confirmacionBorrado").style.display = "block";
            // Puedes almacenar el ID en una variable global para usarlo en la función borrarFila()
            window.idBorrar = id;
        }

        function borrarFila() {
            var id = window.idBorrar;
            window.location.href = "/oasis_virtual/public_html/CRUD/Borrar Proveedor.php?id=" + id;
        }

        function cancelarBorrado() {
            document.getElementById("confirmacionBorrado").style.display = "none";
        }
    </script>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</body>
