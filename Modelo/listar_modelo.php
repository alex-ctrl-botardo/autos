<?php 
include "../conexion.php";
require_once "../sesion.php";


// seleccion
$stms = $conn->prepare (
    "SELECT 
        id_modelo, nombre, id_motor
    FROM
        Modelo
    ORDER BY 
        id_modelo"
);

$stms->execute();
$result_listar_modelo = $stms->get_result();

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Lista de Modelos</title>
        <link rel="stylesheet" href="/autos/css/estilos.css" >
    </head>

    <body>

        <div class="cabecera">
            <?php if ($conn): ?>
                <p class="mensaje-conexion">Conectado correctamente</p>
            <?php endif; ?>
            <a href="/autos/index.php"><button class="btn-inicio">Inicio</button></a>
        </div>

        <h2 class="titulo">Lista de Modelos</h2>

        <hr class="linea-cabecera">
        <br>

        <table class="tablas">
            <tr class="cabecera-tabla">
                <th>ID</th>
                <th>Nombre</th>
                <!-- <th>Motor</th> -->
                <!-- <th>Marca</th> -->
            </tr>

        <?php while ($fila = $result_listar_modelo->fetch_assoc()): ?>
            <tr>
                <td> <?= $fila["id_modelo"] ?></td>
                <td> <?= htmlspecialchars($fila["nombre"]) ?></td>
                <!-- <td> <?= htmlspecialchars($fila["id_marca"]) ?></td> -->
            </tr>
        <?php endwhile ?>
        </table>
    </body>
</html>
