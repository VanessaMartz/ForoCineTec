<?php
    
    if(!empty($_POST)){

        $alert='';
        if(empty($_POST['respuesta'])){

            $alert = '<div class="alert alert-danger text-center" role="alert">Es obligatorio llenar el campo</div>';
        }else{
                session_start();
                $respuesta = $_POST['respuesta'];
                $numcontrol =  $_SESSION['idalumno'];
                date_default_timezone_set('America/Mexico_city');
                $fechayhora =date("y-m-d H:i:s"); 
                $query_insert = mysqli_query($conn,"INSERT INTO comentarios(descripcion,datatime,idforo,idnumcontrol) VALUES ('$respuesta','$fechayhora','$idforo','$numcontrol')");
                if($query_insert){
                    $alert = '<div class="alert alert-success text-center" role="alert">Comentario agregado exitosamente</div>';
                }else{
                    $alert = '<div class="alert alert-danger text-center" role="alert">Error al crear el comentario</div>';
                }
            
        }
    }
