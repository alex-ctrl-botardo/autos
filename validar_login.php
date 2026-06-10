<?php
session_start();
include "conexion.php";

$nombre = $_POST['nombre'];
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT id_usuario, nombre, password, rol FROM Usuario WHERE nombre = ?");
$stmt->bind_param("s", $nombre);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
        $_SESSION['usuario'] = $user['nombre'];
        $_SESSION['rol'] = $user['rol'];
        $_SESSION['id_usuario'] = $user['id_usuario'];
        header("Location: /autos/index.php");
        exit();
    }
}

header("Location: /autos/login.php?error=1");
exit();
?>