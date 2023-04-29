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

    
    <!-- Contenedor principal de la barra de navegacion con la imagen de fondo y el texto main -->
      <div class="row altura2 container-fluid" style="background-image: url('assets/img/fondoviñedo.png'); background-size: cover;" >
        <div class="">

          <!-- Barra navegacion-->
          <nav id="barra_principal" class="navbar navbar-expand-lg">
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
                    <!-- <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="index.php">Principal</a>
                    </li> -->
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Tipos de Vinos</a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="html/vinoTolosa.html">Vinos de Tolosa</a></li>
                        <li><a class="dropdown-item" href="html/vinoES.html">Vinos Españoles</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="html/detallesClub.html">Club Edroiz</a></li>
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
              
            <form>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Introduce tu email" required>
                <small class="form-text text-muted">Nunca compartiremos tu email con nadie más.</small>
              </div>
              <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" id="password" placeholder="Introduce tu contraseña" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+]).{8,}" required>
                <small class="form-text text-muted">Debe contener al menos 8 caracteres, una mayúscula, una minúscula, un número y un carácter especial.</small>
              </div>
              <div class="form-group">
                <label for="dni">DNI</label>
                <input type="text" class="form-control" id="dni" placeholder="Introduce tu DNI" pattern="[0-9]{8}[A-Za-z]{1}" required>
                <small class="form-text text-muted">Formato válido: 12345678A.</small>
              </div>
              <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" placeholder="Introduce tu nombre" pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+" required>
                <small class="form-text text-muted">No debe contener numeros.</small>
              </div>
              <div class="form-group">
                <label for="apellido">Apellido</label>
                <input type="text" class="form-control" id="apellido" placeholder="Introduce tu apellido" pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+" required>
              </div>
              <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="tel" class="form-control" id="telefono" placeholder="Introduce tu teléfono" pattern="[0-9]{9}" required>
                <small class="form-text text-muted">Formato válido: 123456789.</small>
              </div>
              <div class="form-group">
                <label for="fecha-nacimiento">Fecha Nacimiento</label>
                <input type="date" class="form-control" id="fecha-nacimiento" required>
              </div>
              <div class="form-group">
                <label for="pais">País</label>
                <select class="form-control" id="pais" required>
                  <option value="">Selecciona un país</option>
                  <option value="España">España</option>
                  <option value="México">México</option>
                  <option value="Argentina">Argentina</option>
                  <!--Se pueden agregar mas paises aqui al gusto del consumidor-->
                </select>
              </div>
              <div class="form-group">
                <label for="ciudad">Ciudad</label>
                <input type="text" class="form-control" id="ciudad" placeholder="Introduce tu ciudad" pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+" required>
                <small class="form-text text-muted">No debe contener numeros.</small>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Enviar</button>
              </div>
            </form>

            </div>
          </div>
          <!-- Cierra registro offcanvas -->

        </div> <!-- Aqui cierra el contenedor secundario para mantener el nav separado de la altura minima de la imagen del primer contenedor -->
          <div class="centrado">
            <h1 class="fondo_verde">Conexiones singulares. Vinos excepcionales</h1>
            <p class="blanco">
              El mundo del vino es una aventura apasionante, en la que cada botella cuenta una historia única y singular. 
              Pero hay ciertas conexiones, ciertas experiencias que son excepcionales, que nos transportan 
              a un universo de sabores, aromas y texturas que se convierten en algo inolvidable. 
              Y precisamente esas conexiones singulares, son las que nos permiten disfrutar de vinos excepcionales.
            </p>
          </div>
      </div> <!-- Aqui cierra el contenedor principal -->

      <!-- Filas y columnas del contenido -->
      <div class="container-fluid">

      <div class="row altura">
            <div class="col centrado bordes altura4" style="background-image: url('assets/img/fondoBueno.png');">
              <h1>Un marco excepcional</h1>
              <p class="fijar_texto">
                Bodegas Edroiz se sitúa en el corazón de Rioja Alavesa, a los pies de Sierra Cantabria.
                Una bodega boutique de vanguardia, en completa armonía con el paisaje que la rodea. 
                Nuestros viñedos disfrutan de las particularidades que brinda esta tierra para cultivar uvas de la más alta calidad.
              </p>
            </div>
            <div class="col bordes imagenes" style="background-image: url('assets/img/viñedo2.png');">
            </div>
          </div>

          <div class="row altura">
            <div class="col bordes imagenes" style="background-image: url('assets/img/uvas.png');">
            </div>
            <div class="col centrado bordes" style="background-image: url('assets/img/fondoBueno.png');">
              <h1>Nuestros vinos</h1>
              <p class="fijar_texto text-wrap">
                Tenemos un vínculo personal con el viñedo. 
                Nuestra filosofía de micro-cultivación y la vinificación en pequeños lotes 
                nos permiten elaborar vinos excepcionales que expresan 
                la singularidad del terroir de nuestra región.
              </p>
            </div>
          </div>

          <div class="row altura ">
            <div class="col centrado bordes" style="background-image: url('assets/img/fondoBueno.png')">
              <h1>Club Edroiz</h1>
              <p class="fijar_texto">
                Nuestra filosofía de elaboración es respetar la 
                identidad de la variedad Tempranillo y las tradiciones 
                de nuestra zona autóctona de Rioja aportando 
                complejidad a partir de una selección muy especial de 
                toneleros, barricas y la creatividad de nuestro enólogo.
                Así conseguimos unos vinos únicos, concentrados, sedosos y complejos.
              </p>
            </div>
            <div class="col bordes imagenes " style="background-image: url('assets/img/vinos4.png');">
            </div>
          </div>
          

          

      </div> <!--aqui cierra el container del body -->

      <div class="row" style="background-image: url('assets/img/viñedo.png'); background-size: cover;" >
        <!-- row4 mapa de google -->
        <div class="row">
              <div class="col imagenes">
                <div class="text-center">
                  <h1>Nuestra ubicación</h1>
                  <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14359.811264940765!2d-4.381622000907128!3d36.71760015824703!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd7259120bfc4db3%3A0xec0ecedd8dc61902!2sCesur%20Formaci%C3%B3n!5e0!3m2!1ses!2ses!4v1681290570463!5m2!1ses!2ses" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
              </div>
        </div> <!-- aqui cierra la row4 del mapa de google -->
      </div>    

      <!-- Footer -->
      <footer class="bg-dark text-light">
        <div class="container">
          <div class="row">

            <div class="col margin">
              <a href = 'index.php'><img style="" src="assets/img/logo.png" alt="Bodegas Edroiz" title="Bodegas Edroiz" /></a>
              <p>Camino del Brexit</p><p>66666 Titanic</p><p>Gibraltar, España</p>
            </div>

            <div class="col margin">
              <ul >
                <li><a class="quitarAzul" href="html/vinoTolosa.html">Vinos de Tolosa</a></li>
                <li><a class="quitarAzul" href="html/vinoES.html">Vinos Españoles</a></li>
                <li><a class="quitarAzul" href="html/detallesClub.html">Club Edroiz</a></li>
              </ul>
            </div>

            <div class="col margin">
            <ul >
                <li><a class="quitarAzul" href="html/politicaprivacidad.html">Politicas de Privacidad</a></li>
                <li><a class="quitarAzul" href="html/terminos.html">Terminos y Condiciones</a></li>
                <li><a class="quitarAzul" href="html/cookies.html">Politicas de Cookies</a></li>
              </ul>
            </div>

            <div class="col margin">
              <p>Este es el contenido de mi pie de página.</p>
            </div>

          </div>
        </div>
      </footer>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="js/offcanvas.js"></script>           
  
  </body>
</html>