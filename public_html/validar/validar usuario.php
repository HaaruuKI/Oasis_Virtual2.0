<?php
require_once ("../conexion.php");
if (isset($_POST['accion'])){ 
    switch ($_POST['accion']){
        //casos de registros
        case 'editar_registro':
            editar_registro();
            break; 

            case 'eliminar_registro';
            eliminar_registro();
    
            break;

            case 'acceso_user';
            acceso_user();
            break;


		}

	}
  function editar_registro() {
		$conexion=mysqli_connect("localhost","root","","r_user");
		extract($_POST);
		$consulta="UPDATE user SET nombre = '$nombre', correo = '$correo', telefono = '$telefono',
		password ='$password', rol = '$rol' WHERE id = '$id' ";

		mysqli_query($conexion, $consulta);


		header('Location: ../views/user.php');

}

function eliminar_registro() {
    $conexion=mysqli_connect("localhost","root","","r_user");
    extract($_POST);
    $id= $_POST['id'];
    $consulta= "DELETE FROM user WHERE id= $id";

    mysqli_query($conexion, $consulta);


    header('Location: ../views/user.php');

}

function acceso_user() {
    $nombre_usuario=$_POST['nombre_usuario'];
    $contraseña_usuario=$_POST['contraseña_usuario'];
    session_start();
    $_SESSION['nombre_usuario']=$nombre_usuario;

    $conexion=mysqli_connect("localhost","root","","oasis_virtual2.0");
    $consulta= "SELECT * FROM usuario WHERE nombre_usuario='$nombre_usuario' AND contraseña_usuario='$contraseña_usuario'";
    $resultado=mysqli_query($conexion, $consulta);
    $filas=mysqli_fetch_array($resultado);


    if($filas['rol'] == 1){ //usuario

        header('Location: ../Lista de juegos/juegos.php');

    }else if($filas['rol'] == 2){//admin
        header('Location: ../inventario/home.php');
    }
    
    
    else{

        header('Location: ../iniciar sesion usuario.html');
        session_destroy();

    }

  
}