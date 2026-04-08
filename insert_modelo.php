<?php
include "conexion.php" ;

$nombre = "Corola";
$motor = 1;

$sql = "INSERT INTO Modelo
        (nombre, motor)
        VALUES
        ('$nombre', '$motor')";

if ($conn->query($sql) === TRUE) {
    echo "Modelo insertado correctamente";
} else {
    echo "Error al insertar modelo: " . $conn->error;
}

$conn->close();
?>


