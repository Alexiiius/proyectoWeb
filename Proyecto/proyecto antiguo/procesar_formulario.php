<?php 

// Include me permite ejecutar codigo php desde un archivo externo, remitiendo la ruta.
// Se puede usar require_once tambien pero en caso de no encontrar la ruta, saltaria un error fatal, include no tiene esta funcion y solo lanza una advertencia.

require_once("conexion.php");

// Compruebo que se ha rellenado todo el formulario y no se lo han saltado editando el html
// Si se lo han saltado, simplemente hago un refresh al index nuevamente con 1s de tiempo
if (!isset($_POST['nombre'], $_POST['apellido'], $_POST['correo'], $_POST['telefono'], $_POST['contraseña'])) {
    unset($pdo);
    header("refresh:1; url=index.html");
    exit;
}

// La funcion isset() retorna un false si la variable comparada es nula o esta vacia. De otro modo retornara true.
// La funcion trim() se ocupa de despejar los espacios en blanco al principio y final de una cadena. "  HOLA  " -> "HOLA"

// Llamo a los datos del formulario y los guardo en variables.)

$nombre = trim($_POST['nombre']);
$apellido = trim($_POST['apellido']);
$correo = trim($_POST['correo']);
$telefono = trim($_POST['telefono']);
$contraseña = trim($_POST['contraseña']);

// Creo una variable booleana para confirmar que los datos han sido introducidos correctamente y si no es el caso se lanza una alerta en js.
// A la vez, incluyo el html y hago un exit para detener el script al completo.
$validacion = true;

if(!preg_match("/^[a-zA-Z]+$/", $nombre || strlen($correo) > 15)){
    $validacion = false;
     ?> <script>alert('Su nombre debe contener solamente letras.');</script>"; <?php
}
if(!preg_match("/^[a-zA-Z]+$/", $apellido || strlen($correo) > 30)){
    $validacion = false;
    ?> <script>alert('Su apellido debe contener solamente letras.');</script>"; <?php
}

// en el caso del email, tenemos una funcion para comprobar si es valido directamente: https://www.php.net/manual/en/filter.filters.validate.php
if(!filter_var($correo, FILTER_VALIDATE_EMAIL || strlen($correo) > 30)){
    $validacion = false;
    ?> <script>alert('Su correo no es valido.');</script>"; <?php
}
if(!preg_match("/^[0-9]{9}$/", $telefono)){
    $validacion = false;
    ?> <script>alert('Su telefono debe incluir 9 numeros y solamente numeros.');</script>"; <?php
}
if(strlen($contraseña) < 5){
    $validacion = false;
    ?> <script>alert('Su contraseña debe de tener al menos 5 digitos.');</script>"; <?php
}

// Si la validacion a dado un error sea por el caso que sea, se setea a null la pdo, se carga el html y se detiene el script
if(!$validacion){
    unset($pdo);
    include("index.html");
    exit();
}


// Preparo una consulta para verificar que el correo introducido no existe en la BD ya que es unico y nos servira como "usuario"
// $stmt es un objeto de tipo PDOStatement que representa una instruccion preparada en PDO y se usa -> para acceder a las propiedades del objeto.
$stmt = $pdo->prepare("SELECT correo FROM usuarios WHERE correo = :correo");

// Dado que se va a usar una consulta preparada, almacenamos el correo en una variable y la ejecuto
// Estamos usando bindValue, mas adelante lo explico para la inserccion, asi como la declaracion tipo string...
$stmt->bindValue(':correo', $correo, PDO::PARAM_STR);
$stmt->execute();

// Usamos rowCount/() para que nos devuelva el contador de cuantas veces existe el correo en la BD. es un poco ridiculo ya que obviamente no existira mas de una vez, pero solo necesitamos un true
if ($stmt->rowCount() > 0) {
    $validacion = false;
    ?> <script>alert('El correo que ha introducido ya esta registrado.');</script>"; <?php
}

// repito el if ya que no quiero consultar el correo repetitivamente si algun otro elemento fallo
if(!$validacion){
    unset($pdo);
    include("index.html");
    exit();
}


// Convierto la contraseña en su version hash para protegerla y la almaceno en la variable hash
$hash = hash('sha256', $contraseña);

// Preparo la instruccion de nuevo. se esta sobreescribiendo asi que no ocurre nada por realizar varias con el mismo objeto pdo (pdo esta siendo instanciado en conexion.php)
$stmt = $pdo->prepare("INSERT INTO usuarios (nombre, apellido, correo, telefono, contraseña) VALUES (?, ?, ?, ?, ?)");

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

$stmt->bindParam(1, $nombre, PDO::PARAM_STR);
$stmt->bindParam(2, $apellido, PDO::PARAM_STR);
$stmt->bindParam(3, $correo, PDO::PARAM_STR);
$stmt->bindParam(4, $telefono, PDO::PARAM_STR);
$stmt->bindParam(5, $hash, PDO::PARAM_STR);

// Ejecuto la instruccion
$stmt->execute();

// Si todo ha ido correctamente y se ejecuto el insert, se incluye el html y se añade codigo html mostrando un mensaje. En caso contrario, lo mismo pero fallando.
if($stmt && $validacion){
    include("index.html");
    ?> <p id="registro"> <strong> Registro completado </strong> <p> <?php
}else{
    include("index.html");
    ?> <p id="fallo"> <strong> Se ha producido un error, vuelva a intentarlo por favor. </strong> <p> <?php
}

// Cierro la conexion al setear la variable que contiene la conexion a null
unset($pdo);

?>