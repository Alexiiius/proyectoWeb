<?php

// Guardo los datos de conexion para el servidor en variables
$direccion_ip = "127.0.0.1:3306";
$usuario = "usuario";
$password = "usuario";
$nombre_db = "datos_usuarios";

// Instancio un objeto de clase PDO que se encargara de realizar la conexion. 
// Las estoy escribiendo manualmente, pero prodria callear las variables de arriba y haria la misma funcion.

$pdo = new PDO('mysql:host=127.0.0.1:3306;dbname=datos_usuarios', 'usuario', 'usuario');

// Se setea el manejo de errores en modo de excepciones, es una de las funciones de PDO que nos permite arrojar excepciones.
// al arrojar una excepción podemos detener la ejecución del script y mostrar un mensaje de error personalizado al usuario en lugar de seguir ejecutando el script.

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


?>