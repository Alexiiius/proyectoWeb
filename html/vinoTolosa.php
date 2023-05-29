<?php
session_start();
require_once ("../php/conexion.php");

?>

<!doctype html>
<html lang="es">
  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vinos Tolosa - Viñedos Edroiz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/estilo.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
    

  </head>
  <body style="background-image: url('/assets/img/fondoBueno.png'); background-size: cover;">

    <?php require_once("../php/nav2.php"); ?>
     
    
      <!-- Filas y columnas del contenido -->
      <div class="container-fluid">

                <section class="text-center">
                <div class="container">
                    <h1 class="jumbotron-heading">Nuestra Bodega</h1>
                    <p class="lead text-muted centrado">Un viaje sensorial a través de los exquisitos vinos de Tolosa.</p>
                </div>
                </section>

                <div class="album py-5">
                <div class="container">

                    <div class="row">
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src="/assets/img/VinoTolosa/hoya-del-carmen-2.png" alt="vino">
                        <div class="card-body">
                            <h5 class="centrado">HOYA DEL CARMEN MACABEO 2021</h5>
                            <p class="card-text fijar_texto">Vino elaborado con las mejores uvas de Macabeo de la Familia Tolosa. Ecológico, vegano, moderno y sabroso. Un vino fresco y con una ligereza encantadora. Adecuado para su consumo diario.</p>
                            <div class="d-flex justify-content-between align-items-center">
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src="/assets/img/VinoTolosa/hoya-del-carmen-1.png" alt="vino">
                        <div class="card-body">
                        <h5 class="centrado">HOYA DEL CARMEN TEMPRANILLO</h5>
                            <p class="card-text fijar_texto">Vino elaborado con las mejores uvas de Tempranillo de la Familia Tolosa. Ecológico, Vegano, moderno y sabroso. Un vino fresco y con una ligereza encantadora. Adecuado para tu consumo diario.</p>
                            <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">      
                            </div> 
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src="/assets/img/VinoTolosa/los-halcones-.jpg" alt="vino">
                        <div class="card-body">
                        <h5 class="centrado">VIOGNER BARRICA</h5>
                            <p class="card-text fijar_texto">Enclavado en el «Valle del Cabriel» declarado Reserva de la Biosfera por la UNESCO. La decisión de plantar la variedad foránea Viognier, una variedad originaria del valle del Ródano, fue por la similitud de nuestro territorio.</p>
                            <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">     
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src="/assets/img/VinoTolosa/capricho-divino-2.png" alt="vino">
                        <div class="card-body">
                        <h5 class="centrado">CAPRICHO DIVINO ROSÉ</h5>
                            <p class="card-text fijar_texto">Vino elaborado con las mejores uvas de Bobal de la Familia Tolosa. Ecológico, vegano y saludable. Un vino rosado, fresco, equilibrado, con estilo y sello de autor.</p>
                            <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">                   
                            </div> 
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src="/assets/img/VinoTolosa/capricho-divino.png" alt="vino">
                        <div class="card-body">
                        <h5 class="centrado">CAPRICHO DIVINO VIOGNER</h5>
                            <p class="card-text fijar_texto">Vino elaborado con las mejores uvas Viognier (85%) y Moscatel (15%) de la Familia Tolosa. Ecológico, vegano y saludable. Un vino blanco, fresco, equilibrado, con estilo y sello de autor.</p>
                            <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">                        
                            </div> 
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src="/assets/img/VinoTolosa/capricho-divino-3.png" alt="vino">
                        <div class="card-body">
                        <h5 class="centrado">CAPRICHO DIVINO BOBAL</h5>
                            <p class="card-text fijar_texto">Vino elaborado con las mejores uvas de Bobal de la Familia Tolosa. Ecológico, vegano y saludable. Un vino rosado, fresco, equilibrado, con estilo y sello de autor.</p>
                            <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src="/assets/img/VinoTolosa/cuatro-gatos.png" alt="vino">
                        <div class="card-body">
                        <h5 class="centrado">4 GATOS CABERNET SAUVIGNON</h5>
                            <p class="card-text fijar_texto">De nuestra finca “La Lincha” de Cabernet Sauvignon plantando en 1.998 nace este vino “de autor” ecológico. Este de vino de parcela refleja la personalidad de La Manchuela, ecológico y vegano.</p>
                            <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">  
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src="/assets/img/VinoTolosa/bobal-icon-ok.png" alt="vino">
                        <div class="card-body">
                        <h5 class="centrado">BOBAL ICON</h5>
                            <p class="card-text fijar_texto">Vino elaborado con la selección de nuestras mejores uvas de Bobal procedentes de nuestros viñedos viejos de mas de 80 años y un paso de 6 meses de crianza en barrica de roble francés.</p>
                            <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group"> 
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src="/assets/img/VinoTolosa/finca-los-halcones-2.png" alt="vino">
                        <div class="card-body">
                        <h5 class="centrado">FINCA LOS HALCONES LIMITADA</h5>
                            <p class="card-text fijar_texto">El vino es el resultado de una selección de 55 barricas de roble francés, donde solamente se elaboran 16.600 botellas. Este vino puede crear sedimentos porque no ha sido clarificado, ni filtrado, para no perder su identidad.</p>
                            <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group"> 
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>

      </div> <!--aqui cierra el container del body -->
   
      <?php require_once("../php/footer.php"); ?>  
      <?php require_once("../php/error.php"); ?>

      



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>         
    <script src="/js/offcanvas.js"></script>   
  </body>
</html>