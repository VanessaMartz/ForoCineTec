<?php
function limpiar_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function validar_idmateria($idmateria){
    
}