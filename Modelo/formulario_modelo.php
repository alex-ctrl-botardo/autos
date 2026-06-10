<?php
include "../conexion.php";
require_once "../sesion.php";


/* obtener motores */
$sql = "SELECT 
    Motor.Id_motor,
    Motor.Nombre,
    Marca.Nombre AS Marca
    FROM Motor
    INNER JOIN Marca ON Motor.id_marca = Marca.Id_marca";

$result = $conn->query($sql);

if (!$result) {
    die("Error en la consulta de marcas: " . $conn->error);
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Insertar Modelo</title>
    <link rel="stylesheet" href="/autos/css/estilos-formularios.css">
</head>
<body>

<h2>Nuevo Modelo</h2><br></br>

<?php if (isset($_GET['ok'])): ?>
    <p style="color:green;">Modelo guardado correctamente</p>  
<?php endif; ?> 

<form action="guardar_modelo.php" method="POST">

<!-- Recoje Nombre -->
    <label>Nombre del modelo:</label><br>
    <input type="text" name="nombre" required><br><br>

<!-- Recoje Id del Motor a asociar -->
    <label>Motor:</label><br>
    <select name="id_motor" required>
        <option value="">-- Selecciona un motor --</option>
        
        <?php while ($row = $result->fetch_assoc()) { ?>
            <option value="<?= $row['Id_motor'] ?>">
                <?= $row['Marca'] . " - " . $row['Nombre'] ?>
            </option>
        <?php } ?>
    </select><br><br>

    <button type="submit">Guardar modelo</button>

</form>

</body>
</html>

