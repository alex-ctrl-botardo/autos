<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: /autos/login.php");
    exit();
}
?>