<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include "conexion.php";

$nombre = trim($_POST['nombre'] ?? "");
$pais   = trim($_POST['pais'] ?? "");

// validacion
if (empty($nombre) || empty($pais)) {
    die("Todos los campos son obligatorios");
}

// prepared statement
$stmt = $conn->prepare(
    "INSERT INTO Marca (nombre, pais) VALUES (?,?) "
);

$stmt->bind_param("ss", $nombre, $pais );

// ejecutar
if ($stmt->execute()) {
    header("Location: formulario_marca.php?ok=1");
    exit;
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();


?>
