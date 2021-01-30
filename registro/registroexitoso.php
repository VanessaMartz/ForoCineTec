<?php
include_once "includes/header.php";
include_once "menumain.php";

?>
<div class="container mt-5">
<div class="row justify-content-center">
<div class="col-12 col-md-8 mt-5">
<div class="card">
<div class="card-header bg-success text-black text-left ">
</div>
     <div><?php echo isset($alert) ? $alert : '' ; ?>
     
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">¡Registro exitoso!</h4>
        <p>El administrador deberá aceptar su solicitud para poder participar en el Foro CineTec ☺.</p>
       <hr>
       <div class="text-right">
       <p class="mb-0">Regrese a la página principal</p> <br><br>
       <a class="btn btn-warning btn-lg" href="../index.php" role="button">Regresar</a>
      </div>
    </div>
    </div>
    </div>
    </div>
   </div>
</div>
<?php
include_once "includes/footer.php";
include_once "formafooter.php";
?>