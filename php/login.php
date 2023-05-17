<?php
session_start();
require_once ("conexion.php");
require_once ("mostrar_errores.php");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!isset($_POST['email'], $_POST['password'])) {
        unset($pdo);
        header("Location: /index.php");
        exit;
    }

    $correo = trim($_POST['email']);
    $contraseña = trim($_POST['password']);


    $query = "SELECT * FROM usuarios WHERE Email = :correo";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':correo', $correo);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);


    if ($user && password_verify($contraseña, $user['Contraseña'])) {
        $_SESSION['correo'] = $correo;
        $_SESSION['contraseña'] = $contraseña;
        $_SESSION['nombre'] = $user['Nombre'];
        header("Location: /html/detallesClub.php");
        exit;
    } else {
        $errorMensaje = "Su correo o contraseña son incorrectos.";
        $_SESSION['errorMensaje'] = $errorMensaje;
        unset($pdo);
        header("Location: /index.php");
        exit();  
    }
    
    unset($pdo);

}else{
    $errorMensaje = "Se ha producido un error, intentelo de nuevo.";
    $_SESSION['errorMensaje'] = $errorMensaje;
    unset($pdo);
    header("Location: /index.php");
    exit();
}
?>