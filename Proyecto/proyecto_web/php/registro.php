<?php 

// Include me permite ejecutar codigo php desde un archivo externo, remitiendo la ruta.
// Se puede usar require_once tambien pero en caso de no encontrar la ruta, saltaria un error fatal, include no tiene esta funcion y solo lanza una advertencia.

require_once("conexion.php");

// Compruebo que se ha rellenado todo el formulario y no se lo han saltado editando el html
// Si se lo han saltado, simplemente hago un refresh al index nuevamente con 1s de tiempo
/*
if (!isset($_POST['email'], $_POST['password'], $_POST['dni'], $_POST['nombre'], $_POST['apellido'], $_POST['telefono'], $_POST['fecha'], $_POST['pais'], $_POST['ciudad'])) {
    unset($pdo);
    header("refresh:1; url=/Proyecto/proyecto_Web/index.php");
    exit;
} */

// La funcion isset() retorna un false si la variable comparada es nula o esta vacia. De otro modo retornara true.
// La funcion trim() se ocupa de despejar los espacios en blanco al principio y final de una cadena. "  HOLA  " -> "HOLA"

// Llamo a los datos del formulario y los guardo en variables.)

$correo = trim($_POST['email']);
$contraseña = trim($_POST['password']);
$dni = trim($_POST['dni']);
$nombre = trim($_POST['nombre']);
$apellido = trim($_POST['apellido']);
$telefono = trim($_POST['telefono']);
$fecha = trim($_POST['fecha']);
$pais = trim($_POST['pais']);
$ciudad = trim($_POST['ciudad']);

// Creo una variable booleana para confirmar que los datos han sido introducidos correctamente y si no es el caso se lanza una alerta en js.
$validacion = true;

// en el caso del email, tenemos una funcion para comprobar si es valido directamente: https://www.php.net/manual/en/filter.filters.validate.php
if(!filter_var($correo, FILTER_VALIDATE_EMAIL)){
    $validacion = false;
    $errorMensaje = "Su email no es correcto.";
    session_start();
    $_SESSION['errorMensaje'] = $errorMensaje;
    unset($pdo);
    header("Location: /Proyecto/proyecto_web/index.php");
    exit(); 
}

if(!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+]).{8,}$/", $contraseña)){
    $validacion = false;
    $errorMensaje = "Su contraseña debe contener al menos 8 caracteres, una mayúscula, una minúscula, un número y un carácter especial.";
    session_start();
    $_SESSION['errorMensaje'] = $errorMensaje;
    unset($pdo);
    header("Location: /Proyecto/proyecto_web/index.php");
    exit();  
}

if(!preg_match("/[0-9]{8}[A-Za-z]{1}/", $dni)){
    $validacion = false;
    $errorMensaje = "Formato no válido para el DNI.";
    session_start();
    $_SESSION['errorMensaje'] = $errorMensaje;
    unset($pdo);
    header("Location: /Proyecto/proyecto_web/index.php");
    exit(); 
}

if(!preg_match("/[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+/", $nombre)){
    $validacion = false;
    $errorMensaje = "Su nombre no debe contener numeros.";
    session_start();
    $_SESSION['errorMensaje'] = $errorMensaje;
    unset($pdo);
    header("Location: /Proyecto/proyecto_web/index.php");
    exit(); 
}

if(!preg_match("/[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+/", $apellido)){
    $validacion = false;
    $errorMensaje = "Su apellido no debe contener numeros.";
    session_start();
    $_SESSION['errorMensaje'] = $errorMensaje;
    unset($pdo);
    header("Location: /Proyecto/proyecto_web/index.php");
    exit(); 
}

if(!preg_match("/[0-9]{9}/", $telefono)){
    $validacion = false;
    $errorMensaje = "Formato no válido para el telefono.";
    session_start();
    $_SESSION['errorMensaje'] = $errorMensaje;
    unset($pdo);
    header("Location: /Proyecto/proyecto_web/index.php");
    exit(); 
}

if(!preg_match("/[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+/", $ciudad)){
    $validacion = false;
    $errorMensaje = "La ciudad no debe contener numeros.";
    session_start();
    $_SESSION['errorMensaje'] = $errorMensaje;
    unset($pdo);
    header("Location: /Proyecto/proyecto_web/index.php");
    exit(); 
}

