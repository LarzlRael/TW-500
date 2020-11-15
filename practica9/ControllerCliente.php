<?php
require_once('Database.php');
class ControllerCliente extends Database
{
    public function insertarEmpleado($datoEmpleado)
    {
        // $nombre
        // $apellido_p
        // $apellido_m
        // $telefono
        // $direccion
        // $codigo
        // $estado
        // '$datoEmpleado->getNombre()'
        // '$datoEmpleado->getApellido_p()'
        // '$datoEmpleado->getApellido_m()'
        // '$datoEmpleado->getTelefono()'
        // '$datoEmpleado->getDireccion()'
        // '$datoEmpleado->getCodigo()'
        // '$datoEmpleado->getEstado()'

        $sql = "INSERT  INTO usuario(nombre,apellido_p,apellido_m,telefono,direccion,codigo,estado) VALUES (
        '$datoEmpleado->getNombre()',
        '$datoEmpleado->getApellido_p()',
        '$datoEmpleado->getApellido_m()',
        '$datoEmpleado->getTelefono()',
        '$datoEmpleado->getDireccion()',
        '$datoEmpleado->getCodigo()',
        '$datoEmpleado->getEstado()')";

        $this->conextionDB();

        $consulta = $this->ejecutarConsulta($sql);

        $this->desconectar();
    }
    public function getUsers()
    {
        $sql = "select * from usuario";
        $this->conextionDB();

        $consulta = $this->ejecutarConsulta($sql);

        $this->desconectar();
    }
}
