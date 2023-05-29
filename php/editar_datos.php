<?php 

if ($showAccountSettings) { ?>
                <h3>Ajustes de cuenta</h3>
                <form id="cuadro_actu" method="post" action="/php/validar_actualizar.php">
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
              <input type="submit" name="update" value="Actualizar datos de cuenta">
              </div>
                </form>
                <?php } else { ?>
                <form method="post" action="">
                  <input type="submit" name="edit" value="Editar datos">
                </form>
                <?php } 
                
?>