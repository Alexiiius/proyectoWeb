                  
                  
                  
                  var boton_login = document.querySelector("#btn_login");
                  var boton_registro = document.querySelector("#btn_registro");
                  var offcanvasLogin =  document.querySelector("#login_colapse");
                  var offcanvasRegistro =  document.querySelector("#registro_colapse");

                  boton_login.addEventListener("click", function(){
                    offcanvasRegistro.classList.remove("show");
                    offcanvasLogin.classList.add("show");
                  })

                  boton_registro.addEventListener("click", function(){
                    offcanvasLogin.classList.remove("show");
                    offcanvasRegistro.classList.add("show");
                  })   