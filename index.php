<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pagina principal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="css/estilo.css" rel="stylesheet">

  </head>
  <body>

    <!-- Barra navegacion-->
    <nav id="barra_principal" class="navbar navbar-expand-lg bg-info ">
      <div class="container-fluid">
        <!-- Enlace permanente al index principal-->
        <a class="navbar-brand" href="index.php">Vinos Edroiz</a>
        <!-- Boton para desplegar el div interno en caso de reducirse la pantalla-->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#barra_interna" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <!-- div interno con los enlaces internos-->
          <div class="collapse navbar-collapse" id="barra_interna">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Tipos de Vinos</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Vinos de Tolosa</a></li>
                  <li><a class="dropdown-item" href="#">Vinos Españoles</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Nuestra bodega</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <button class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#login_colapse" id="btn_login">Login</button>
                <button class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#registro_colapse" id="btn_registro">Registrarse</button>
              </li>
            </ul>
          </div>
      </div>
    </nav>

      <!-- Login offcanvas -->
      <div class="offcanvas offcanvas-end" tabindex="-1" id="login_colapse" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
          <h5>Login de Usuario</h5>
          <button class="btn-close text-reset" data-bs-toggle="collapse" data-bs-target="#login_colapse"></button>
        </div>
        <div class="offcanvas-body">
          Formulario
        </div>
      </div>

      <!-- Registro offcanvas -->
      <div class="offcanvas offcanvas-end" tabindex="-1" id="registro_colapse" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
          <h5>Registro nuevo Usuario</h5>
          <button class="btn-close text-reset" data-bs-toggle="collapse" data-bs-target="#registro_colapse"></button>
        </div>
        <div class="offcanvas-body">
          Formulario
        </div>
      </div>

      <!-- Filas y columnas del contenido -->
      <div class="container">

        <!-- row1 -->
        <div class="row"> 
          <div class="col col-lg-8 imagenes" id="scroll_texto">
            <!-- Scroll de texto -->
            <nav id="navbar-example2" class="navbar navbar-light px-3">
              <a class="navbar-brand" href="#"></a>
              <ul class="nav nav-pills">
                <li class="nav-item">
                  <a class="nav-link" href="#scrollspyHeading1">Nuestra historia</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#scrollspyHeading2">Implicaciones</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Mas</a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#scrollspyHeading3">Expansion</a></li>
                    <li><a class="dropdown-item" href="#scrollspyHeading4">Nuestro Equipo</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
            <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="0" class="scrollspy-example" tabindex="0">
                <h4 id="scrollspyHeading1">Nuestra historia</h4>
                  <p>
                    Viñedo Edroiz es una de las bodegas más importantes en España, con una larga trayectoria en la producción de vinos de alta calidad. Esta bodega cuenta con una tradición de más de 100 años cultivando viñedos, lo que les ha permitido obtener una gran experiencia en la selección y cuidado de las uvas, así como en el proceso de elaboración de vinos.
                    Ubicado en una zona privilegiada de España, Viñedo Edroiz cuenta con un clima ideal para el cultivo de uvas, lo que les permite obtener vinos con características únicas y sabores excepcionales. Además, la bodega tiene un gran compromiso con la sostenibilidad, utilizando técnicas de cultivo respetuosas con el medio ambiente.
                    La bodega produce una amplia variedad de vinos, desde tintos intensos y elegantes, hasta blancos frescos y afrutados. Todos ellos tienen en común su alta calidad y su elaboración artesanal, lo que los convierte en auténticas joyas de la enología española.
                    En resumen, Viñedo Edroiz es una bodega con una larga tradición y experiencia en la producción de vinos de alta calidad en España. Sus vinos, elaborados con cuidado y pasión, son un verdadero tesoro de la enología española que no debe dejar de probar.
                  </p>
                <h4 id="scrollspyHeading2">Implicaciones</h4>
                  <p>
                    Además de su larga trayectoria en la producción de vinos, Viñedo Edroiz también destaca por su compromiso con la innovación y la mejora continua de sus procesos de producción. La bodega ha invertido en tecnología de última generación para mejorar la calidad de sus vinos, al mismo tiempo que mantiene su compromiso con la producción artesanal.
                    Los viñedos de Viñedo Edroiz se encuentran en una de las regiones vitivinícolas más importantes de España, lo que les permite aprovechar al máximo las características únicas del terroir para obtener vinos con sabores y aromas excepcionales. Los viñedos de la bodega están ubicados en una zona privilegiada, rodeados de montañas y protegidos de los vientos, lo que les proporciona una temperatura y humedad ideales para el cultivo de uvas.
                    La bodega también se preocupa por el turismo enológico, ofreciendo visitas guiadas a sus instalaciones y catas de sus vinos. Los visitantes pueden disfrutar de una experiencia única en la que podrán conocer más sobre la historia y la cultura del vino en España, así como degustar algunos de los mejores vinos de la bodega.
                    En resumen, Viñedo Edroiz es una bodega que combina la tradición y la experiencia con la innovación y la tecnología de última generación para producir algunos de los mejores vinos de España. Sus viñedos están ubicados en una zona privilegiada, rodeados de montañas y protegidos de los vientos, lo que les permite aprovechar al máximo las características únicas del terroir para obtener vinos de alta calidad. Además, la bodega se preocupa por el turismo enológico, ofreciendo visitas guiadas y catas de sus vinos para que los visitantes puedan disfrutar de una experiencia única.
                  </p>
                <h4 id="scrollspyHeading3">Expansion</h4>
                  <p>
                    Recientemente, Viñedo Edroiz ha dado un paso importante en su expansión al mercado web, ofreciendo a sus clientes la posibilidad de comprar sus vinos a través de su página web. Ahora, los amantes del vino de todo el mundo pueden disfrutar de los vinos de Viñedo Edroiz desde la comodidad de sus hogares.
                    La página web de Viñedo Edroiz ofrece una experiencia de compra sencilla y fácil de usar, en la que los clientes pueden elegir entre una amplia variedad de vinos y realizar su compra con seguridad y confianza. Además, la bodega ofrece envío a todo el mundo, lo que permite que los clientes de cualquier país puedan disfrutar de sus vinos.
                    Esta expansión al mercado web es un paso importante para Viñedo Edroiz, que se ha adaptado a las nuevas tendencias y ha aprovechado la tecnología para llegar a un público más amplio. Al mismo tiempo, la bodega mantiene su compromiso con la calidad y la tradición en la producción de sus vinos, ofreciendo a sus clientes la misma excelencia en cada botella.
                    En resumen, la expansión al mercado web de Viñedo Edroiz es una muestra de su adaptabilidad y visión de futuro, combinando la tradición y la calidad con la tecnología y la innovación. Ahora, los clientes de todo el mundo pueden disfrutar de los vinos de esta bodega de renombre, desde la comodidad de sus hogares, gracias a su página web segura y fácil de usar.
                  </p>
                <h4 id="scrollspyHeading4">Nuestro Equipo</h4>
                <p>
                  Sin lugar a dudas, el éxito de Viñedo Edroiz no sería posible sin el compromiso y la dedicación de sus colaboradores y granjeros. Estos hombres y mujeres son los verdaderos artífices de los vinos de calidad excepcional que se producen en esta bodega.
                  Los colaboradores de Viñedo Edroiz son expertos en su campo, con una larga trayectoria y experiencia en la producción de vinos. Su conocimiento del terroir y las variedades de uva, junto con su compromiso con la calidad y la tradición, hacen posible que cada botella de vino de Viñedo Edroiz sea una obra maestra.
                  Los granjeros, por su parte, son los responsables de cuidar y cultivar los viñedos, garantizando que las uvas crezcan en las mejores condiciones posibles. Su dedicación y esfuerzo en cada etapa del proceso de producción de vino son cruciales para asegurar la calidad y el sabor de los vinos de Viñedo Edroiz.
                  En definitiva, los colaboradores y granjeros de Viñedo Edroiz son un pilar fundamental en el éxito de esta bodega. Su compromiso con la calidad, la tradición y la innovación es un ejemplo a seguir en el mundo de la producción de vino. Su dedicación y esfuerzo son la clave para producir los mejores vinos de España y llevarlos a los hogares de todo el mundo.
                </p>
            </div>
          </div>

          
            <div class="col col-lg-3 imagenes">
              <div class="row">
                  <div class="col imagenes">
                    <div class="text-center img-max2">
                      <i class="bi bi-facebook"></i>
                      <p>Vino de jerez</p>
                    </div>
                </div>
                <div class="col imagenes">
                  <div class="text-center img-max2">
                    <img src="assets/img/vino1.png" class="img-fluid" alt="vinodelbueno">
                    <p>Vino de jerez</p>
                  </div>
                </div>
              </div>
            </div>
          

        </div>

          <!-- row2 -->
          <div class="row">
            <div class="col imagenes">
              <div class="text-center img-max">
                <img src="assets/img/vino1.png" class="img-fluid" alt="vinodelbueno">
                <p>Vino de jerez</p>
              </div>
            </div>
            <div class="col imagenes">
              <div class="text-center img-max">
                <img src="assets/img/uvas.png" class="img-fluid" alt="vinodelbueno">
                <p>Cultivo de jerez</p>
              </div>
            </div>
            <div class="col imagenes">
              <div class="text-center img-max">
                <img src="assets/img/vinos4.png" class="img-fluid" alt="vinodelbueno">
                <p>Vinos de jerez</p>
              </div>
            </div>
            <div class="col imagenes">
              <div class="text-center img-max">
                <img src="assets/img/vino1.png" class="img-fluid" alt="vinodelbueno">
                <p>Vino de jerez</p>
              </div>
            </div>
          </div>

          <!-- row3 -->
          <div class="row">
            <div class="col imagenes">
              <div class="text-center img-max">
                <img src="assets/img/vino1.png" class="img-fluid" alt="vinodelbueno">
                <p>Vino de jerez</p>
              </div>
            </div>
            <div class="col imagenes">
              <div class="text-center img-max">
                <img src="assets/img/vino1.png" class="img-fluid" alt="vinodelbueno">
                <p>Vino de jerez</p>
              </div>
            </div>
            <div class="col imagenes">
              <div class="text-center img-max">
                <img src="assets/img/vino1.png" class="img-fluid" alt="vinodelbueno">
                <p>Vino de jerez</p>
              </div>
            </div>
          </div>

          <!-- row4 -->
          <div class="row">
            <div class="col imagenes">
              <div class="text-center">
                <h1>Nuestra ubicación</h1>
                <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14359.811264940765!2d-4.381622000907128!3d36.71760015824703!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd7259120bfc4db3%3A0xec0ecedd8dc61902!2sCesur%20Formaci%C3%B3n!5e0!3m2!1ses!2ses!4v1681290570463!5m2!1ses!2ses" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div>
            </div>
          </div>
      </div>


      <!-- Footer -->
      <footer class="bg-dark text-light">
        <div class="container">
          <div class="row">
            <div class="col">
              <p>Este es el contenido de mi pie de página.</p>
            </div>
          </div>
        </div>
      </footer>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="js/offcanvas.js"></script>           
  
  </body>
</html>