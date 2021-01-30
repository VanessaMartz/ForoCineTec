<?php
    if(!empty($_POST)){

        $alert='';
        if(empty($_POST['nombres']) || empty($_POST['apellidos']) || empty($_POST['idalumno']) || empty($_POST['email']) || empty($_POST['password'])){

            $alert = '<div class="alert alert-danger text-center" role="alert">Todos los campos son obligatorios</div>';
        }else{
            require_once "bd/conexion.php";

            $idalumno = $_POST['idalumno'];
            $clave = md5($_POST['password']);
            $email = $_POST['email'];
            $nombres = $_POST['nombres'];
            $apellidos = $_POST['apellidos'];

            $query = mysqli_query($conn,"SELECT * FROM usuarios WHERE numcontrol = '$idalumno' OR correo = '$email' ");
            $result = mysqli_fetch_array($query);

            if($result > 0){
                $alert = '<div class="alert alert-danger text-center" role="alert">Este usuario ya existe</div>';
            }else{
                date_default_timezone_set('America/Mexico_city');
                $fechayhora =date("y-m-d H:i:s"); 
                $query_insert = mysqli_query($conn,"INSERT INTO usuarios(numcontrol,clave,correo,nombres,apellidos) VALUES ('$idalumno','$clave','$email','$nombres','$apellidos')");
                $query_insery2 = mysqli_query($conn,"INSERT INTO solicitudes(datetime,idusuario) VALUES ('$fechayhora','$idalumno')");
                if($query_insert){
                    $alert = '<div class="alert alert-success text-center" role="alert">Usuario creado correcta mente</div>';
                    header('location: registroexitoso.php');
                }else{
                    $alert = '<div class="alert alert-danger text-center" role="alert">Error al crear el usuario</div>';
                }
            }
        }
    }

require_once "includes/header.php";
require_once "menumain.php";
require_once "formatoregistro.php";
require_once "includes/footer.php";