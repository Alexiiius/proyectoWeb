<?php
session_start();
require_once 'db.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php"); 
    exit();
}

$username = $_SESSION['username'];

if (isset($_POST['update'])) {
    $newUsername = $_POST['new_username'];
    $newPassword = $_POST['new_password'];


    $query = "UPDATE users SET username = :newUsername, password = :newPassword WHERE username = :username";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':newUsername', $newUsername);
    $stmt->bindParam(':newPassword', $newPassword);
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    $success = "Los datos de cuenta han sido actualizados";
}

$showAccountSettings = false;

if (isset($_POST['edit'])) {
    $showAccountSettings = true;
}

if (isset($_POST['publish'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $query = "SELECT id FROM users WHERE username = :username";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $authorId = $stmt->fetchColumn();

    $query = "INSERT INTO articles (title, content, author_id) VALUES (:title, :content, :author_id)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':content', $content);
    $stmt->bindParam(':author_id', $authorId);
    $stmt->execute();

    $success = "El artículo ha sido publicado";
}

if (isset($_GET['delete'])) {
    $articleId = $_GET['delete'];

    $query = "DELETE FROM articles WHERE id = :articleId AND author_id = :author_id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':articleId', $articleId);
    $stmt->bindParam(':author_id', $username);
    $stmt->execute();

    $success = "El artículo ha sido eliminado";
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Panel de control</title>
    <link rel="stylesheet" type="text/css" href="/css/estilo2.css">
</head>
<body>
    <h2>Bienvenido, <?php echo $username; ?></h2>
    <?php if (isset($success)) { ?>
        <p><?php echo $success; ?></p>
    <?php } ?>

    <?php if ($showAccountSettings) { ?>
        <h3>Ajustes de cuenta</h3>
        <form method="post" action="">
            <input type="text" name="new_username" placeholder="Nuevo nombre de usuario" required><br>
            <input type="password" name="new_password" placeholder="Nueva contraseña" required><br>
            <input type="submit" name="update" value="Actualizar datos de cuenta">
</form>
<?php } else { ?>
<form method="post" action="">
<input type="submit" name="edit" value="Editar datos">
</form>
<?php } ?>
<h3>Publicar artículo</h3>
<form method="post" action="">
    <input type="text" name="title" placeholder="Título del artículo" required><br>
    <textarea name="content" placeholder="Contenido del artículo" required></textarea><br>
    <input type="submit" name="publish" value="Publicar artículo">
</form>

<h3>Artículos publicados</h3>
<?php

$query = "SELECT * FROM articles WHERE author_id = :author_id";
$stmt = $conn->prepare($query);
$stmt->bindParam(':author_id', $username);
$stmt->execute();
$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($articles as $article) {

    echo "<div class=\"article\">";
    echo "<h4>" . $article['title'] . "</h4>";
    echo "<p>" . $article['content'] . "</p>";
    echo "<a href='dashboard.php?delete=" . $article['id'] . "'>Eliminar artículo</a><br><br>";
    echo "</div>";

}
?>
<p><a class="linkerino" href="../index.php">Inicio</a></p>
<p><a class="linkerino" href="logout.php">Cerrar sesión</a></p>



</body>
</html>
