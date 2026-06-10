<?php 
session_start();
if (isset($_SESSION['usuario'])) {
    header("Location: /autos/index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">+
    <head> 
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" href="/autos/css/estilos.css">
    </head>
    <body>
        <div class="contenido-index">
            <h2 class="titulo">Iniciar Sesión</h2>
            <hr class="linea-titulo">

            <?php if (isset($GET["error"])): ?>
                <p class="mensaje-error">Usuario o contraseña incorrectos</p>
            <?php endif; ?>

            <form action="validar_login.php" method="POST" class="form_login">
                <label>Usuario:</label><br>
                <input type="text" name="nombre" require><br><br>
                <label>contraseña:</label>
                <input type="password" name="password" require><br><br>
                <button type="submit" class="btn-index">Entrar</button>
            </form>    
        </div>
    </body>
</html>