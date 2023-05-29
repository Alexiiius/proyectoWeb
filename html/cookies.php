<?php
session_start();
require_once ("../php/conexion.php");

?>

<!doctype html>
<html lang="es">
  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookies - Viñedos Edroiz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/estilo.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

  </head>
  <body style="background-image: url('/assets/img/fondoBueno.png'); background-size: cover;">

    <?php require_once("../php/nav2.php"); ?>
     
    
      <!-- Filas y columnas del contenido -->
      <div class="container">

        <div class="text-center mt-5">
            <h1>Política de Cookies</h1>
        </div>

        <div class="mt-4">
            <p>En nuestro sitio web, Viñedo Edroiz, utilizamos cookies para brindarte una mejor experiencia de usuario y mejorar nuestros servicios. Al utilizar nuestro sitio, aceptas el uso de cookies de acuerdo con esta política.</p>
            <p>Las cookies son pequeños archivos de texto que se almacenan en tu dispositivo cuando visitas nuestro sitio web. Estas cookies nos permiten recordar tus preferencias y ofrecerte contenido personalizado.</p>
            <p>Utilizamos cookies de sesión y cookies persistentes en nuestro sitio web. Las cookies de sesión se eliminan automáticamente cuando cierras tu navegador, mientras que las cookies persistentes permanecen en tu dispositivo durante un período de tiempo determinado o hasta que las elimines manualmente.</p>
            <p>Algunas de las cookies que utilizamos son esenciales para el funcionamiento del sitio web, mientras que otras son opcionales y requieren tu consentimiento. Puedes ajustar tus preferencias de cookies a través de la configuración de tu navegador.</p>
            <p>También utilizamos cookies de terceros, como Google Analytics, para recopilar información anónima sobre el uso del sitio y realizar análisis estadísticos. Estas cookies son gestionadas por terceros y están sujetas a sus propias políticas de privacidad y cookies.</p>
            <p>Al utilizar nuestro sitio web, aceptas el uso de cookies de acuerdo con esta política. Si no estás de acuerdo con el uso de cookies, te recomendamos que no continúes navegando en nuestro sitio.</p>
            <p>Para obtener más información sobre cómo utilizamos las cookies y cómo puedes gestionar tus preferencias de cookies, consulta nuestra <a href="/Proyecto/proyecto_web/html/politicaprivacidad.html">Política de Privacidad</a>.</p>
        </div>
      </div> <!--aqui cierra el container del body -->
   
      <?php require_once("../php/footer.php"); ?>  
      <?php require_once("../php/error.php"); ?>

      



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>         
    <script src="/js/offcanvas.js"></script>   
  </body>
</html>