    <?php
    // Archivo de conexión a la base de datos
    include ('../conexiones/conexion.php'); // Asegúrate de tener un archivo de conexión válido

    // Obtener valores del formulario
    $idUsuario = $_POST['idUsuario'];
    $idJuego = $_POST['idJuego'];
    $precioJuego = $_POST['precioJuego'];

    // Consulta para obtener el balance actual del usuario
    $consultaBalance = "SELECT balance FROM usuario WHERE id_usuario = $idUsuario";
    $resultadoBalance = mysqli_query($mysqli, $consultaBalance);

    if ($resultadoBalance) {
        $fila = mysqli_fetch_assoc($resultadoBalance);
        $balanceActual = $fila['balance'];
        
        if ($balanceActual >= $precioJuego) {
            // Calcular el nuevo balance después de restar el precio del juego
            $nuevoBalance = $balanceActual - $precioJuego;

            // Actualizar el balance del usuario en la base de datos
            $actualizarBalance = "UPDATE usuario SET balance = $nuevoBalance WHERE id_usuario = $idUsuario";
            $resultadoActualizacion = mysqli_query($mysqli, $actualizarBalance);
            
            if ($resultadoActualizacion) {
                // Insertar el registro de compra en la tabla de juegos_comprados
                $insertarCompra = "INSERT INTO juegos_comprados (id_usuario, id_juego) VALUES ($idUsuario, $idJuego)";
                $resultadoInsercion = mysqli_query($mysqli, $insertarCompra);
    
                if ($resultadoInsercion) {
                    header("Location: informacion_de_compra.php?resultado=exitoso&idUsuario=$idUsuario&idJuego=$idJuego&nuevoBalance=$nuevoBalance");
                    exit;
                } else {
                    header("Location: informacion_de_compra.php?resultado=error_insercion");
                    exit;
                }
            } else {
                header("Location: informacion_de_compra.php?resultado=error_actualizacion");
                exit;
            }
        } else {
            header("Location: informacion_de_compra.php?resultado=saldo_insuficiente");
            exit;
        }
    } else {
        header("Location: informacion_de_compra.php?resultado=error_consulta");
        exit;
    }

?>
