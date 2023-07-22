<?php

session_start();
error_reporting(0);

$validar = $_SESSION['correo_admin'];
if( $validar == null || $validar = ''){

	header("Location: ../administrador/admin.html");
	die();
}


?>
<?php
include ('../conexiones/conexion.php');


?>


<!DOCTYPE html>	
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Products</title>
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
    /* Estilo para el botón de eliminar */
    .eliminar-btn {
      background-color: transparent;
      border: none;
      color: red;
      cursor: pointer;
      font-size: 16px;
    }
    
    .eliminar-btn:hover {
      font-weight: bold;
    }
  </style>
        <style>img {aspect-ratio: 2/1; object-fit: cover;}</style>

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
		<script>
        function confirmarBorrado(id) {
            var confirmacion = confirm("¿Estás seguro de que deseas borrar esta fila?");
            if (confirmacion) {
                window.location.href = "../CRUD/Borrar juego.php?id=" + id;
            }
        }
    </script>
</head>
<body>
	<!-- Notifications area -->
	<section class="full-width container-notifications">
		<div class="full-width container-notifications-bg btn-Notification"></div>
	    <section class="NotificationArea">
	        <div class="full-width text-center NotificationArea-title tittles">Notificasiones <i class="zmdi zmdi-close btn-Notification"></i></div>
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
						<div class="mdl-tooltip" for="notifications">Notificaciones</div>
					</li>
					<li class="btn-exit" id="btn-exit">
						<i class="zmdi zmdi-power"></i>
						<div class="mdl-tooltip" for="btn-exit">Cerrar Sesión</div>
					</li>
					<li class="text-condensedLight noLink" ><small><?php echo $_SESSION['correo_admin']; ?></small></li>
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
				<i class="zmdi zmdi-close btn-menu"></i> Inventario
			</div>
			<figure class="full-width" style="height: 77px;">
				<div class="navLateral-body-cl">
					<img src="assets/img/avatar-male.png" alt="Avatar" class="img-responsive">
				</div>
				<figcaption class="navLateral-body-cr hide-on-tablet">
					<span>
						<?php echo $_SESSION['correo_admin']; ?><br>
						<small></small>
					</span>
				</figcaption>
			</figure>
			<div class="full-width tittles navLateral-body-tittle-menu">
				<i class="zmdi zmdi-desktop-mac"></i><span class="hide-on-tablet">&nbsp; PRODUCTOS</span>
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
				<i class="zmdi zmdi-washing-machine"></i>
			</div>
			<div class="full-width header-well-text">
				<p class="text-condensedLight">
					Este apartado es para agregar, ver, editar y borrar productos del inventario.
				</p>
			</div>
		</section>
		<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
			<div class="mdl-tabs__tab-bar">
				<a href="#tabNewProduct" class="mdl-tabs__tab is-active">Nuevo</a>
				<a href="#tabListProducts" class="mdl-tabs__tab">Lista</a>
			</div>
			<div class="mdl-tabs__panel is-active" id="tabNewProduct">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-primary text-center tittles">
								Nuevo Producto
							</div>
							<div class="full-width panel-content">
							<form action="../CRUD/Guardar juego.php" method="post" enctype="multipart/form-data" >
									<div class="mdl-grid">
										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
											<h5 class="text-condensedLight">Informaticion Basica</h5>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" name="nombre_juego" >
												<label class="mdl-textfield__label" for="NameProduct">Nombre del juego</label>
												<span class="mdl-textfield__error">Nombre Invalido</span>
											</div>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<textarea class="mdl-textfield__input" type="text" name="descripcion" ></textarea>
												<label class="mdl-textfield__label" for="BarCode">Descripcion del juego</label>
												<span class="mdl-textfield__error">Decripcion Invalida</span>
											</div>
											<div class="mdl-textfield mdl-js-textfield">
												<label>
													<input type="checkbox" name="genero[]" value="Acción"> Acción
												</label>
												<label>
													<input type="checkbox" name="genero[]" value="Aventura"> Aventura
												</label>
												<label>
													<input type="checkbox" name="genero[]" value="Rol (RPG)"> Rol (RPG)
												</label>
												<label>
													<input type="checkbox" name="genero[]" value="Estrategia"> Estrategia    											
												</label>
												<label>
													<input type="checkbox" name="genero[]" value="Simulación"> Simulación
												</label>
												<label>
													<input type="checkbox" name="genero[]" value="Deportes"> Deportes <br>
												</label>
												<label>
													<input type="checkbox" name="genero[]" value="Disparos (Shooter)"> Disparos (Shooter)												
												</label>
												<label>
													<input type="checkbox" name="genero[]" value="Lucha"> Lucha													
												</label>
												<label>
													<input type="checkbox" name="genero[]" value="Carreras">Carreras												
												</label>
												<label>
													<input type="checkbox" name="genero[]" value="Mundo abierto"> Mundo abierto
												</label>
												<label>
													<input type="checkbox" name="genero[]" value="Sandbox"> Sandbox <br>
												</label>
												<label>
													<input type="checkbox" name="genero[]" value="Puzzle"> Puzzle
												</label>
												<label>
													<input type="checkbox" name="genero[]" value="Terror"> Terror
												</label>
												<label>
													<input type="checkbox" name="genero[]" value="MMO"> MMO 
												</label>
												<label>
													<input type="checkbox" name="genero[]" value="Estrategia en tiempo real"> Estrategia en tiempo real
												</label>
												<label>
													<input type="checkbox" name="genero[]" value="Roguelike"> Roguelike <br>
												</label>
												<label>
													<input type="checkbox" name="genero[]" value="Realidad virtual (VR)"> Realidad virtual (VR) 
												</label>
												<label>
													<input type="checkbox" name="genero[]" value="Novela visual"> Novela visual
												</label>
											</div>
											<h5 class="text-condensedLight">Unidades y Precio</h5>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="number" name="cantidad" >
												<label class="mdl-textfield__label" for="StrockProduct">Unidades</label>
												<span class="mdl-textfield__error">Numero Invalido </span>
											</div>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="number" name="precio" >
												<label class="mdl-textfield__label" for="PriceProduct">Precio</label>
												<span class="mdl-textfield__error">Precio Invalido </span>
											</div>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="number"  name="descuento" >
												<label class="mdl-textfield__label" for="discountProduct">% Decuento</label>
												<span class="mdl-textfield__error">Decuento Invalido</span>
											</div>	
										</div>
										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
											<h5 class="text-condensedLight">Datos de la plataforma y proveedor</h5>
										
											<div class="mdl-textfield mdl-js-textfield">
												<select name="plataforma" class="mdl-textfield__input">
													<option value="" disabled="" selected="">Seleccionar plataforma</option>
													<option value="Steam">Steam</option>
													<option value="Epicgames">Epicgames</option>
												</select>
											</div>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" name="desarrollador" >
												<label class="mdl-textfield__label" for="markProduct">Desarrollador</label>
												<span class="mdl-textfield__error">Desarrollador Invalido</span>
											</div>
											<h5 class="text-condensedLight">Fecha de creacion del juego</h5>
											<div class="mdl-textfield mdl-js-textfield">
												<input type="date" class="mdl-textfield__input" name="fecha_creacion" >
											</div>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" name="desarrollador" >
												<label class="mdl-textfield__label" for="markProduct">Clave-Serial</label>
												<span class="mdl-textfield__error">Desarrollador Invalido</span>
											</div>
											<div class="mdl-textfield mdl-js-textfield">
												<input type="file" name="imagen" id="imagen"  >
											</div>
										</div>
									</div>
									<p class="text-center">
										<button name="submit" id="submit" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" id="btn-addProduct">
											<i class="zmdi zmdi-plus"></i>
										</button>
										<div class="mdl-tooltip" for="btn-addProduct">Agregar Producto</div>
									</p>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="mdl-tabs__panel" id="tabListProducts">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
						<form action="#">
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
								<label class="mdl-button mdl-js-button mdl-button--icon" for="searchProduct">
									<i class="zmdi zmdi-search"></i>
								</label>
								<div class="mdl-textfield__expandable-holder">
									<input class="mdl-textfield__input" type="text" id="searchProduct">
									<label class="mdl-textfield__label"></label>
								</div>
							</div>
						</form>
						<div class="table-responsive" >	
