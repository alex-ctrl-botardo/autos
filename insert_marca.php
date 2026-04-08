<?php
include "conexion.php";

$nombre = "BMW";
$pais   = "Alemania";

$sql = "INSERT INTO Marca (Nombre, Pais) VALUES ('$nombre', '$pais')";

if ($conn->query($sql) === TRUE) {
    echo "Marca insertada correctamente";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>

