<?php
// Crea una conexion en la base de datos
$mysqli = new mysqli("localhost", "root", "", "oasis_virtual");



?>
<!DOCTYPE html>
<html>
    <head>
        <title>Mostrar datos</title>
    </head>
    <body>
        <br>
            <table>
                <tr>
                    <td>precio</td>
                </tr>
                <?php
                $sql = "SELECT * FROM productos";
                $result=mysqli_query($conexion,$sql);
                
                while ($mostrar=mysqli_fetch_array($result)){

                ?>
                <tr>
                    <td><?php echo $mostrar['precio']?></td>
                </tr>
                <?php
                }
                ?>
            </table>
    </body>
</html>
