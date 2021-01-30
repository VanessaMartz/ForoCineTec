<?php
   include_once "../bd/conexion.php";
   $idusuario = $_GET['id'];
   $query_comprobar = mysqli_query($conn,"SELECT * FROM permisos WHERE idusuario = '$idusuario'");
   $result = mysqli_fetch_array($query_comprobar);
   if($result > 0){
     $alert = '<div class="alert alert-danger text-center" role="alert">Su autorización está en revisión
     por el administrador</div>';
 }else{
   if(!empty($_POST)){
        $idnumcontrol = $_POST['idusuario'];
        date_default_timezone_set('America/Mexico_city');
                $fechayhora =date("y-m-d H:i:s"); 
                
        $query = mysqli_query($conn,"INSERT INTO permisos(datetime,idusuario) VALUES ('$fechayhora','$idnumcontrol')");
    if($query){
        header("Location: mishilos.php");
    }else{
        $alert = '<div class="alert alert-danger text-center" role="alert">Ocurrio un problema</div>';
    }
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
      <h2 align=center>Confirmar</h2>
       <div class="form-group text-center">
          <label for="titulo" class="h4">De clic en "Aceptar" para enviar su solicitud</label>
          <input type="hidden" name="idusuario" value="<?php echo  $idusuario ?>">
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