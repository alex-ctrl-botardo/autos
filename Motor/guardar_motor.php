<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include "conexion.php";


$nombre        = trim($_POST['nombre'] ?? "");
$potencia      = trim($_POST['potencia'] ?? "");
$par           = trim($_POST['par'] ?? "");
$cilindrada    = trim($_POST['cilindrada'] ?? "");
$num_pistones  = trim($_POST['num_pistones'] ?? "");
$id_marca      = trim($_POST['id_marca'] ?? ""); 


// Validacion
if (
    empty($nombre) ||
    empty($potencia) ||
    empty($par) ||
    empty($cilindrada) ||
    empty($num_pistones) ||
    empty($id_marca)
) {
    die("Todos los campos son obligatorios");
}


// prepare statement
$stmt = $conn->prepare( 
    "INSERT INTO Motor (nombre, potencia, par, cilindrada, num_pistones, id_marca)
        VALUES (?,?,?,?,?,?)" );

$stmt->bind_param("sssdii", $nombre, $potencia, $par, $cilindrada, $num_pistones, $id_marca);

//ejercutar
if ($stmt->execute()) {
    header("Location: formulario_motor.php?ok=1");
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();

?>
