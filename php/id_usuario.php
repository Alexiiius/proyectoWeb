<?php

$correo = $_SESSION['correo'];

$query = "SELECT id FROM usuarios where Email = :correo";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':correo', $correo);
$stmt->execute();
$id_autor = $stmt->fetchColumn();

?>