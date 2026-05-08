<?php 
require_once "conexion.php"; 
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
        <p class="mensaje-conexion">Conectado correctamente</p>
        <h2 class="titulo">Panel de Autos</h2>
    </div>

    <div class="contenido-index">

        <!-- FORMULARIOS -->
        <div class="seccion-index">
            <h3>Formularios</h3>
            <a href="/autos/Motor/formulario_motor.php"><button class="btn-index">Motor</button></a>
            <a href="/autos/Marca/formulario_marca.php"><button class="btn-index">Marca</button></a>
            <a href="/autos/Modelo/formulario_modelo.php"><button class="btn-index">Modelo</button></a>
        </div>

        <hr>

        <!-- LISTAS -->
        <div class="seccion-index">
            <h3>Listados</h3>
            <a href="/autos/Motor/listar_motor.php"><button class="btn-index">Motores</button></a>
            <a href="/autos/Marca/listar_marca.php"><button class="btn-index">Marcas</button></a>
            <a href="/autos/Modelo/listar_modelo.php"><button class="btn-index">Modelos</button></a>
        </div>

        <hr>

        <!-- EDITAR (futuro) -->
        <div class="seccion-index seccion-desactivada">
            <h3>Editar <span>(próximamente)</span></h3>
            <button class="btn-index" disabled>Motor</button>
            <button class="btn-index" disabled>Marca</button>
            <button class="btn-index" disabled>Modelo</button>
        </div>

        
    </div>

</body>
</html>