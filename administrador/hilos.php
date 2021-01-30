<div class="container mt-5">
<div class="row justify-content-center">
<div class="col-12 col-md-8 mt-1">
</div>
</div>
</div>
<div class="container">
<?php
    include "../bd/conexion.php";
    $query = mysqli_query($conn,"SELECT * FROM foros WHERE estatus = 'abierto' OR estatus = 'cerrado' order by idforo DESC");
    $result = mysqli_num_rows($query);

    if($result > 0){ ?>
        <div class="text-right"><br>
       <a href="crearhilo.php" class="btn btn-info btn-lg mt-5" role="button" aria-pressed="true">Crear hilo</a>
       </div>
       <?php
    }
    if($result > 0){
        while($data = mysqli_fetch_array($query)){
        
        ?>   
        <br> 
        <div class="alert alert-warning" role="alert">
            <p class="float-bottom h5"><span><?php echo $data['estatus']?></span></p> 
            <p class="float-bottom"><?php echo $data['datatime']?> </p> 
            <p class="h3"><?php echo $data['titulo']?></p>
            <?php if($data['permiso'] == 'aceptado')  { ?>
            <p class="h5">Categoría: <?php echo $data['clasificacion']?></p> <?php }?>
            <p><?php echo $data['descripcion']?></p>
        <div class="">
        <a class="btn btn-info" href="comentarios.php?id=<?php echo $data['idforo']; ?>"role="button">Ver comentarios</a>
        <a class="btn btn-warning" href="estatus.php?id=<?php echo $data['idforo']; ?>"role="button">Cambiar estatus del hilo</a>
        

    </div>
    
</div>

    <?php
        
        }
    }else{
        ?>
           <div class="card">
            <div class="card-header">Foro CineTec </div>
            <div class="card-body">
                <h2 class="card-title">No existen hilos creados por el usuario</h2>
                <p class="card-text">Si desea iniciar un hilo, dé clic en el botón "Crear hilo".</p>
                <div class="text-right">
                <a href="crearhilo.php" class="btn btn-info
                btn-lg mt-5" role="button aria-pressed="true">Crear hilo</a>
                </div>
            </div>
       </div>

        <?php
    }
   
?>


</div>
</div>

