<?php
// Conexión a la base de datos
include('../conexion.php');

// Obtener las imágenes de la base de datos
$sql = "SELECT id_juego, imagen, plataforma, nombre_juego, descripcion FROM juegos ORDER BY plataforma";
$result = $mysqli->query($sql);

$gamesData = array();
while ($row = $result->fetch_assoc()) {
    $game = array(
        'id' => $row['id_juego'],
        'imagen' => $row['imagen'],
        'plataforma' => $row['plataforma'],
        'nombre_juego' => $row['nombre_juego'],
        'descripcion' => $row['descripcion'],
    );

    $gamesData[] = $game;
}

$mysqli->close();

// Convert the PHP array to JSON
header('Content-Type: application/json');
echo json_encode($gamesData);
?>
