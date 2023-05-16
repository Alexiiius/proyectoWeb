<?php
// inicia la sesión
session_start();

// destruye la sesión
session_destroy();

// redirige al usuario a la página de inicio de sesión
header("Location: /Proyecto/proyecto_Web/index.php");
exit;
?>