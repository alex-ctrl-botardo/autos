<?php
session_start();
session_destroy();
header("Location: /autos/login.php");
exit();
?>