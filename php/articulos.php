<?php

require_once("../php/id_usuario.php");


if (isset($_POST['publish'])) {
    $titulo = $_POST['title'];
    $contenido = $_POST['content'];

    $query = "INSERT INTO articulos (titulo, contenido, id_autor) VALUES (:titulo, :contenido, :id_autor)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':contenido', $contenido);
    $stmt->bindParam(':id_autor', $id_autor);
    $stmt->execute();

    $_SESSION['errorMensaje'] = "El artículo ha sido publicado";
    unset($pdo);
    header("Location: detallesClub.php");
}

if (isset($_GET['delete'])) {
    $id_articulo = $_GET['delete'];

    $query = "DELETE FROM articulos WHERE id = :id_articulo AND id_autor = :id_autor";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id_articulo', $id_articulo);
    $stmt->bindParam(':id_autor', $id_autor);
    $stmt->execute();

    $_SESSION['errorMensaje'] = "El artículo ha sido eliminado";
    unset($pdo);
    header("Location: mi_perfil.php");
}


?>