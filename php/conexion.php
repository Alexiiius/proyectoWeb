<?php
// Configuración de la base de datos
define('direccion', '127.0.0.1:3306');
define('usuario', 'usuario');
define('password', 'usuario');
define('nombre_db', 'MisVinosDB');
//////////////////////////////////////////////////////////////////////////////////////////

try {
    $pdo = new PDO("mysql:host=" . direccion . ";dbname=" . nombre_db, usuario, password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "CREATE TABLE IF NOT EXISTS usuarios (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        Email VARCHAR(30) UNIQUE not null,
        Contraseña VARCHAR(100) not null,
        DNI CHAR(9)  not null
            CHECK (DNI REGEXP '^[0-9]{8}[A-Za-z]$'),
        Nombre VARCHAR(30) not null
            CHECK (Nombre REGEXP '^[A-Za-z]+$'),
        Apellido VARCHAR(30) not null
                CHECK (Apellido REGEXP '^[A-Za-z]+$'),
        Telefono CHAR(9) not null
                CHECK (Telefono REGEXP '^[0-9]{9}$'),
        FechaNacimiento varchar(20) not null, 
        Pais VARCHAR(30) not null,
        Ciudad VARCHAR(30) not null
                CHECK (Ciudad REGEXP '^[A-Za-z]+$')
        )";
    $pdo->exec($query);

    $query = "CREATE TABLE IF NOT EXISTS articulos (
                id INT(11) AUTO_INCREMENT PRIMARY KEY,
                titulo VARCHAR(30) NOT NULL,
                contenido TEXT NOT NULL,
                id_autor INT(11) NOT NULL,
                FOREIGN KEY (id_autor) REFERENCES usuarios(id)
            )";
    $pdo->exec($query);

    $query = "CREATE TABLE IF NOT EXISTS ratings (
                id INT(11) AUTO_INCREMENT PRIMARY KEY,
                id_usuario INT(11) NOT NULL,
                id_articulo INT(11) NOT NULL,
                puntuaje DECIMAL(2,1) NOT NULL,
                FOREIGN KEY (id_usuario) REFERENCES usuarios(id),
                FOREIGN KEY (id_articulo) REFERENCES articulos(id),
                UNIQUE KEY (id_usuario, id_articulo)
            )";
    $pdo->exec($query);
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    die();
}
?>