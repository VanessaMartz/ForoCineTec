<?php
    include_once "../bd/conexion.php";
    include_once "includes/header.php";
    include_once "menu.php";
    if(empty($_GET['id'])){
        header('Location: index.php');
    }
    $idforo = $_GET['id'];
    $sql = mysqli_query($conn,"SELECT * FROM foros where idforo = '$idforo'");
            $dato = mysqli_fetch_array($sql);
?>
<div class="container my-5">
<div class="my-4">
  <div class="container">
    <h1 class="display-4"><?php echo $dato['titulo']?></h1>
    <hr>
    <p class="lead"><?php echo $dato['descripcion']?></p>
  </div>
</div>
<div class="row justify-content-center">
<div class="col-12 col-md-8">
</div> 
</div>
</div>
<div class="container mt-5">
<?php
        include_once "codcomentarios.php";
        $query = mysqli_query($conn,"SELECT c.descripcion,c.datatime ,u.nombres,f.titulo  FROM comentarios AS c INNER JOIN usuarios AS u ON u.numcontrol = c.idnumcontrol INNER JOIN foros AS f ON f.idforo = c.idforo WHERE c.idforo = '$idforo'");
        $result = mysqli_num_rows($query);
    if($result > 0){

        while($data = mysqli_fetch_array($query)){
        ?>    

        <div class="alert alert-warning" role="alert">
            <p class="float-right"><?php echo $data['datatime']?> </p><br>
            <p class="h4 float-right"><?php echo $data['nombres']?></p>
            <p><?php echo $data['descripcion']?></p>
        <div class="">
    </div>
</div>
    <?php
        }
    }
    if($dato['estatus']=='abierto'){

?>
    
    <div class="card my-5">
</div>
    
      
      <div class="card-body">
      <form method ="post" >
      
       <h2 align=center>Comentarios</h2>
        <div class="form-group">
          <label for="respuesta">Comentario:</label>
          <textarea class="form-control" id="respuesta" name="respuesta"></textarea>
        </div>
        <div class="text-right">
        <input class = "btn btn-success"type="submit" value="Publicar comentario" name="botons">
        </div>
        <div><?php echo isset($alert) ? $alert : '' ; ?> </div>
      </form>
</div>
</div>
</div>
        <?php }else{
              ?>
               

                <div class="my-5 alert alert-danger" role="alert">
                <h4 class="alert-heading">¡Oh no!</h4>
                <p>Este tema ya está cerrado, solicita al administrador su reapertura</p>
                <hr>
                <p class="mb-0">¡No sabemos cuando volverá a estar disponible!</p>
                <div class="text-right">
                <a class="btn btn-info" href="index.php"role="button">Cancelar</a>
               </div>
                </div>

            <?php
        }?>
</div>
<?php
include_once "includes/footer.php";
include_once "footer.php";
   
?>