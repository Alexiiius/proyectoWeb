<?php
session_start();
require_once ("php/conexion.php");
require_once ("php/mostrar_errores.php");

?>

<!doctype html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal - Viñedos Edroiz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilo.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  </head>
  <body style="background-image: url('/assets/img/fondoBueno.png');">

    
    <?php require_once("php/nav.php"); ?>
    <?php require_once("php/body_index.php"); ?>
    <?php require_once("php/footer.php"); ?> 
    <?php require_once("php/error.php"); ?> 
     
    
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="/js/offcanvas.js"></script>        
  
  </body>
</html>
