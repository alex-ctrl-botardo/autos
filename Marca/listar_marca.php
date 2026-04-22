<?php
include "conexion.php";

// seleccion
$stmt = $conn->prepare(
    "SELECT id_marca, nombre, pais FROM Marca ORDER BY id_marca"
);

// ejecucion y tomar resultado
$stmt->execute();
$resultado_listar_marca = $stmt->get_result();
//echo "Illo"
?>



<!DOCTYPE html>
<!-- Tabla -->
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Listado de Marcas</title>
        <style>
            /* Estilo Tabla */
            table { border-collapse: collapse; }
            
            th, td { padding: 20px; border: 1px solid }
        </style>
    </head>

    <body>
        <h2>Listado de Marcas</h2>

        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Pais</th>
            </tr>

            <?php while ($fila = $resultado_listar_marca->fetch_assoc()): ?>
                <tr>
                    <td> <?= $fila["id_marca"] ?> </td>
                    <td> <?= htmlspecialchars($fila["nombre"]) ?> </td>
                    <td> <?= htmlspecialchars($fila["pais"]) ?> </td>
                    </tr>
            <?php endwhile; ?>

        </table>

    </body>
</html>

<?php
$stmt->close();
$conn->close();

