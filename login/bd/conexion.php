<?php
$dbhost = 'localhost';
$dbuser = 'u117281852_w1304';
$dbpass = 'ProgramacionWeb62$';
$dbdata = 'u117281852_w1304';

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbdata);
if($conn->connect_error){
    die('Error de conexion ... Cancelando proceso');
}
?>