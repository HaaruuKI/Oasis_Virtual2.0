<?php
require_once ("../conexion.php");
if (isset($_POST['accion'])){ 
    switch ($_POST['accion']){
        //casos de registros
            case 'acceso_admin';
            acceso_admin();
            break;


		}

	}

function acceso_admin() {
    $correo_admin=$_POST['correo_admin'];
    $contraseña_admin=$_POST['contraseña_admin'];
    session_start();
    $_SESSION['correo_admin']=$correo_admin;

    $conexion=mysqli_connect("localhost","root","","oasis_virtual2.0");
    $consulta= "SELECT * FROM administrador WHERE correo_admin='$correo_admin' AND contraseña_admin='$contraseña_admin'";
    $resultado=mysqli_query($conexion, $consulta);
    $filas=mysqli_fetch_array($resultado);


    if($filas['rol'] == 1){ //usuario

        header('Location: ../inventario/home.php');

    }else if($filas['rol'] == 2){//admin
        header('Location: ../inventario/home.php');
    }
    
    
    else{

        header('Location: ../adminitrador/admin.html');
        session_destroy();

    }

  
}