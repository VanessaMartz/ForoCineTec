<?php
   include_once "../bd/conexion.php";
   $idf = $_GET['id'];
   if(!empty($_POST)){
        $idforo = $_POST['idf'];
        $query = mysqli_query($conn,"UPDATE foros SET permiso = 'rechazado' WHERE idforo = '$idforo'");
        
    if($query){
        header("Location: accesos.php");
    }else{
        $alert = '<div class="alert alert-danger text-center" role="alert">Ocurrio un problema al eliminar</div>';
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
          <label for="idf" class="h2">¿Confirmar acción?</label>
          <input type="hidden" name="idf" value="<?php echo  $idf ?>">
        </div>
        <div class="text-center">
          <a class="btn btn-danger" href="accesos.php"role="button">Cancelar</a>
          <input class = "btn btn-success"type="submit" value="Aceptar" name="btnforo">
        </div>
      </form>
</div>
</div>
</div>
</div>

</div>

<?php
  require_once "includes/footer.php";
  require_once "formafooter.php";
?>
