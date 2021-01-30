<section>
<div class="container mt-5">
   <div class="row justify-content-center">
       <div class="offset col-12 col-md-8">
            <div class="card">
                <div class="card-header bg-light text-black text-center">  
                  <h2>Iniciar Sesión</h2>
                </div>
                <div class="card-body">
                <form method="post">
                <div class="form-group">
                      <label for="idalumno">Código de control Ej: E16020863</label>
                      <input type="text" class="form-control" 
                      title="EJ. E16020863"
                      placeholder="EJ. E16020863"
                      required
                      id="idalumno" name="idalumno">
                      <div class="form-group">
                      <label for="Password">Password</label>
                      <input type="password" class="form-control" id="Password" name="password" required>
                      </div>
                       <div class="text-right">
                       <div><?php echo isset($alert) ? $alert : '' ; ?> </div>
                        <input class = "btn btn-info"type="submit" value="Entrar" name="btnLogin">
                    </div>
      
                    </form> <br>
                 
                </div>
            </div>
       </div>
   </div>
</div>
</section>