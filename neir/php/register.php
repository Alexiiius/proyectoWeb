<?php
session_start();
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = "INSERT INTO users (username, password) VALUES (:username, :password)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    $_SESSION['username'] = $username;
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registrarse</title>
    <link rel="stylesheet" type="text/css" href="/css/estilo2.css">
</head>
<body>
    <h2>Registrarse</h2>
    <form action="register.php" method="POST">
        <label for="username">Usuario:</label>
        <input type="text" name="username" id="username" required><br><br>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" required><br><br>
        <input type="submit" value="Registrarse">
    </form>
    <p><a class="linkerino" href="login.php">Iniciar sesión</a></p>
</body>
</html>
