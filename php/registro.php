<?php

session_start();
require_once ("conexion.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!isset($_POST['email'], $_POST['password'], $_POST['dni'], $_POST['nombre'], $_POST['apellido'], $_POST['telefono'], $_POST['fecha'], $_POST['pais'], $_POST['ciudad'])) {
        unset($pdo);
        header("Location: /index.php");
        exit;
    } 

    $correo = trim($_POST['email']);
    $contraseña = trim($_POST['password']);
    $dni = trim($_POST['dni']);
    $nombre = trim($_POST['nombre']);
    $apellido = trim($_POST['apellido']);
    $telefono = trim($_POST['telefono']);
    $fecha = trim($_POST['fecha']);
    $pais = trim($_POST['pais']);
    $ciudad = trim($_POST['ciudad']);

    $validacion = true;

    // validacion de datos
if(!filter_var($correo, FILTER_VALIDATE_EMAIL)){
    $validacion = false;
    $errorMensaje = "Su email no es correcto.";
    $_SESSION['errorMensaje'] = $errorMensaje;
    unset($pdo);
    header("Location: /index.php");
    exit(); 
}

if(!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+]).{8,}$/", $contraseña)){
    $validacion = false;
    $errorMensaje = "Su contraseña debe contener al menos 8 caracteres, una mayúscula, una minúscula, un número y un carácter especial.";
    $_SESSION['errorMensaje'] = $errorMensaje;
    unset($pdo);
    header("Location: /index.php");
    exit();  
}

if(!preg_match("/[0-9]{8}[A-Za-z]{1}/", $dni)){
    $validacion = false;
    $errorMensaje = "Formato no válido para el DNI.";
    $_SESSION['errorMensaje'] = $errorMensaje;
    unset($pdo);
    header("Location: /index.php");
    exit(); 
}

if(!preg_match("/[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+/", $nombre)){
    $validacion = false;
    $errorMensaje = "Su nombre no debe contener numeros.";
    $_SESSION['errorMensaje'] = $errorMensaje;
    unset($pdo);
    header("Location: /index.php");
    exit(); 
}

if(!preg_match("/[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+/", $apellido)){
    $validacion = false;
    $errorMensaje = "Su apellido no debe contener numeros.";
    $_SESSION['errorMensaje'] = $errorMensaje;
    unset($pdo);
    header("Location: /index.php");
    exit(); 
}

if(!preg_match("/[0-9]{9}/", $telefono)){
    $validacion = false;
    $errorMensaje = "Formato no válido para el telefono.";
    $_SESSION['errorMensaje'] = $errorMensaje;
    unset($pdo);
    header("Location: /index.php");
    exit(); 
}

if(!preg_match("/[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+/", $ciudad)){
    $validacion = false;
    $errorMensaje = "La ciudad no debe contener numeros.";
    $_SESSION['errorMensaje'] = $errorMensaje;
    unset($pdo);
    header("Location: /index.php");
    exit(); 
}

//comprobar correo repetido en la db
$stmt = $pdo->prepare("SELECT Email FROM usuarios WHERE Email = :correo");
$stmt->bindValue(':correo', $correo, PDO::PARAM_STR);
$stmt->execute();
//redirigir en caso true
if ($stmt->rowCount() > 0) {
    $validacion = false;
    $errorMensaje = "El correo que ha introducido ya esta vinculado a una cuenta.";
    $_SESSION['errorMensaje'] = $errorMensaje;
    unset($pdo);
    header("Location: /index.php");
    exit();  
}

//hasheo la contraseña
$hash = password_hash($contraseña, PASSWORD_ARGON2ID);

//preparo consulta
$stmt = $pdo->prepare("INSERT INTO usuarios (Email, Contraseña, DNI, Nombre, Apellido, Telefono, FechaNacimiento, Pais, Ciudad) VALUES (?, ?, ?, ?, ?, ? , ?, ?, ?)");
//preparo las variables
$stmt->bindParam(1, $correo, PDO::PARAM_STR);
$stmt->bindParam(2, $hash, PDO::PARAM_STR);
$stmt->bindParam(3, $dni, PDO::PARAM_STR);
$stmt->bindParam(4, $nombre, PDO::PARAM_STR);
$stmt->bindParam(5, $apellido, PDO::PARAM_STR);
$stmt->bindParam(6, $telefono, PDO::PARAM_STR);
$stmt->bindParam(7, $fecha, PDO::PARAM_STR);
$stmt->bindParam(8, $pais, PDO::PARAM_STR);
$stmt->bindParam(9, $ciudad, PDO::PARAM_STR);
//ejecuto consulta
$stmt->execute();

// en caso correcto
if($stmt && $validacion){
    $_SESSION['correo'] = $correo;
    $_SESSION['contraseña'] = $contraseña;
    $_SESSION['nombre'] = $nombre;
    $errorMensaje = "Se ha compelta el registro.";
    $_SESSION['errorMensaje'] = $errorMensaje;
    unset($pdo);
    header("Location: /html/detallesClub.php");
    exit(); 
}else{
    $errorMensaje = "Se ha producido un error, vuelva a intentarlo por favor.";
    $_SESSION['errorMensaje'] = $errorMensaje;
    unset($pdo);
    header("Location: /index.php");
    exit(); 
}

unset($pdo);

}
?>