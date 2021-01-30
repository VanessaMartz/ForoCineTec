<?php
    include_once "includes/header.php";
    include_once "menu.php";
?>
<div class="container mt-5">
<div class="row justify-content-center">
<div class="col-12 col-md-8 mt-1">
</div>
</div>
</div>
<div class="container mt-5">
<center>
<h1>Accesos</h1>
</center>
<?php
    include "bd/conexion.php";
    $query = mysqli_query($conn,"SELECT u.numcontrol, u.nombres ,u.apellidos,f.titulo,f.descripcion,f.datatime,f.clasificacion,f.permiso,f.idforo FROM foros AS f INNER JOIN usuarios AS u ON u.numcontrol = f.idnumcontrol WHERE f.permiso = 'pendiente' AND (f.estatus = 'abierto' OR f.estatus = 'cerrado')");
    $result = mysqli_num_rows($query);

    if($result > 0){
        while($data = mysqli_fetch_array($query)){
        ?> 
        <center>
       <div class="card text-center" style="width: 18rem;">
       <div class="card-body">
       <h5 class="card-title">Acceso a foro CineTec</h5>
       <h6 class="card-subtitle mb-2 text-muted">Administre los accesos</h6>
            <p class="float-bottom h6"><span>Permiso en revisión...</span></p> 
            <p class="float-bottom h6"><?php echo $data['datatime']?> </p> 
            <p class="h3">Tema:  <?php echo $data['titulo']?></p>
            <p class="h4">Categoría:  <?php echo $data['clasificacion']?></p>
            <p class="h5"> Comentario:</p>
            <p class=""><?php echo $data['descripcion']?></p>
            <hr>
            <p class="h5">Nombre del usuario: <?php echo $data['nombres']?>  <?php echo $data['apellidos']?></p>
            <p class="h5">Código de control: <?php echo $data['numcontrol']?></p> 
        <div class="">
        <a class="btn btn-danger" href="rechazar2.php?id=<?php echo $data['idforo']; ?>"role="button">Rechazar</a>
        <a class="btn btn-success" href="aceptado2.php?id=<?php echo $data['idforo']; ?>"role="button">Aceptar</a>
      

  </div>
</div>
</div>
</center>
    <?php
    }
        }else{
            ?>
            <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">¡Oh no!</h4>
            <p>No hay permisos disponibles</p>
            <hr>
            <p class="mb-0"></p>
            </div>
          
<?php
}

?>



</div>
</div>
<?php

require_once "includes/footer.php";
require_once "formafooter.php";
?>