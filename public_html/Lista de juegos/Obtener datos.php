<?php
// Conexión a la base de datos
include ('../conexiones/conexion.php');


// Obtener datos de la tabla juegos
$sql = "SELECT id_juego, imagen, plataforma, nombre_juego, descripcion, precio FROM juegos ORDER BY plataforma";
$result = $mysqli->query($sql);

$gamesData = array();
while ($row = $result->fetch_assoc()) {
    $game = array(
        'id' => $row['id_juego'],
        'imagen' => $row['imagen'],
        'plataforma' => $row['plataforma'],
        'nombre_juego' => $row['nombre_juego'],
        'descripcion' => $row['descripcion'],
        'precio' => $row['precio'],
    );

    $gamesData[] = $game;
}

$mysqli->close();

// Convert the PHP array to JSON
header('Content-Type: application/json');
echo json_encode($gamesData);
?>
