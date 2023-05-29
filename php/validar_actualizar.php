<?php

    session_start();
    require_once ("conexion.php");
    require_once ("mostrar_errores.php");

    if (!isset($_POST['email'], $_POST['password'], $_POST['dni'], $_POST['nombre'], $_POST['apellido'], $_POST['telefono'], $_POST['fecha'], $_POST['pais'], $_POST['ciudad'])) {
            unset($pdo);
            header("Location: /html/mi_perfil.php");
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
if(!filter_var($correo, FILTER_VALIDATE_EMAIL) || strlen($correo) > 30 ){
    $validacion = false;
    $errorMensaje = "Su email no es correcto.";
    $_SESSION['errorMensaje'] = $errorMensaje;
    unset($pdo);
    header("Location: /html/mi_perfil.php");
    exit(); 
}

if(!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+]).{8,}$/", $contraseña) || strlen($contraseña) > 100){
    $validacion = false;
    $errorMensaje = "Su contraseña debe contener al menos 8 caracteres, una mayúscula, una minúscula, un número y un carácter especial.";
    $_SESSION['errorMensaje'] = $errorMensaje;
    unset($pdo);
    header("Location: /html/mi_perfil.php");
    exit();  
}

if(!preg_match("/[0-9]{8}[A-Za-z]{1}/", $dni) || strlen($dni) > 9){
    $validacion = false;
    $errorMensaje = "Formato no válido para el DNI.";
    $_SESSION['errorMensaje'] = $errorMensaje;
    unset($pdo);
    header("Location: /html/mi_perfil.php");
    exit(); 
}

if(!preg_match("/[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+/", $nombre) || strlen($nombre) > 30){
    $validacion = false;
    $errorMensaje = "Su nombre no debe contener numeros.";
    $_SESSION['errorMensaje'] = $errorMensaje;
    unset($pdo);
    header("Location: /html/mi_perfil.php");
    exit(); 
}

if(!preg_match("/[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+/", $apellido) || strlen($apellido) > 30){
    $validacion = false;
    $errorMensaje = "Su apellido no debe contener numeros.";
    $_SESSION['errorMensaje'] = $errorMensaje;
    unset($pdo);
    header("Location: /html/mi_perfil.php");
    exit(); 
}

if(!preg_match("/[0-9]{9}/", $telefono) || strlen($telefono) > 9){
    $validacion = false;
    $errorMensaje = "Formato no válido para el telefono.";
    $_SESSION['errorMensaje'] = $errorMensaje;
    unset($pdo);
    header("Location: /html/mi_perfil.php");
    exit(); 
}

if(!preg_match("/[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+/", $ciudad) || strlen($ciudad) > 30){
    $validacion = false;
    $errorMensaje = "La ciudad no debe contener numeros.";
    $_SESSION['errorMensaje'] = $errorMensaje;
    unset($pdo);
    header("Location: /html/mi_perfil.php");
    exit(); 
}
    //si se ha introducido un correo diferente al actual (el de la session)
    //se comprobara que no este intentando suar uno ya existente de otro usuario
    if($_SESSION['correo'] != $correo){

        //comprobar correo repetido en la db
        $stmt = $pdo->prepare("SELECT Email FROM usuarios WHERE Email = :correo");
        $stmt->bindValue(':correo', $correo, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {

            //redirigir en caso true
            $validacion = false;
            $errorMensaje = "El correo que ha introducido ya esta vinculado a una cuenta.";
            $_SESSION['errorMensaje'] = $errorMensaje;
            unset($pdo);
            header("Location: /html/mi_perfil.php");
            exit();  
        }
    }

    $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE Email = :correo");
    $stmt->bindValue(':correo', $_SESSION['correo'], PDO::PARAM_STR);
    $stmt->execute();

    if(!$stmt){
        $errorMensaje = "Se ha producido un error, vuelva a intentarlo por favor.";
        $_SESSION['errorMensaje'] = $errorMensaje;
        unset($pdo);
        header("Location: /html/mi_perfil.php");
        exit(); 
    }

    $id = $stmt->fetch(PDO::FETCH_ASSOC);

    

    if (isset($_POST['update'])) {

        //hasheo la contraseña
        $hash = password_hash($contraseña, PASSWORD_ARGON2ID);
    
        $query = "UPDATE usuarios SET Email = ?, Contraseña = ?, DNI = ?, Nombre = ?, Apellido = ?, Telefono = ?, FechaNacimiento = ?, Pais = ?, Ciudad = ? WHERE id = ?";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(1, $correo, PDO::PARAM_STR);
        $stmt->bindParam(2, $hash, PDO::PARAM_STR);
        $stmt->bindParam(3, $dni, PDO::PARAM_STR);
        $stmt->bindParam(4, $nombre, PDO::PARAM_STR);
        $stmt->bindParam(5, $apellido, PDO::PARAM_STR);
        $stmt->bindParam(6, $telefono, PDO::PARAM_STR);
        $stmt->bindParam(7, $fecha, PDO::PARAM_STR);
        $stmt->bindParam(8, $pais, PDO::PARAM_STR);
        $stmt->bindParam(9, $ciudad, PDO::PARAM_STR);
        $stmt->bindParam(10, $id, PDO::PARAM_INT);
        $stmt->execute();
    
    
    // en caso correcto
    if($stmt && $validacion){
        $_SESSION['correo'] = $correo;
        $_SESSION['contraseña'] = $contraseña;
        $_SESSION['nombre'] = $nombre;
        $errorMensaje = "Se han realizado los cambios.";
        $_SESSION['errorMensaje'] = $errorMensaje;
        unset($pdo);
        header("Location: /html/mi_perfil.php");
        exit(); 
    }else{
        $errorMensaje = "Se ha producido un error, vuelva a intentarlo por favor.";
        $_SESSION['errorMensaje'] = $errorMensaje;
        unset($pdo);
        header("Location: /html/mi_perfil.php");
        exit(); 
    }
   
    } 
    

    unset($pdo);


?>