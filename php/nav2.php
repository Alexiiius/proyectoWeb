<!-- Contenedor principal de la barra de navegacion con la imagen de fondo y el texto main -->
<div class="row  container-fluid" >
        <div class="">

          <!-- Barra navegacion-->
          <nav id="barra_principal" class="navbar navbar-expand-lg">
            <div class="container-fluid">
              <!-- Enlace permanente al index principal-->
              <a class="navbar-brand" href="/index.php">Vinos Edroiz</a>
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
                        <li><a class="dropdown-item" href="/html/vinoTolosa.php">Vinos de Tolosa</a></li>
                        <li><a class="dropdown-item" href="/html/vinoES.php">Vinos Españoles</a></li>
                        <!-- <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="/html/detallesClub.php">Club Edroiz</a></li> -->
                      </ul>
                    </li>

                    </ul>
                </div>
                <div class="collapse navbar-collapse justify-content-end ml-auto" id="barra_interna">
                  <ul class="navbar-nav  mb-2 mb-lg-0 ml-auto">
                    
                            <!-- escondo los botones si estoy logeado-->
                            <?php if(!isset($_SESSION["correo"]) && empty($_SESSION["contraseña"])) { ?>

                                <li class="nav-item">
                                  <button class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#login_colapse" id="btn_login">Login</button>
                                  <button class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#registro_colapse" id="btn_registro">Registrarse</button>
                                </li>

                                <?php }else{ ?>

                                <li class="nav-item">
                                  <button type="submit" id="enviar_boton" class="btn btn-primary" onclick="window.location.href='/php/cerrar_sesion.php';">Cerrar Sesion</button>
                                </li>

                                <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Mi Cuenta</a>          
                              <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/html/mi_perfil.php">Mi Perfil</a></li>
                                <li><a class="dropdown-item" href="/html/vinoES.php">Vinos Españoles</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="/html/detallesClub.php">Club Edroiz</a></li>
                              </ul>
                            </li>

                            <?php } ?>  

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
          <!-- formulario -->
            <form action="/php/login.php" id="formulario_login" method="post">
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Introduce tu email" required>
                <small class="form-text text-muted">Nunca compartas tu email con nadie más.</small>
              </div>
              <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Introduce tu contraseña" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+]).{8,}" required>
                <small class="form-text text-muted">No debes compartir tu contraseña con otros.</small>
              </div>
              <div class="form-group">
                <button type="submit" id="enviar_boton" class="btn btn-primary">Enviar</button>
              </div>
            </form>

            </div>
          </div>


          
          
          
          
          <!-- Registro offcanvas -->
          <div class="offcanvas offcanvas-end" tabindex="-1" id="registro_colapse" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
              <h5>Registro nuevo Usuario</h5>
              <button class="btn-close text-reset" data-bs-toggle="collapse" data-bs-target="#registro_colapse"></button>
            </div>
            <div class="offcanvas-body">
              <!-- formulario -->
            <form action="/php/registro.php" id="formulario_registro" method="post">
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Introduce tu email" required>
                <small class="form-text text-muted">Nunca compartiremos tu email con nadie más.</small>
              </div>
              <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Introduce tu contraseña" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+]).{8,}" required>
                <small class="form-text text-muted">Debe contener al menos 8 caracteres, una mayúscula, una minúscula, un número y un carácter especial.</small>
              </div>
              <div class="form-group">
                <label for="dni">DNI</label>
                <input type="text" class="form-control" name="dni" id="dni" placeholder="Introduce tu DNI" pattern="[0-9]{8}[A-Za-z]{1}" required>
                <small class="form-text text-muted">Formato válido: 12345678A.</small>
              </div>
              <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Introduce tu nombre" pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+" required>
                <small class="form-text text-muted">No debe contener numeros.</small>
              </div>
              <div class="form-group">
                <label for="apellido">Apellido</label>
                <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Introduce tu apellido" pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+" required>
              </div>
              <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="tel" class="form-control" name="telefono" id="telefono" placeholder="Introduce tu teléfono" pattern="[0-9]{9}" required>
                <small class="form-text text-muted">Formato válido: 123456789.</small>
              </div>
              <div class="form-group">
                <label for="fecha-nacimiento">Fecha Nacimiento</label>
                <input type="date" class="form-control" name="fecha" id="fecha-nacimiento" required>
              </div>
              <div class="form-group">
                <label for="pais">País</label>
                <select class="form-control" name="pais" id="pais" required>
                  <option value="">Selecciona un país</option>
                  <option value="España">España</option>
                  <option value="México">México</option>
                  <option value="Argentina">Argentina</option>
                  <!--Se pueden agregar mas paises aqui al gusto del consumidor-->
                </select>
              </div>
              <div class="form-group">
                <label for="ciudad">Ciudad</label>
                <input type="text" class="form-control" name="ciudad" id="ciudad" placeholder="Introduce tu ciudad" pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+" required>
                <small class="form-text text-muted">No debe contener numeros.</small>
              </div>
              <div class="form-group">
                <button type="submit" id="enviar_boton" class="btn btn-primary">Enviar</button>
              </div>
            </form>

            </div>
          </div>
          <!-- Cierra registro offcanvas -->
         

          

        </div> <!-- Aqui cierra el contenedor secundario para mantener el nav separado de la altura minima de la imagen del primer contenedor -->
        </div> <!-- Aqui cierra el contenedor principal -->