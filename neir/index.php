<?php
session_start();
require_once 'php/db.php';

$query = "SELECT a.*, AVG(r.rating) AS avg_rating FROM articles a LEFT JOIN ratings r ON a.id = r.article_id GROUP BY a.id";
$stmt = $conn->prepare($query);
$stmt->execute();
$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['rating'])) {
    $articleId = $_POST['article_id'];
    $rating = $_POST['rating'];
    $userId = $_SESSION['user_id'];

    $query = "INSERT INTO ratings (user_id, article_id, rating) VALUES (:user_id, :article_id, :rating)
              ON DUPLICATE KEY UPDATE rating = :rating";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':user_id', $userId);
    $stmt->bindParam(':article_id', $articleId);
    $stmt->bindParam(':rating', $rating);
    $stmt->execute();

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Artículos</title>
    <link rel="stylesheet" type="text/css" href="css/estilo2.css">
</head>
<body>
    <h2>Artículos</h2>
    <?php if (!empty($articles)) { ?>
        <?php foreach ($articles as $article) { ?>
            <div class="article">
                <h4><?php echo $article['title']; ?></h4>
                <p><?php echo $article['content']; ?></p>
                <div class="rating">
                    <span class="average-rating"><?php echo "Media score:".round($article['avg_rating'], 1); ?></span>
                    <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] != $article['author_id']) { ?>
                        <form action="index.php" method="POST">
                            <input type="hidden" name="article_id" value="<?php echo $article['id']; ?>">
                            <select name="rating">
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <input type="submit" value="Puntúar">
                        </form>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    <?php } else { ?>
        <p>No hay artículos disponibles.</p>
<?php } ?>
<?php if (isset($_SESSION['username'])) { ?>
    <a class="dashboard-link" href="php/dashboard.php">Panel de control</a>
    <a class="linkerino" href="php/logout.php">Cerrar sesión</a>
<?php } else { ?>
    <p><a class="linkerino" href="php/login.php">Iniciar sesión</a></p>
    <p><a class="linkerino" href="php/register.php">Registrarse</a></p>
<?php } ?>

