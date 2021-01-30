<?php
    
    if(!empty($_POST)){

        $alert='';
        if(empty($_POST['titulo'])){

            $alert = '<div class="alert alert-danger text-center" role="alert">Debe agregar un título</div>';
        }else{
                session_start();
                $numcontrol =  $_SESSION['idalumno'];
                
                $titulo = $_POST['titulo'];
                $descripcion = $_POST['descripcion'];
                $clasificacion = $_POST['clasificacion'];
                $permiso = 'pendiente';
                $estatus = 'abierto';

                date_default_timezone_set('America/Mexico_city');
                $fechayhora =date("y-m-d H:i:s"); 

                $query_insert = mysqli_query($conn,"INSERT INTO foros(titulo,descripcion,datatime,idnumcontrol,clasificacion,permiso,estatus) VALUES ('$titulo','$descripcion','$fechayhora','$numcontrol','$clasificacion','$permiso','$estatus')");
                if($query_insert){
                    $alert = '<div class="alert alert-success text-center" role="alert">Hilo creado</div>';
                    header('location: index.php');
                }else{
                    $alert = '<div class="alert alert-danger text-center" role="alert">Hubo un error al crear este hilo</div>';
                }
            
        }
    }
