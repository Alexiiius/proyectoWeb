<?php
// Configuración de la base de datos
define('DB_HOST', '127.0.0.1:3306');
define('DB_USER', 'usuario');
define('DB_PASS', 'usuario');
define('DB_NAME', 'MisVinosDB');
//////////////////////////////////////////////////////////////////////////////////////////

try {
    $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "CREATE TABLE IF NOT EXISTS users (
                id INT(11) AUTO_INCREMENT PRIMARY KEY,
                username VARCHAR(50) NOT NULL,
                password VARCHAR(255) NOT NULL
            )";
    $conn->exec($query);

    $query = "CREATE TABLE IF NOT EXISTS articles (
                id INT(11) AUTO_INCREMENT PRIMARY KEY,
                title VARCHAR(255) NOT NULL,
                content TEXT NOT NULL,
                author_id INT(11) NOT NULL,
                FOREIGN KEY (author_id) REFERENCES users(id)
            )";
    $conn->exec($query);

    $query = "CREATE TABLE IF NOT EXISTS ratings (
                id INT(11) AUTO_INCREMENT PRIMARY KEY,
                user_id INT(11) NOT NULL,
                article_id INT(11) NOT NULL,
                rating DECIMAL(2,1) NOT NULL,
                FOREIGN KEY (user_id) REFERENCES users(id),
                FOREIGN KEY (article_id) REFERENCES articles(id),
                UNIQUE KEY (user_id, article_id)
            )";
    $conn->exec($query);
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    die();
}
?>
