<?php

    $errorMensaje = "Su contraseña debe contener al menos 8 caracteres, una mayúscula, una minúscula, un número y un carácter especial.";
    session_start();
    $_SESSION['errorMensaje'] = $errorMensaje;
    unset($pdo);
    header("Location: /Proyecto/proyecto_Web/index.php");
    exit();  

    ?>