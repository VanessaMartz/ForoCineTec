<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbdata = 'foro';

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbdata);
if($conn->connect_error){
    die('Error de conexion ... Cancelando proceso');
}
?>