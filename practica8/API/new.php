<?php

include 'database.php';
if (
    isset($_POST['nombre']) &&
    isset($_POST['apellido_p']) &&
    isset($_POST['apellido_m']) &&
    isset($_POST['telefono']) &&
    isset($_POST['direccion']) &&
    isset($_POST['estado'])
) {

    $nombre = $_POST['nombre'];
    $apellido_p = $_POST['apellido_p'];
    $apellido_m = $_POST['apellido_m'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $estado = $_POST['estado'];

    echo " $nombre $apellido_p $apellido_m $telefono $direccion $estado";
    //EJECUTA LA CONSULTA E INSERTA DATOS A LA BASE DE DATOS
    $insertar = "INSERT INTO 
    user (nombre,apellido_p, apellido_m, telefono, direccion, estado) VALUES 
    ('$nombre','$apellido_p','$apellido_m','$telefono' ,'$direccion','$estado');";

    try {
        $ejecutar = mysqli_query($con, $insertar);
        echo json_encode('Registro agregado');
    } catch (mysqli_sql_exception $e) {
        echo json_encode($e);
    }
}else{
    echo json_encode("Llena todos los datos");

}
