<?php 
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');

$con = mysqli_connect("localhost", "larz", "larz", "ajax") or die("Error en la Conexion");
?>

