<?php
  session_start();
  require_once ("../php/conexion.php");
  require_once ("../php/mostrar_errores.php");
  require_once("../php/articulos.php");

  if (!isset($_SESSION['correo'])) {
    $errorMensaje = "Debes iniciar sesion para acceder al club.";
    $_SESSION['errorMensaje'] = $errorMensaje; 
    header("Location: /index.php");
    exit();
  }

  $correo = $_SESSION['correo'];
  $nombre = $_SESSION['nombre'];

  $showAccountSettings = false;

if (isset($_POST['edit'])) {
    $showAccountSettings = true;
}

?>

<!doctype html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil - Viñedos Edroiz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/estilo.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  </head>
  <body style="background-image: url('/assets/img/fondoBueno.png'); background-size: cover;">

    
    <?php require_once("../php/nav2.php"); ?>
    

    


<div class="container d-flex justify-content-center align-items-center">
  <div class="row">
    <div class="col">
      <div class="row">
        <div class="col">

          <h2>Bienvenido, <?php echo $nombre; ?></h2>

          </div>
        </div>
      <div class="row">
        <div class="col">

        <?php require_once("../php/editar_datos.php"); ?>

        </div>
      </div>
      <div class="row">
        <div class="col">

        <h3>Mis Post</h3>
        
        <?php

$query = "SELECT * FROM articulos WHERE id_autor = :id_autor";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':id_autor', $id_autor);
$stmt->execute();
$articulos = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($articulos as $articulo) {

    echo "<div class=\"article\">";
    echo "<h4>" . $articulo['titulo'] . "</h4>";
    echo "<p>" . $articulo['contenido'] . "</p>";
    echo "<a href='mi_perfil.php?delete=" . $articulo['id'] . "'>Eliminar artículo</a><br><br>";
    echo "</div>";

}
?>

        </div>     
      </div>
    </div>
  </div>
</div>




    
    <?php require_once("../php/footer.php"); ?>   
    <?php require_once("../php/error.php"); ?>  
    
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="/js/offcanvas.js"></script>        
  
  </body>
</html>