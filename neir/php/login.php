<?php
session_start();
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username = :username";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id']; 
        $_SESSION['username'] = $user['username']; 
        header("Location: ../index.php");
        exit();
    } else {
        $loginError = "Usuario o contraseña incorrectos.";
        $_SESSION['error'] = $loginError;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Iniciar sesión</title>
    <link rel="stylesheet" type="text/css" href="/css/estilo2.css">
</head>
<body>
    <h2>Iniciar sesión</h2>
    <?php if (isset($loginError)) { ?>
        <p><?php echo $loginError; ?></p>
    <?php } ?>
    <form action="login.php" method="POST">
        <label for="username">Usuario:</label>
        <input type="text" name="username" id="username" required><br><br>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" required><br><br>
        <input type="submit" value="Iniciar sesión">
    </form>
    <p><a class="linkerino" href="register.php">Registrarse</a></p>
</body>
</html>
