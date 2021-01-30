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
<div class="container mt-5">
<div class="my-4">
  <div class="container">
    <h1 class="display-4"><?php echo $dato['titulo']?></h1>
    <hr>
    <p class="lead"><?php echo $dato['descripcion']?></p>
  </div>
</div>
<div class="row justify-content-center">
<div class="col-12 col-md-6">
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
            <p class="h5 float-right"  ><?php echo $data['nombres']?></p>
            <p><?php echo $data['descripcion']?></p>
        <div class="">
    </div>
</div>
    <?php
        }
    }
    if($dato['estatus']=='abierto'){

?>
   
      <div class="card">
      <form method ="post" >
        <div class="form-group">
        <h2>Haga su comentario</h2>
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


        <?php }else{
              ?>
                  
                </div>
                <div class="my-4 alert alert-danger" role="alert">
                <h4 class="alert-heading">Este tema está cerrado</h4>
                <p>Configuré su estatus para permitir comentar este hilo</p>
                </div>
            <?php
        }?>
</div>
<?php
    include_once "includes/footer.php";
    include_once "formafooter.php"
?>