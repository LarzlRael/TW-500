<?php
include_once('controller/Controller.php');
include_once('model/Cliente.php');

if (
    isset($_POST['nombre']) &&
    isset($_POST['apellido_paterno']) &&
    isset($_POST['apellido_materno']) &&
    isset($_POST['sexo']) &&
    isset($_POST['documento'])
) {
    $nombre = $_POST['nombre'];
    $apellido_paterno = $_POST['apellido_paterno'];
    $apellido_materno = $_POST['apellido_materno'];
    $sexo = $_POST['sexo'];
    $documento = $_POST['documento'];

    $controllerCliente = new ControllerCliente();
    $cliente = new Clientes();

    $cliente->setNombre($nombre);
    $cliente->setApellido_p($apellido_paterno);
    $cliente->setApellido_m($apellido_materno);
    $cliente->setSexo($sexo);
    $cliente->setDocumento($documento);

    $controllerCliente->insertCliente($cliente);
} else {
    echo "Error faltan datos";
}
