<?php

// La mayoria es codigo reciclado de procesar_formulario.php intentare mantener el codigo sin comentarios para su facil lectura

require_once("conexion.php");

if (!isset($_POST['correo'], $_POST['contraseña'])) {
    unset($pdo);
    header("refresh:1; url=login.html");
    exit;
}

$correo = trim($_POST['correo']);
$contraseña = trim($_POST['contraseña']);

$hash = hash('sha256', $contraseña);

$stmt = $pdo->prepare("SELECT contraseña FROM usuarios WHERE correo = :correo");
$stmt->bindValue(':correo', $correo, PDO::PARAM_STR);
$stmt->execute();

/*
fetchColumn() es un metodo de la clase PDOStatement que se utiliza para recuperar un solo valor de una unica 
fila de un conjunto de resultados obtenidos de una consulta
devuelve el valor de la columna especificada en el índice indicado, siendo el indice 0 por defecto.
*/

$resultado = $stmt->fetchColumn();

//hash_equals compara las cadenas caracter por caracter a diferencia de == que detiene la comprobacion nada mas encuentra una diferencia

if (hash_equals($resultado, $hash)) {
    echo "Contraseña correcta";
} else {
    echo "Ha introducido un correo o contraseña incorrectos.";
}




?>