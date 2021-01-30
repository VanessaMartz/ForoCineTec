<?php
    $alert = '';
    session_start();

    
    if(!empty($_SESSION['active'])){
            if($_SESSION['numcontrol']=='root'){
                header('location: ../administrador/');
            }
        header('location: ../usuario/');
    }else{
    if(!empty($_POST))
    {

            if(empty($_POST['idalumno']) || empty($_POST['password']))
            {
                $alert = '<div class="alert alert-danger text-center" role="alert">Ingrese todos los campos</div>';
            }
        else{
          
        require_once "bd/conexion.php";
        

        $user = mysqli_real_escape_string($conn,$_POST['idalumno']);
        $pass = md5(mysqli_real_escape_string($conn,$_POST['password']));

        $query = mysqli_query($conn,"SELECT * FROM usuarios WHERE numcontrol = '$user' AND clave = '$pass' ");
        $result = mysqli_num_rows($query);

            
        if($result > 0){
            $data = mysqli_fetch_array($query);
            if($data['estatus']==1){
            $_SESSION['active']    = true;
            $_SESSION['idalumno']  = $data['numcontrol'];
            $_SESSION['clave']     = $data['clave'];
            $_SESSION['correo']    = $data['correo'];
            $_SESSION['apellidos'] = $data['apellidos'];
            $_SESSION['nombres']   = $data['nombres'];

            if($_SESSION['idalumno']=='root'){
                header('location: ../administrador/');
            }else{
                header('location: ../usuario/');
            }
            
        }else{
            $alert = '<div class="alert alert-danger text-center" role="alert">El usuario no ha sido aceptado el por el administrador</div>';
            session_destroy();
        }
        }else{
            $alert = '<div class="alert alert-danger text-center" role="alert">El usuario o la contraseña son incorrectos </div>';
            session_destroy();        }
            }
    }
}
require_once "includes/header.php";
require_once "menumain.php";
require_once "formalogin.php";
require_once "includes/footer.php";
require_once "formafooter.php";