<?php 
include ('../conexiones/conexion.php');
	$query = "SELECT * FROM juegos";
	$resultado = mysqli_query($mysqli,$query);

	foreach($resultado as $row){
		$id = $row['id_juego'];
?>

<div class="full-width text-left" style="padding: 30px 0;">
	<div class="mdl-card mdl-shadow--2dp full-width product-card" style="width: 500px; " >

	<div class="mdl-card__title">
		<img src="../imgs/<?php echo $row['imagen']; ?>" alt="..." class="img-responsive">
	</div>
	<div class="mdl-card__supporting-text">
	<input type="hidden" <?php echo $id ; ?>>
		<small>Cantidad <br><?php echo $row['cantidad']; ?></small><br>
		<small>Genero <br> <?php echo $row['genero']; ?></small>
	</div>
	<div class="mdl-card__actions ">
	
	<?php echo $row['nombre_juego']; ?>
	<a class="btn btn-danger btn-del" href="../CRUD/Modificar juego.php?id=<?php echo $id; ?>">
	<button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
		E
	</button>
	</a>
	<a class="btn btn-danger btn-del" onclick="mostrarConfirmacion(<?php echo $id; ?>)">
	<button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
		B
	</button>
	</a>
	
	</div>
</div>
<?php }?>	
</div>

<div class="confirmacion-borrado" id="confirmacionBorrado">
        <h2>Confirmación de borrado</h2>
        <p>¿Estás seguro de que deseas borrar este juego?</p>
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
            window.location.href = "../CRUD/Borrar juego.php?id=" + id;
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
	</section>
</body>
</html>