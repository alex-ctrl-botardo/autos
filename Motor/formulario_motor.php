<?php
include "../conexion.php";

echo "Conectado correctamente<br>";

/* Consulta marcas */
$sql = "SELECT id_marca, nombre FROM Marca";

$result = $conn->query($sql);

if (!$result) {
    die("Error en la consulta de marcas: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Insertar Motor</title>
</head>
<body>

<h2>Nuevo Motor</h2><br></br>    

<?php if (isset($_GET['ok'])): ?>
    <p style="color:green;">Motor guardado correctamente</p>  
<?php endif; ?> 

<form action="guardar_motor.php" method="POST">

<!-- Recoje Nombre -->
    <label>Nombre del motor:</label><br>
    <input type="text" name="nombre" required><br><br>

<!-- Recoje Poatencia-->
    <label>Potencia:</label><br>
    <input type="text" name="potencia" required><br><br>

<!-- Recoje Par -->
    <label>Par:</label><br>
    <input type="text" name="par" required><br><br>

<!-- Recoje Cilindrada   -->
    <label>Cilindrada:</label><br>
    <input type="number" step="0.1" name="cilindrada" required><br><br>

<!-- Recoje Número de pistones  -->
    <label>Número de pistones:</label><br>
    <input type="number" name="num_pistones" required><br><br>

<!-- Recoje Id de la Marca a asociar -->
    <label>Marca:</label><br>
    <select name="id_marca" required>
        <option value="">-- Selecciona una marca --</option>

        <?php while ($row = $result->fetch_assoc()) { ?>
            <option value="<?= $row['id_marca'] ?>">
                <?= $row['nombre'] ?>
            </option>
        <?php } ?>

    </select><br><br>

    <button type="submit">Guardar motor</button>

</form>

</body>
</html>

