<?php

$con = mysqli_connect("localhost", "larz", "larz", "cotizacion") or die("Error en la Conexion");

// SI RECIBE EL VALORES DEL FORMULARIO CON BOTON INSERT 
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$deuda = $_POST['deuda'];
//EJECUTA LA CONSULTA E INSERTA DATOS A LA BASE DE DATOS
$insertar = "INSERT INTO clientes(nombre,apellido,deuda) VALUES 
            ('$nombre','$apellido','$deuda')";
            
try {
    $ejecutar = mysqli_query($con, $insertar);
     header("Location: http://localhost:8080/formulario.php"); 
    
} catch (mysqli_sql_exception $e) {
    echo $e;
}
