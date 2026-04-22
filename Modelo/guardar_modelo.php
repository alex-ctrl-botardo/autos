<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include "conexion.php";

$nombre   = trim($_POST['nombre'] ?? "");
$id_motor = trim($_POST['id_motor'] ?? "");

// validacion
if (empty($nombre)|| empty($id_motor)) {
    die("Todos los campos son obligatorios");
}

// prepared statement
$stmt = $conn->prepare(
    "INSERT INTO Modelo (nombre, id_motor) VALUES (?,?)"
);

$stmt->bind_param("si", $nombre, $id_motor );

// ejecutar
if ($stmt->execute()) {
    header("Location: formulario_modelo.php?ok=1");
    exit;
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();



?>

