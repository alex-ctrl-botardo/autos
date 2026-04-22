<?php
include "conexion.php";

//seleccion
$stmt = $conn->prepare(
    "SELECT id_motor, nombre, potencia, par, cilindrada, num_pistones FROM Motor ORDER BY id_motor" 
);

$stmt->execute();
$resultado_listar_motor = $stmt->get_result();

// echo "illo";
// /* Consulta marcas */
// $quets_marcas = "SELECT id_marca, nombre FROM Marca";

// $resultado_marcas = $conn->query($quets_marcas);

// if (!$resultado_marcas) {
//     die("Error en la consulta de marcas: " . $conn->error);
// }

// echo "Illo"
?>


<!DOCTYPE html>
<!-- Tabla -->
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Listado de Motor</title>
         <link rel="stylesheet" href="css/estilos.css">
    </head>

    <body>
        <h2>Listado de Motores</h2>
        <style type="text/css">
       
        </style>
        <table>
            <tr class="cabezera">
                <th>ID</th>
                <th>Nombre</th>
                <th>Potencia</th>
                <th>Par</th>
                <th>Cilindrada</th>
                <th>Numero de Pistones</th>
                <!-- <th>Marca</th> -->
            </tr>
        
           
            <?php while ($fila = $resultado_listar_motor->fetch_assoc()): ?>
                <tr>
                    <td> <?= $fila["id_motor"] ?></td>
                    <td> <?= htmlspecialchars($fila["nombre"]) ?> </td>
                    <td> <?= htmlspecialchars($fila["potencia"]) ?> </td>
                    <td> <?= htmlspecialchars($fila["par"]) ?> </td>
                    <td> <?= htmlspecialchars($fila["cilindrada"]) ?> </td>
                    <td> <?= htmlspecialchars($fila["num_pistones"]) ?> </td>
                    <!-- <td> <?= htmlspecialchars($fila["id_marca"]) ?> </td> -->
                </tr>
            <?php endwhile ?>
        </table>
    </body>
</html>