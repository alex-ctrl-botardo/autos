<?php
include "conexion.php";

$nombre        = "2.3 TDI";
$potenciaCV    = "180";
$par           = "380";
$cilindrada_cc = 2268.0;
$num_pistones  = "4";
$id_marca      = 1;   
$sql = "INSERT INTO Motor
        (nombre, potencia_cv, par, cilindrada_cc, num_pistones, id_marca)
        VALUES
        ('$nombre', '$potenciaCV', '$par', $cilindrada_cc, $num_pistones, $id_marca)";

if ($conn->query($sql) === TRUE) {
    echo "Motor insertado correctamente";
} else {
    echo "Error al insertar motor: " . $conn->error;
}

$conn->close();
?>


