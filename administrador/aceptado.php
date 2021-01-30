<?php
   include_once "../bd/conexion.php";
   $idusuario = $_GET['id'];
   if(!empty($_POST)){
        $idnumcontrol = $_POST['idusuario'];
        $query = mysqli_query($conn,"UPDATE usuarios SET estatus = '1' WHERE usuarios.numcontrol = '$idnumcontrol'");
    if($query){
        header("Location: peticiones.php");
    }else{
        $alert = '<div class="alert alert-danger text-center" role="alert">Ocurrio un problema</div>';
    }
  }
   include_once "includes/header.php";
   include_once "menu.php";
   
?>


<div class="container mt-5">
<div class="row justify-content-center">
<div class="col-12 col-md-8 mt-5">
<div class="card mt-5">
<div class="card-header bg-warning text-black text-center ">
<h2>Confirmar</h2>

</div>
      <div><?php echo isset($alert) ? $alert : '' ; ?> </div>
      <div class="card-body">
      <form method ="post" >
       <div class="form-group text-center">
          <label for="titulo" class="h2">¿Desea confirmar esta acción ?</label>
          <input type="hidden" name="idusuario" value="<?php echo  $idusuario ?>">
        </div>
        <div class="text-center">
        <a class="btn btn-danger" href="peticiones.php"role="button">Cancelar</a>
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
  require_once "formafooter.php";