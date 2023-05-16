<?php

// La mayoria es codigo reciclado de procesar_formulario.php intentare mantener el codigo sin comentarios para su facil lectura

require_once("conexion.php");

if (!isset($_POST['email'], $_POST['password'])) {
    unset($pdo);
    header("refresh:1; url=/Proyecto/proyecto_web/index.php");
    exit;
}

$correo = trim($_POST['email']);
$contraseña = trim($_POST['password']);

$hash = hash('sha256', $contraseña);

$stmt = $pdo->prepare("SELECT Contraseña FROM usuarios WHERE Email = :correo");
$stmt->bindValue(':correo', $correo, PDO::PARAM_STR);
$stmt->execute();

/*
fetchColumn() es un metodo de la clase PDOStatement que se utiliza para recuperar un solo valor de una unica 
fila de un conjunto de resultados obtenidos de una consulta
devuelve el valor de la columna especificada en el índice indicado, siendo el indice 0 por defecto.
*/

$resultado = $stmt->fetchColumn();

// hash_equals compara las cadenas caracter por caracter a diferencia de == que detiene la comprobacion nada mas encuentra una diferencia
// si compruebo que el correo esta en la base de datos y contiene la misma contraseña que la introducida, entonces muestro un mensaje, inicio la sesion y guardo el correo en ella.
// al mismo tiempo, redirijo al usuario al board

if (hash_equals($resultado, $hash)) {
    session_start();
    $_SESSION['correo'] = $correo;
    $_SESSION['contraseña'] = $contraseña;
    header("Location: /Proyecto/proyecto_Web/php/logeado/board.php");
    exit;
} else {
    $errorMensaje = "Su correo o contraseña son incorrectos.";
    session_start();
    $_SESSION['errorMensaje'] = $errorMensaje;
    unset($pdo);
    header("Location: /Proyecto/proyecto_web/index.php");
    exit();  
}

unset($pdo);


?>