// Preparo una consulta para verificar que el correo introducido no existe en la BD ya que es unico y nos servira como "usuario"
// $stmt es un objeto de tipo PDOStatement que representa una instruccion preparada en PDO y se usa -> para acceder a las propiedades del objeto.
$stmt = $pdo->prepare("SELECT email FROM usuarios WHERE email = :correo");

// Dado que se va a usar una consulta preparada, almacenamos el correo en una variable y la ejecuto
// Estamos usando bindValue, mas adelante lo explico para la inserccion, asi como la declaracion tipo string...
$stmt->bindValue(':correo', $correo, PDO::PARAM_STR);
$stmt->execute();

// Usamos rowCount/() para que nos devuelva el contador de cuantas veces existe el correo en la BD. es un poco ridiculo ya que obviamente no existira mas de una vez, pero solo necesitamos un true
if ($stmt->rowCount() > 0) {
    $validacion = false;
    $errorMensaje = "El correo que ha introducido ya esta vinculado a una cuenta.";
    session_start();
    $_SESSION['errorMensaje'] = $errorMensaje;
    unset($pdo);
    header("Location: /Proyecto/proyecto_web/index.php");
    exit();  
}

// Convierto la contraseña en su version hash para protegerla y la almaceno en la variable hash
$hash = hash('sha256', $contraseña);

// Preparo la instruccion de nuevo. se esta sobreescribiendo asi que no ocurre nada por realizar varias con el mismo objeto pdo (pdo esta siendo instanciado en conexion.php)
$stmt = $pdo->prepare("INSERT INTO usuarios (Email, Contraseña, DNI, Nombre, Apellido, Telefono, FechaNacimiento, Pais, Ciudad) VALUES (?, ?, ?, ?, ?, ? , ?, ?, ?)");

// Asigno los valores a la instruccion preparada usando bindParam(). Param asigna los valores de las variables segun referencia, mientras que Value los asigna por valor.
// Para especificar o declarar el tipo de dato que estamos asignando podemos usar PDO::PARAM_STR o INT. Por defecto PDO implementa STRING
// En este caso, a diferencia que con el anterior, se esta asignando los valores mediante un indexado de marcador de posicion. 

/* 
bindParam() vincula una variable al parámetro como una referencia, lo que significa que si se cambia el valor de la variable
también se cambiará el valor del parámetro. Este método es útil si necesitas actualizar el valor de la variable después de haber ejecutado la consulta preparada.

bindValue() vincula una variable al parámetro como un valor, lo que significa que el valor del parámetro se establece 
en el valor actual de la variable en el momento en que se vincula. Este método es útil si no necesitas actualizar el valor 
de la variable después de haber ejecutado la consulta preparada.

En general y creo que entendiendo el uso de ambos, se puede considerar mejor usar bindParam ya que permite alteraciones posteriores a la variable y segun
su documentacion ambos son insignificantemente iguales respecto a rendimiento
*/

$stmt->bindParam(1, $correo, PDO::PARAM_STR);
$stmt->bindParam(2, $hash, PDO::PARAM_STR);
$stmt->bindParam(3, $dni, PDO::PARAM_STR);
$stmt->bindParam(4, $nombre, PDO::PARAM_STR);
$stmt->bindParam(5, $apellido, PDO::PARAM_STR);
$stmt->bindParam(6, $telefono, PDO::PARAM_STR);
$stmt->bindParam(7, $fecha, PDO::PARAM_STR);
$stmt->bindParam(8, $pais, PDO::PARAM_STR);
$stmt->bindParam(9, $ciudad, PDO::PARAM_STR);

// Ejecuto la instruccion
$stmt->execute();

// Si todo ha ido correctamente y se ejecuto el insert, se incluye el html y se añade codigo html mostrando un mensaje. En caso contrario, lo mismo pero fallando.
if($stmt && $validacion){
    $errorMensaje = "Se ha compelta el registro.";
    session_start();
    $_SESSION['errorMensaje'] = $errorMensaje;
    unset($pdo);
    header("Location: /Proyecto/proyecto_web/index.php");
    exit(); 
}else{
    $errorMensaje = "Se ha producido un error, vuelva a intentarlo por favor.";
    session_start();
    $_SESSION['errorMensaje'] = $errorMensaje;
    unset($pdo);
    header("Location: /Proyecto/proyecto_web/index.php");
    exit(); 
}

// Cierro la conexion al setear la variable que contiene la conexion a null
unset($pdo);

?>