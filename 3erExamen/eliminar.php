<?php
include_once('controller/Controller.php');


if (isset($_GET["id"])) {

    $controller = new ControllerCliente();
    $controller->eliminarCliente($_GET['id']);
    echo "eliminado";
} else {
    echo "No hay id";
    
}
