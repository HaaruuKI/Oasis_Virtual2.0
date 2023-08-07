<?php
include ('../conexiones/conexion.php');
if (isset($_POST['accion'])){ 
    switch ($_POST['accion']){
        //casos de registros
            case 'acceso_user';
            acceso_user();
            break;
		}
	}

function acceso_user() {
    $correo_usuario = $_POST['correo_usuario'];
    $contraseña_usuario = $_POST['contraseña_usuario'];
    session_start();
    $_SESSION['correo_usuario'] = $correo_usuario;

    include ('../conexiones/conexion.php');
    $consulta= "SELECT * FROM usuario WHERE correo_usuario='$correo_usuario' AND contraseña_usuario='$contraseña_usuario'";
    $resultado=mysqli_query($mysqli, $consulta);
    $filas=mysqli_fetch_array($resultado);


    if($filas['rol'] == 1){ //usuario

        header('Location: ../Lista de juegos/juegos.php#juegos');

    }else if($filas['rol'] == 2){//admin
        header('Location: ../Lista de juegos/juegos.html');
    }
    
    
    else{

        header('Location: ../iniciar sesion usuario.html');
        session_destroy();

    }

  
}