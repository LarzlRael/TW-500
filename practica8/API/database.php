<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');

$host = "localhost";
$user = "root";
$password = "";
$database = "ajax";

$con = mysqli_connect($host, $user, $password, $database) or die("Error en la Conexion");
