<?php
include_once("Controllers/ControllerCliente.php");
include_once("Model/Clientes.php");

if (
    $_POST['nombre'] &&
    $_POST['apellido_p'] &&
    $_POST['apellido_m'] &&
    $_POST['telefono'] &&
    $_POST['direccion'] &&
    $_POST['codigo'] &&
    $_POST['estado']

) {
    $nombre = $_POST['nombre'];
    $apellido_p = $_POST['apellido_p'];
    $apellido_m = $_POST['apellido_m'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $codigo = $_POST['codigo'];
    $estado = $_POST['estado'];



    $array = array(
        'nombre' => $nombre,
        'apellido_p' => $apellido_p,
        'apellido_m' => $apellido_m,
        'telefono' => $telefono,
        'direccion' => $direccion,
        'codigo' => $codigo,
        'estado' => $estado
    );

    $controller = new ControllerCliente();
    $controller->insertarEmpleado($array);
    echo json_encode("registro agregado");
} else {
    echo json_encode("Error de de consulta");

}
