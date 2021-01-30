
<div class="container mt-5">
            <div class="row justify-content-center">
              <div class="col-12 col-md-6">
                <div class="card">
                  <div class="card-header">
                    <h2 class="text-center">Registro al Foro CineTec</h2>
                  </div>
                  <div><?php echo isset($alert) ? $alert : '' ; ?> </div>
                  <div class="card-body">
                  <form method="post">

                    <div class="mb-3">
                      <label for="idalumno" class="form-label">Código del usuario:</label>
                      <input type="text" class="form-control" 
                        id="idalumno" name= "idalumno"
                        placeholder="Ej. E16020870"
                        title="Ej. E16020870"
                        pattern="^[E][0-9]{8,8}$" required>
                    </div>
                    <div class="mb-3">
                     <label for="nombres">Nombres</label>
                     <input type="text" class="form-control" id="nombres" name="nombres" required>
                   </div>
                   <div class="mb-3">
                    <label for="apellidos">Apellidos:</label>
                    <input type="apellidos" class="form-control" id="apellidos" name="apellidos" required>
                  </div>
                  <div class="mb-3">
                    <label for="email">Correo:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                  </div>
                  <div class="mb-3">
                    <label for="Password">Password</label>
                    <input type="password" class="form-control" id="Password" name="password" required>
                  </div>


                    <div class="text-center">
                      <input type="submit" class="btn btn-info text-white" 
                      value="Registrar" >
                      <p class="form_link">¿Ya tienes una cuenta?
                        <a href="../login">Ingresa aquí</a> </p>
                    </div>
                    </form>
                </div>
       
                  <div class="card-footer text-right">
                    <p>¡Gracias por usar el Foro CineTec!</p>
                  </div>

                  
                </div>
              </div>
            </div>
        </div>