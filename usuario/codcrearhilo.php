<?php
    
    if(!empty($_POST)){

        $alert='';
        if(empty($_POST['titulo'])){

            $alert = '<div class="alert alert-danger text-center" role="alert">Es necesario nombrar el hilo</div>';
        }else{
                session_start();
                $titulo = $_POST['titulo'];
                $descripcion = $_POST['descripcion'];
                $numcontrol =  $_SESSION['idalumno'];
                date_default_timezone_set('America/Mexico_city');
                $fechayhora =date("y-m-d H:i:s"); 
                $query_insert = mysqli_query($conn,"INSERT INTO foros(titulo,descripcion,datatime,idnumcontrol,estatus) VALUES ('$titulo','$descripcion','$fechayhora','$numcontrol','abierto')");
                if($query_insert){
                    $alert = '<div class="alert alert-success text-center" role="alert">Hilo creado exitosamente</div>';
                    header('location: mishilos.php');
                }else{
                    $alert = '<div class="alert alert-danger text-center" role="alert">Error al crear el hilo</div>';
                }
            
        }
    }
