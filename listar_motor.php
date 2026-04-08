<?php
include "conexion.php";

//seleccion
$stmt = $conn->prepare(
    "SELECT id_motor, nombre, potencia, par, cilindrada, num_pistones, id_marca"
);

$stms->execute();
$resultado_listar_motor = $stms->get_result();



?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Listado de Motor</title>
        <style>
            table { border-collapse: collapse ;}
            th, td { padding: 20px; border: 1px solid ;} 
        </style>
    </head>

    <body>
        <h2>Listado de Motores</h2>

        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Potencia</th>
                <th>Par</th>
                <th>Cilindrada</th>
                <th>Numero de Pistones</th>
                <th>Marca</th>

            </tr>

            <?php while ($fila = $resultado_listar_motor-mysqli_fetch_assoc()) : ?>
                <tr>
                    <td> <?php $fila["id_motor"] ?></td>
                    <td> <?php htmlspecialchars($fila["nombre"]) ?> </td>
                    <td> <?php htmlspecialchars($fila["potencia"]) ?> </td>
                    <td> <?php htmlspecialchars($fila["par"]) ?> </td>
                    <td> <?php htmlspecialchars($fila["cilindrada"]) ?> </td>
                    <td> <?php htmlspecialchars($file["num_pistones"]) ?> </td>
                    <td> <?php  ?> </td>
                    <td> <?php  ?> </td>
                </tr>
            <?php endwhile ?>
        </table>
    </body>
</html>