<?php
session_start();
require_once ("../php/conexion.php");

?>

<!doctype html>
<html lang="es">
  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Politica Privacidad - Viñedos Edroiz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/estilo.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

  </head>
  <body style="background-image: url('/assets/img/fondoBueno.png'); background-size: cover;">

    <?php require_once("../php/nav2.php"); ?>
     
    
      <!-- Filas y columnas del contenido -->
      <div class="container">

        <div class="text-center mt-5">
            <h1>Política de Privacidad</h1>
        </div>

        <div class="mt-4">
            <h2>1. Recopilación de información</h2>
            <p>Recopilamos información personal que nos proporcionas voluntariamente al registrarte en nuestro sitio web, incluyendo tu nombre, dirección de correo electrónico y otros detalles necesarios para crear una cuenta de usuario. Además, cuando interactúas con nuestra página web, podemos recopilar automáticamente ciertos datos técnicos, como tu dirección IP, tipo de navegador, idioma y páginas visitadas.</p>
            <h2>2. Uso de la información</h2>
            <p>Utilizamos la información recopilada para brindarte una experiencia personalizada en nuestra página web, incluyendo la posibilidad de registrarte y acceder a nuestro club de socios para dejar reseñas de vinos. También podemos utilizar tu dirección de correo electrónico para enviarte comunicaciones relacionadas con nuestra viña y eventos especiales, siempre y cuando hayas dado tu consentimiento para recibir dichas comunicaciones.</p>
            <h2>3. Protección de la información</h2>
            <p>Mantenemos medidas de seguridad técnicas y organizativas apropiadas para proteger la información personal que recopilamos y evitar su pérdida, mal uso, acceso no autorizado o divulgación. Sin embargo, debes tener en cuenta que ninguna transmisión de datos a través de Internet o método de almacenamiento electrónico es completamente seguro, por lo que no podemos garantizar la seguridad absoluta de la información transmitida o almacenada en nuestro sistema.</p>
            <h2>4. Compartir información</h2>
            <p>No compartiremos tu información personal con terceros sin tu consentimiento, excepto en los siguientes casos limitados:<br><br>*Cuando sea necesario para cumplir con una solicitud o transacción que hayas realizado, por ejemplo, para procesar una orden de compra de vinos.<br>*Cuando sea requerido por ley o para cumplir con una orden judicial o proceso legal.<br>*Cuando sea necesario para proteger nuestros derechos, propiedad o seguridad, o los derechos, propiedad o seguridad de nuestros usuarios u otros.</p>
            <h2>5. Cookies y tecnologías similares</h2>
            <p>Utilizamos cookies y tecnologías similares para mejorar tu experiencia en nuestro sitio web y recopilar información sobre el uso de nuestra página. Puedes configurar tu navegador para rechazar todas las cookies o para indicar cuándo se está enviando una cookie. Sin embargo, ten en cuenta que esto puede afectar la funcionalidad de nuestro sitio web.</p>
            <h2>6. Enlaces a sitios de terceros</h2>
            <p>Nuestra página web puede contener enlaces a sitios web de terceros. No nos hacemos responsables de las prácticas de privacidad o el contenido de estos sitios. Te recomendamos revisar las políticas de privacidad de dichos sitios antes de proporcionarles cualquier información personal.</p>
            <h2>7. Cambios en nuestra Política de Privacidad</h2>
            <p>Nos reservamos el derecho de actualizar o modificar esta Política de Privacidad en cualquier momento. Te notificaremos sobre cualquier cambio importante publicando la versión actualizada en nuestra página web. Te recomendamos revisar periódicamente esta Política de Privacidad para estar al tanto de las prácticas actuales.</p>
            <p>Si tienes alguna pregunta o inquietud sobre nuestra Política de Privacidad o el manejo de tu información personal, no dudes en contactarnos a través de los medios de contacto proporcionados en nuestro sitio web.</p>
            <p>Última actualización: 16/5/2023</p>
        </div>
      </div> <!--aqui cierra el container del body -->
   
      <?php require_once("../php/footer.php"); ?>  
      <?php require_once("../php/error.php"); ?>

      



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>         
    <script src="/js/offcanvas.js"></script>   
  </body>
</html>