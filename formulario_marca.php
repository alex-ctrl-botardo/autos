

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Insertar Marca</title>
</head>
<body>

<h2>Nueva Marca</h2><br></br>

<?php if (isset($_GET['ok'])): ?>
    <p style="color:green;">Marca guardada correctamente</p>
<?php endif; ?>

<form action="guardar_marca.php" method="POST">

<!-- Recoje Nombre -->
    <label>Nombre de la marca:</label><br>
    <input type="text" name="nombre" required><br><br>

<!-- Recoje País -->
    <label>País:</label><br>
    <input type="text" name="pais" required><br><br>

    <button type="submit">Guardar marca</button>

</form>

</body>
</html>




