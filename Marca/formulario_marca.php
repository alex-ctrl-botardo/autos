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
        <h2 class="titulo">Insertar Motor<p class="titulito">by ale</p></h2>
        <div class="usuario">
            <span class="mensaje-conexion">
                <?= $_SESSION['usuario'] ?> (<?= $_SESSION['rol']?>)
            </span><br>
            <a href="/autos/index.php"><button class="btn-inicio">Inicio</button></a>
            <!-- <a href="/autos/logout.php"><button class="btn-inicio">Cerrar sesión</button></a> -->
        </div>    
    </div>   

    <?php if (isset($_GET['ok'])): ?>
        <p class="mensaje-conexion">Marca guardada correctamente</p>
    <?php endif; ?>

    <div class="form">
        <form action="guardar_marca.php" method="POST">

        <div class="form-grid">
        <!-- Recoje Nombre -->
            <div class="form-grupo">
                <label>Nombre de la marca:</label><br>
                <input type="text" name="nombre" required>
            </div>

        <!-- Recoje País -->
            <div class="form-grupo">
                <label>País:</label><br>
                <input type="text" name="pais" required>  
            </div>
            
        </div>
            <button type="submit">Guardar marca</button>
            <button type="reset">Limpiar campos</button>
        </form>
    </div>
    </body>
</html>




