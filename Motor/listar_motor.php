<?php
include "../conexion.php";
require_once "../sesion.php";

// Orden
$orden = "id_motor";

// PAGINACIÓN  
$por_pag = 2;
$pag_actual = isset($_GET['pag']) ? (int)$_GET['pag'] : 1;
if ($pag_actual < 1) {
    $pag_actual = 1;
}

// Calulo del offset (Inicio de la siguiente consulata para la paginación)
$offset = ($pag_actual - 1) * $por_pag;

// Calculo de filas
$total_result = $conn->query("SELECT COUNT(*) AS total FROM Motor");
$total_filas = $total_result->fetch_assoc()['total'];

// Calculo de páginas 
$total_pag = ceil($total_filas / $por_pag);


// Consulta SQL con limit y offset para la paginación
$stmt = $conn->prepare(
    "SELECT 
        id_motor, nombre, potencia, par, cilindrada, num_pistones 
    FROM
        Motor 
    ORDER BY 
        $orden
    LIMIT ? OFFSET ?"
);

// Ejecutar la consulta
$stmt->bind_param("ii", $por_pag, $offset);
$stmt->execute();
$resultado_listar_motor = $stmt->get_result();


?>


<!DOCTYPE html>
<!-- Tabla -->
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Listado de Motor</title>
        <link rel="stylesheet" href="/autos/css/estilos-listas.css">
        <link rel="stylesheet" href="/autos/css/estilos.css">
    </head>

    <body>
        <!-- CABECERA -->
        <div class="cabecera">
            <h2 class="titulo">Lista de Motores<p class="titulito">by ale</p></h2>
            <div class="usuario">
                <span class="mensaje-conexion">
                    <?= $_SESSION['usuario'] ?> (<?= $_SESSION['rol']?>)
                </span><br>
                <a href="/autos/index.php"><button class="btn-inicio">Inicio</button></a>
                <!-- <a href="/autos/logout.php"><button class="btn-inicio">Cerrar sesión</button></a> -->
            </div>    
        </div>     
        
        <!-- <div id="contenedor-pag">  -->
            <!-- TABLAS -->
            <div class="div-tablas">
                <?php 
                // $contador = 0;
                while ($fila = $resultado_listar_motor->fetch_assoc()): 
                ?>
                <table class="tablas">
                    <tr class="cabecera-tabla">
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Potencia</th>
                        <th>Par</th>
                        <th>Cilindrada</th>
                        <th>Nº Pistones</th>
                        <!-- <th>Marca</th> -->
                    </tr>
                    <tr>
                        <td> <?= $fila["id_motor"] ?></td>
                        <td> <?= htmlspecialchars($fila["nombre"]) ?> </td>
                        <td> <?= htmlspecialchars($fila["potencia"]) ?> CV</td>
                        <td> <?= htmlspecialchars($fila["par"]) ?> Nm</td>
                        <td> <?= htmlspecialchars($fila["cilindrada"]) ?> cc</td>
                        <td> <?= htmlspecialchars($fila["num_pistones"]) ?> </td>
                        <!-- <td> <?= htmlspecialchars($fila["id_marca"]) ?> </td> -->
                    </tr>   
                </table>
                <br>
                <?php endwhile ?>
            </div>
            <div class="paginacion">
            <?php for ($i = 1; $i <= $total_pag; $i++): ?>
                <button href="?pag=<?= $i ?>" class=" pagina <?= ($i == $pag_actual) ? 'activo' : '' ?>">
                    <?= $i ?>
                </button>
            <?php endfor; ?>
            </div>
        <!-- </div>            -->
    </body>
</html>

<?php 
    // $cont = 0;
    // function tabla($cont) {
    //     return $cont;
    // }

    // $result = tabla($cont);
    // echo $result; 
    // echo $resultado_listar_motor->num_rows;
?>