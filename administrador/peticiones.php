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
<h1 align=center>Registros por confirmar</h1>
<?php
    include "conexion.php";
    $query = mysqli_query($conn,"SELECT u.numcontrol, u.nombres ,u.apellidos, u.correo ,s.datetime ,u.numcontrol FROM solicitudes AS s INNER JOIN usuarios AS u ON u.numcontrol = s.idusuario WHERE u.estatus = false");
    $result = mysqli_num_rows($query);

    if($result > 0){
        while($data = mysqli_fetch_array($query)){

        ?>   
<center> 
    <div class="card text-center" style="width: 18rem;">
       <div class="card-body">
       <h5 class="card-title">Acceso a foro CineTec</h5>
       <h6 class="card-subtitle mb-2 text-muted">Administre los accesos</h6>
        <div class="alert alert-light" role="alert">
            <p class="float-bottom"><span>Estatus en revisión</span></p>  
            <p class="h3"><?php echo $data['nombres']?> <?php echo $data['apellidos']?></p>
            <hr>
            <p>Correo electronico: <?php echo $data['correo']?></p>
            <p>Código de control: <?php echo $data['numcontrol']?></p>
            
        <div class="">
        <a class="btn btn-danger" href="rechazar.php?id=<?php echo $data['numcontrol']; ?>"role="button">Rechazar solicitud</a>
        <a class="btn btn-success" href="aceptado.php?id=<?php echo $data['numcontrol']; ?>"role="button">Aceptar solicitud</a>
        <p class="float-right"><?php echo $data['datetime']?> </p>
    </div>
    </div>
    
</div>
</center>

    <?php
        }
    }else{
        ?>
            <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">¡No hay registros pendientes!</h4>
            <p>¡Por favor invite a más gente a unirse al Foro CineTec!</p>
            
            </div>
                    
        <?php
    }
    
?>



</div>
</div>
<?php
include_once "includes/footer.php";
require_once "formafooter.php";