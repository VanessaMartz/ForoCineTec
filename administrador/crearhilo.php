<?php
   include_once "../bd/conexion.php";
   include_once "codcrearhilo.php";
   include_once "includes/header.php";
   include_once "menu.php";
?>


<div class="container mt-5">
<div class="row justify-content-center">
<div class="col-12 col-md-8 mt-5">
<div class="card">


</div>
      <div><?php echo isset($alert) ? $alert : '' ; ?> </div>
      <div class="card-body">
      <form method ="post" >
       <div class="form-group">
       
          <h2 align=center>Nuevo hilo</h2>
          <label for="titulo">Titulo:</label>
          <input type="text" class="form-control" id="titulo" name="titulo" required>
        </div>
        <div class="form-group">
          <label for="clasificacion">Categorías:</label>

          <select class="custom-select" name="clasificacion" id="clasificacion">
                    <option selected disabled value="abierto">Seleccione una categoría...</option>
                      <option  value="accion">Acción </option>
                      <option value="animacion">Animación</option>
                      <option value="comedia">Comedia</option>
                      <option  value="cienciaficcion">Ciencia Ficción</option>
                      <option value="crimen">Crimen</option>
                      <option value="drama">Drama</option>
                      <option value="misterio">Misterio</option>
                      <option value="romance">Romance</option>
                      <option value="suspenso">Suspenso</option>
                      <option value="terror">Terror</option>
                 </select>
        </div>
 
      


        <div class="form-group">
          <label for="descripcion">Comentario :</label>
          <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
        </div>
        <div class="text-right">
        <input class = "btn btn-info"type="submit" value="Crear hilo" name="btnforo">
        </div>
      </form>
</div>
</div>
</div>
</div>

</div>

<?php
  include_once "includes/footer.php";
  require_once "formafooter.php";
?>