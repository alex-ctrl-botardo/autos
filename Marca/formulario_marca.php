<?php 
include "../conexion.php";
require_once "../sesion.php";


/*Consultar maracs*/
$stmt = $conn->prepare(
    "SELECT 
        id_marca, nombre
    FROM 
        Marca"
);

if (!$stmt) {
    die("Error en la consulta de marcas: " . $conn->error);
}

 $stmt->execute();
 $result_form_motor = $stmt->get_result();

?>


<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Insertar Marca</title>
        <link rel="stylesheet" href="/autos/css/estilos.css">
        <link rel="stylesheet" href="/autos/css/estilos-formularios.css">
    </head>
    <body>

    <h2>Nueva Marca</h2><br></br>
    <div class="cabecera">
        <a href="/autos/index.php" ><button class="btn-inicio">Inicio</button></a>
        <?php if ($conn): ?>
            <p class="mensaje-conexion">Conectado correctamente</p>
        <?php endif; ?>    
        <h2 class="titulo">Nuevo Marcar</h2>
        <hr class="linea-titulo">
    </div>  

    <?php if (isset($_GET['ok'])): ?>
        <p class="mensaje-conexion">Marca guardada correctamente</p>
    <?php endif; ?>

    <div class="form">
        <form action="guardar_marca.php" method="POST">

        <div class="form-grid">
        <!-- Recoje Nombre -->
            <label>Nombre de la marca:</label><br>
            <input type="text" name="nombre" required><br><br>

        <!-- Recoje País -->
            <label>País:</label><br>
            <input type="text" name="pais" required><br><br>

            <button type="submit">Guardar marca</button>
        </div>
        </form>
    </div>
    </body>
</html>




