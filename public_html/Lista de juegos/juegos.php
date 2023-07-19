<?php

session_start();
error_reporting(0);

$validar = $_SESSION['nombre_usuario'];

if( $validar == null || $validar = ''){

  header("Location: ../iniciar sesion usuario.html");
  die();
  
}


?>
<!DOCTYPE html>
<html>
<head>
    <title>Galería de juegos</title>
    <style>
        .platform {
            margin-bottom: 20px;
        }
        .platform img {
            display: inline-block;
            margin-right: 10px;
        }
    </style>
        <link rel="stylesheet" href="estilos.css">

        <script>
        function redirectToPage(pageUrl) {
            window.location.href = pageUrl;
        }
    </script>
</head>
<body>
<?php
// Conexión a la base de datos
include('../conexion.php');

// Obtener las imágenes de la base de datos
$sql = "SELECT id_juego,imagen, plataforma, nombre_juego, descripcion FROM juegos ORDER BY plataforma";
$result = $mysqli->query($sql);

$currentPlatform = null;
while ($row = $result->fetch_assoc()) {
    $imagen = $row["imagen"];
    $plataforma = $row["plataforma"];
    $id = $row["id_juego"];

    // Verificar si la plataforma cambió
    if ($currentPlatform !== $plataforma) {
        // Cerrar la línea horizontal anterior (si existe)
        if ($currentPlatform !== null) {
            echo '</div>';
        }

        // Abrir una nueva línea horizontal y mostrar el nombre de la plataforma
        echo '<div class="platform">';
        echo '<h2><strong>' . $plataforma . '</strong></h2>';
        echo '<div class="news">';
    }

    // Mostrar la imagen y los detalles del juego
    echo '<figure class="article" onclick="redirectToPage(\'../Detalles de juegos/Detalles.php?id=' . $id . '\')">';
    echo '<img src="../imgs/' . $imagen . '" alt="...">';
    echo '<figcaption>';
    echo '<h3>' . $row['nombre_juego'] . '</h3>';
    echo '<p>' . $row['descripcion'] . '</p>';
    echo '</figcaption>';
    echo '</figure>';

    // Actualizar la plataforma actual
    $currentPlatform = $plataforma;
}

// Cerrar la última línea horizontal
if ($currentPlatform !== null) {
    echo '</div>';
    echo '</div>';
}

$conn->close();
?>
</body>
</html>
