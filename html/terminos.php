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
            <h1>Terminos y Condiciones</h1>
        </div>

        <div class="mt-4">
            <h2>Aceptación de los Términos y Condiciones</h2>
            <p>Al acceder y utilizar nuestro sitio web, Viñedo Edroiz, aceptas los siguientes términos y condiciones:</p>
            <h2>Información sobre Viñedo Edroiz</h2>
            <p>Viñedo Edroiz es un sitio web que proporciona información sobre nuestro viñedo. Aquí encontrarás detalles sobre nuestros vinos, técnicas de cultivo y más.</p>
            <h2>Registro y Acceso</h2>
            <p>Para hacer uso completo de los servicios ofrecidos en nuestro sitio web, te puedes registrar y logear. Una vez registrado, tendrás acceso a funciones adicionales, como hacer reseñas de vinos y unirte a nuestro club de socios.</p>
            <h2>Club de Socios</h2>
            <p>Nuestro club de socios es un espacio exclusivo para los usuarios registrados. Aquí podrás dejar reseñas de vinos, compartir tus experiencias y conectarte con otros amantes del vino.</p>
            <h2>Propiedad Intelectual</h2>
            <p>Todos los contenidos presentes en nuestro sitio web, incluyendo textos, imágenes, logotipos y otros elementos, están protegidos por derechos de propiedad intelectual. No está permitida su reproducción o uso no autorizado.</p>
            <h2>Limitación de Responsabilidad</h2>
            <p>No nos hacemos responsables por cualquier daño directo o indirecto que pueda surgir del uso de nuestro sitio web. Siempre recomendamos el consumo responsable de alcohol.</p>
            <h2>Enlaces a Sitios Externos</h2>
            <p>Nuestro sitio web puede contener enlaces a sitios web de terceros. No tenemos control sobre el contenido o las políticas de privacidad de esos sitios y no nos responsabilizamos por ellos.</p>
            <h2>Modificaciones a los Términos y Condiciones</h2>
            <p>Nos reservamos el derecho de actualizar o modificar estos Términos y Condiciones en cualquier momento. Se te notificará cualquier cambio relevante a través de nuestro sitio web.</p>
            <h2>Contacto</h2>
            <p>Si tienes alguna pregunta o inquietud acerca de nuestros Términos y Condiciones, por favor contáctanos a través de los medios de contacto proporcionados en nuestro sitio web.</p>
            <p>Última actualización: 16/5/2023</p>
        </div>
      </div> <!--aqui cierra el container del body -->
   
      <?php require_once("../php/footer.php"); ?>  
      <?php require_once("../php/error.php"); ?>

      



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>         
    <script src="/js/offcanvas.js"></script>   
  </body>
</html>