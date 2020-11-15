<?php
include_once('./Controllers/ControllerCliente.php');

$controllerCliente = new ControllerCliente();
$controllerCliente->getUsers();
