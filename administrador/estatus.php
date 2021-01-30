<?php
   include_once "../bd/conexion.php";
   $foro = $_GET['id'];
   if(!empty($_POST)){
        $estatus = $_POST['estatus'];
        $query = mysqli_query($conn,"UPDATE foros SET estatus = '$estatus' WHERE idforo = '$foro'");
    if($query){
        header("Location: index.php");
    }else{
        $alert = '<div class="alert alert-danger text-center" role="alert">Ocurrio un error</div>';
    }
  }
   include_once "includes/header.php";
   include_once "menu.php";
   
?>


<div class="container mt-5">
<div class="row justify-content-center">
<div class="col-12 col-md-8 mt-5">
<div class="card mt-5">



</div>
      <div><?php echo isset($alert) ? $alert : '' ; ?> </div>
      <div class="card-body">
      <form method ="post" >
       <div class="form-group text-center">
          <h2>Estado del foro</h2>
          <label for="titulo" class="h3">Elija el estatus del hilo:</label>
         
                    <select class="custom-select" name="estatus" id="estatus">
                    <option selected disabled value="abierto">Seleccione una opcion...</option>
                <option  value="abierto">Abierto</option>
                <option value="cerrado">Cerrado</option>
                <option value="baja">Baja</option>
            </select>
            </div>
        </div>
        <div class="text-center">
        <a class="btn btn-danger" href="index.php"role="button">Cancelar</a>
        <input class = "btn btn-success"type="submit" value="Aceptar" name="btnforo">
        </div>
      </form>
</div>
</div>
</div>
</div>

</div>

<?php
 
  include_once "includes/footer.php";