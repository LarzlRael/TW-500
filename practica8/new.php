<?php 

include 'database.php';

$nombre =$_POST['nombre'];
$apellido_p =$_POST['apellido_p'];
$apellido_m =$_POST['apellido_m'];
$telefono =$_POST['telefono'];
$direccion =$_POST['direccion'];
$estado =$_POST['estado'];


//EJECUTA LA CONSULTA E INSERTA DATOS A LA BASE DE DATOS
$insertar = "INSERT INTO user(nombre,apellido_p, apellido_m, telefono, direccion, estado) VALUES ('$nombre','$apellido_p','$apellido_m','$telefono' '$direccion','$estado')";
            
try {
    $ejecutar = mysqli_query($con, $insertar);
    if($ejecutar){
        echo json_encode('Registro agregado');
    }else{
        echo json_encode('Error');
    }
    
} catch (mysqli_sql_exception $e) {
    echo $e;
}

?>