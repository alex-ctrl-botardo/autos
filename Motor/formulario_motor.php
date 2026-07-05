<?php
require_once "../conexion.php";
require_once "../sesion.php";


/* Consulta marcas */
$stmt = $conn->prepare(
    "SELECT 
        id_marca, nombre 
    FROM 
        Marca");

if (!$stmt) {
    die("Error en la consulta de marcas: " . $conn->error);
}        

$stmt->execute();
$result_forml_motor = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Insertar Motor</title>
        <link rel="stylesheet" href="/autos/css/estilos.css">
        <link rel="stylesheet" href="/autos/css/estilos-formularios.css">  
    </head>
    <body>
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
            <p class="mensaje-conexion">Motor guardado correctamente</p>  
        <?php endif; ?> 

            
        <div class="form">
            <form action="guardar_motor.php" method="POST">
            <div class="form-grid">

                <!-- Recoje Nombre -->
                <div class="form-grupo"> 
                    <label>Nombre del motor:</label>
                    <input put type="text" name="nombre" required>
                </div>


                <!-- Recoje Poatencia-->
                <div class="form-grupo">
                    <label>Potencia (CV):</label>
                    <input type="number" name="potencia" required>
                </div>   
                
                
                <!-- Recoje Par -->
                <div class="form-grupo">
                    <label>Par (Nm):</label>
                    <input type="number" name="par" required>
                </div>   
                
                
                <!-- Recoje Cilindrada   -->
                <div class="form-grupo">
                    <label>Cilindrada (m3):</label>
                    <input type="number" name="cilindrada" required>
                </div>
                
                
                <!-- Recoje Número de pistones  -->
                <div class="form-grupo">
                    <label>Número de pistones:</label>
                    <input type="number" name="num_pistones" required>
                </div>


                <!-- Recoje Id de la Marca a asociar -->
                <div class="form-grupo">    
                    <label>Marca:</label>
                    <select name="id_marca" required>
                        <option value="">-- Selecciona una marca --</option>

                    <?php while ($row = $result_forml_motor->fetch_assoc()) { ?>
                        <option value="<?= $row['id_marca'] ?>">
                            <?= $row['nombre'] ?>
                        </option>
                    <?php } ?>

                    </select><br><br>
                </div>
            </div>        
                <button type="submit">Guardar motor</button>
                <button type="reset">Limpiar campos</button>
            </form>
        </div>
    </body>
</html>

