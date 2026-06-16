<?php 
require_once "conexion.php"; 
require_once "sesion.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio - Autos</title>
    <link rel="stylesheet" href="/autos/css/estilos.css">
</head>
<body>

    <div class="cabecera">
        <!-- <a href="/autos/index.php"><button class="btn-inicio">Inicio</button></a> -->
        <h2 class="titulo">Índice de Coches<p class="titulito">by ale</p></h2>
        <div class="usuario">
            <span class="mensaje-conexion">
                <?= $_SESSION['usuario'] ?> (<?= $_SESSION['rol']?>)
            </span><br>
            <a href="/autos/logout.php"><button class="btn-inicio">Cerrar sesión</button></a>
        </div>    
       
    </div>

    <div class="contenido-index">

        <!-- FORMULARIOS -->
        <div class="seccion-index">
            <h3>Formularios</h3>
            <?php if ($_SESSION['rol'] === 'admin'): ?>
            <a href="/autos/Motor/formulario_motor.php"><button class="btn-index">Motor</button></a>
            <a href="/autos/Marca/formulario_marca.php"><button class="btn-index">Marca</button></a>
            <a href="/autos/Modelo/formulario_modelo.php"><button class="btn-index">Modelo</button></a>
            <?php else: ?>
            <button class="btn-index" disabled>Motor</button>
            <button class="btn-index" disabled>Marca</button>
            <button class="btn-index" disabled>Modelo</button>
            <?php endif; ?>
            
        </div>

        <hr>

        <!-- LISTAS -->
        <div class="seccion-index">
            <h3>Listados</h3>
            <a href="/autos/Motor/listar_motor.php"><button class="btn-index" >Motor</button></a>
            <a href="/autos/Marca/listar_marca.php"><button class="btn-index">Marca</button></a>
            <a href="/autos/Modelo/listar_modelo.php"><button class="btn-index">Modelo</button></a>
        </div>

        <hr>

        <!-- EDITAR (futuro) -->
        <div class="seccion-index seccion-desactivada">
            <h3>Editar <span>(próximamente)</span></h3>
            <button class="btn-index" disabled>Motor</button>
            <button class="btn-index" disabled>Marca</button>
            <button class="btn-index" disabled>Modelo</button>
        </div>

        <hr>
    </div>

</body>
</html>