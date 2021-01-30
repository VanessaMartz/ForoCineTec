<?php
   include_once "../bd/conexion.php";
   $foro = $_GET['id'];
   if(!empty($_POST)){
        $estatus = $_POST['estatus'];
        $query = mysqli_query($conn,"UPDATE foros SET estatus = '$estatus' WHERE idforo = '$foro'");
    if($query){
        header("Location: mishilos.php");
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
      <h2 align=center>Estatus del foro</h2>
       <div class="form-group text-center">
          <label for="titulo" class="h2">Seleccione el estatus del foro:</label>
         
                    <select class="custom-select" name="estatus" id="estatus">
                <option selected value="abierto">Abierto</option>
                <option value="cerrado">Cerrado</option>
                <option value="baja">Baja</option>
            </select>
            </div>
        </div>
        <div class="text-center">
        <a class="btn btn-danger" href="mishilos.php"role="button">Cancelar</a>
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
include_once "formafooter.php";