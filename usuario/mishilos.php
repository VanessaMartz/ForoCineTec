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
<div class="container">
<?php
    session_start();
    $idusuario =  $_SESSION['idalumno'];
    include "../bd/conexion.php";
    $query = mysqli_query($conn,"SELECT * FROM foros WHERE idnumcontrol = '$idusuario' AND (estatus = 'abierto' OR estatus = 'cerrado') order by idforo DESC");
    $result = mysqli_num_rows($query);

    if($result > 0){ ?>
        <div class="text-right">
       <a href="crearhilo.php" class="btn btn-success btn-lg mt-5" role="button" aria-pressed="true">Crear hilo</a>
       </div> <br>
       <?php
    }
    if($result > 0){
        while($data = mysqli_fetch_array($query)){
        
        //    $query2 = mysqli_query($conn,"SELECT permiso FROM foros");
          //  $result2 = mysqli_num_rows($query2);
           
        ?>    
        <div class="alert alert-warning" role="alert">
            <p class="float-bottom h6"><span><?php echo $data['estatus']?></span></p>  
            <p class="float-bottom"><?php echo $data['datatime']?> </p>
            <p class="h3"><?php echo $data['titulo']?></p>
            <?php if($data['permiso'] == 'aceptado')  { ?>
            <p class="h5">Categoría: <?php echo $data['clasificacion']?></p> <?php }?>
            <p><?php echo $data['descripcion']?></p>
        <div class="">
        <a class="btn btn-info" href="comentarios.php?id=<?php echo $data['idforo']; ?>"role="button">Ver comentarios</a>
        <a class="btn btn-success" href="estatus.php?id=<?php echo $data['idforo']; ?>"role="button">Cambiar estatus</a>
    

    </div>
    
</div>

    <?php
        
        }
    }else{
        ?>
                <div class="my-5 alert alert-danger" role="alert">
                    <h4 class="alert-heading">¡Oh no!</h4>
                    <p>No existen hilos creados, si desea crear un hilo de clic en el botón "Crear hilo"</p>
                    <hr>
                    <p class="mb-5">
                    ¡Diviértase comentando! ☺</p>
                    <hr >
                    <div class="text-right">
                     <a href="crearhilo.php" class="btn btn-success btn-lg mt-5" role="button" aria-pressed="true">Crear hilo</a>
                </div>
                </div>
                </div>
        <?php
    }
    
?>


</div>
</div>

<?php
include_once "includes/footer.php";
include_once "formafooter.php";
?>