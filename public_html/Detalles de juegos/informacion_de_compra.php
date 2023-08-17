<!DOCTYPE html>
<html>
<head>
    <title>Información de la Compra</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1e1f26;
        }
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #0c1f2c;
            border-radius: 5px;
            background-color: #0c1f2c;
        }
        .success-message {
            color: #03dac6;
            font-weight: bold;
        }
        .error-message {
            color: red;
            font-weight: bold;
        }

        .l{
            font-size: 2vw;
            text-align: center;
            color: black;
            background-color: #03dac6;
        }
        .h2{
            text-align: center;
        }
        .boton-div{
            text-align: center;
            padding: 20px;
        }
        .boton {
            display: inline-block;
            padding: 10px 20px;
            background-color: #03dac6; /* Color de fondo */
            color: white; /* Color del texto */
            text-align: center;
            text-decoration: none;
            border-radius: 5px; /* Bordes redondeados */
            border: none; /* Sin borde */
            cursor: pointer;
            font-size: 1.5vw;
        }
        .boton:hover {
            background-color: white; 
            color: black;
        }

        .center1{
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body>
    <header>
    </header>
    
    <main>
        <section>
<div class="center1" >
        <div class="container ">
            <?php
            // Obtener el resultado de la compra
            $resultadoCompra = $_GET['resultado'];
            include('../conexiones/conexion.php');
            
            $idJuego = $_GET['idJuego'];
            $idUsuario = $_GET['idUsuario'];

            
            $sql = "SELECT usuario.nombre_usuario,juegos.clave 
            FROM juegos_comprados 
            INNER JOIN usuario ON juegos_comprados.id_usuario = usuario.id_usuario
            INNER JOIN juegos ON juegos_comprados.id_juego = juegos.id_juego
            WHERE usuario.id_usuario = $idUsuario AND juegos.id_juego = $idJuego";
            $result = mysqli_query($mysqli, $sql);
            if ($result && mysqli_num_rows($result) > 0) {
                $fila = mysqli_fetch_assoc($result);
                $clave = $fila['clave'];
            } else {
                $nombreUsuario = "Usuario no encontrado";
            }

            // Verificar el resultado y mostrar el mensaje correspondiente
            if ($resultadoCompra === 'exitoso') {
                echo '<h2 style="color: white;" >!Juego comprado!</h2=>';
                echo '<p class="success-message">¡Se a comprado exitosamente el juego! Nuevo balance: $' . $_GET['nuevoBalance'] . '</p>';
            } elseif ($resultadoCompra === 'saldo_insuficiente') {
                echo "<p style='font-size: 2vw; color: white ;'>No tienes suficiente saldo para comprar este juego.</p>";
            } else {
                echo "<p>Hubo un error al procesar la compra.</p>";
            }
            ?>
            <h2 class="h2" style="color:white;" >CLAVE</h2>
            <input class="l" type="text" value="<?php echo $clave ?>" disabled >
            <div class="boton-div">
                <a class="boton" href="../index.html">Regregar</a>
            </div>
            </div>
        </section>
    </div>
    </main>
</body>
</html>
