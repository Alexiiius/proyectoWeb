<?php
session_start();
require_once ("../php/conexion.php");
require_once ("../php/mostrar_errores.php");
require_once ("../php/id_usuario.php");
require_once("../php/articulos.php");

if (!isset($_SESSION['correo'])) {
  $errorMensaje = "Debes iniciar sesion para acceder al club.";
  $_SESSION['errorMensaje'] = $errorMensaje; 
  header("Location: /index.php");
  exit();
}

$correo = $_SESSION['correo'];

$query = "SELECT a.*, AVG(r.puntuaje) AS avg_rating FROM articulos a LEFT JOIN ratings r ON a.id = r.id_articulo GROUP BY a.id";
$stmt = $pdo->prepare($query);
$stmt->execute();
$articulos = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['puntuaje'])) {
    $id_articulo = $_POST['id_articulo'];
    $puntuaje = $_POST['puntuaje'];
    $id = $id_autor;

    $query = "INSERT INTO ratings (id_usuario, id_articulo, puntuaje) VALUES (:id_usuario, :id_articulo, :puntuaje)
              ON DUPLICATE KEY UPDATE puntuaje = :puntuaje";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id_usuario', $id);
    $stmt->bindParam(':id_articulo', $id_articulo);
    $stmt->bindParam(':puntuaje', $puntuaje);
    $stmt->execute();

    header("Location: detallesClub.php");
    exit();
}



?>

<!doctype html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Club - Viñedos Edroiz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/estilo.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  </head>
  <body style="background-image: url('/assets/img/fondoBueno.png'); background-size: cover;">

    
    <?php require_once("../php/nav2.php"); ?>
    
            <?php require_once("../php/publicar.php"); ?>  
            <br>
            <h2 class="centrado">Artículos</h2>
            <?php if (!empty($articulos)) { ?>
              <div class="centrado container-fluid"> <!-- div central-->

                        <?php foreach ($articulos as $articulo) { ?>
                            <div class="article fijar_texto articulo-borde">
                                <h4><?php echo $articulo['titulo']; ?></h4>
                                <p><?php echo $articulo['contenido']; ?></p>
                                <br>
                                <div class="puntuaje">
                                    <span>
                                        <?php  
                                              if ($articulo['avg_rating'] !== null) {
                                                  echo "Puntuaje medio: " . round($articulo['avg_rating'], 1);
                                              }else{
                                                echo "Puntuaje medio: 0";
                                              }
                                        ?>
                                      </span>
                                    <?php if ($id_autor != $articulo['id_autor']) { ?>
                                        <form action="detallesClub.php" method="POST">
                                            <input type="hidden" name="id_articulo" value="<?php echo $articulo['id']; ?>">
                                            <select name="puntuaje">
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                            <input type="submit" value="Puntuar">
                                        </form>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } else { ?>
                        <div class="centrado"> <p>No hay artículos disponibles.</p> </div>
                    <?php } ?>  

                </div> <!-- div central-->
        


    <?php require_once("../php/footer.php"); ?>   
    <?php require_once("../php/error.php"); ?>  
    
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="/js/offcanvas.js"></script>        
  
  </body>
</html>