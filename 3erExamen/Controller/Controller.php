<?php
require_once('database/Database.php');

require_once('model/Cliente.php');

class ControllerCliente extends Database
{
    public function insertCliente($datoEmpleado)
    {
        $nombre = $datoEmpleado->getNombre();
        $apellido_p = $datoEmpleado->getApellido_p();
        $apellido_m = $datoEmpleado->getApellido_m();
        $sexo = $datoEmpleado->getSexo();
        $documento = $datoEmpleado->getDocumento();


        $sql = "INSERT INTO cliente(nombre,apellido_p,apellido_m,sexo,documento) VALUES ('$nombre','$apellido_p','$apellido_m','$sexo','$documento')";

        $this->conextionDB();

        $this->ejecutarConsulta($sql);

        $this->desconectar();
    }
    public function obtenerClientes()
    {
        
        $sql = "SELECT * FROM cliente  ORDER BY id DESC";
        
        $this->conextionDB();
        $consulta = $this->ejecutarConsulta($sql);

        $respuesta = [];

        while ($row = pg_fetch_assoc($consulta)) {

            $cliente = [
                'id' => $row['id'],
                'nombre' => $row['nombre'],
                'apellido_p' => $row['apellido_p'],
                'apellido_m' => $row['apellido_m'],
                'sexo' => $row['sexo'],
                'documento' => $row['documento'],
            ];
            array_push($respuesta, $cliente);
        }
        echo json_encode($respuesta);

        $this->desconectar();
    }
    public function obtenerCliente($id)
    {
        $sql = "SELECT * FROM  cliente WHERE id= $id";
        $this->conextionDB();

        $consulta = $this->ejecutarConsulta($sql);

        $respuesta = [];

        while ($row = pg_fetch_assoc($consulta)) {

            $cliente = [
                'id' => $row['id'],
                'nombre' => $row['nombre'],
                'apellido_p' => $row['apellido_p'],
                'apellido_m' => $row['apellido_m'],
                'sexo' => $row['sexo'],
                'documento' => $row['documento'],
            ];
            array_push($respuesta, $cliente);
        }
        echo json_encode($respuesta);

        $this->desconectar();
    }

    public function eliminarCliente($id)
    {
        $sql = 'DELETE FROM cliente WHERE id = ' .$id ;
        $this->conextionDB();
        $consulta = $this->ejecutarConsulta($sql);

        $this->desconectar();
    }
    public function actualizarCliente($cliente)
    {
        $id = $cliente->getId();
        $nombre = $cliente->getNombre();
        $apellido_p = $cliente->getApellido_p();
        $apellido_m = $cliente->getApellido_m();
        $sexo = $cliente->getSexo();
        $documento = $cliente->getDocumento();

        $sql = "UPDATE CLIENTE SET 
            nombre = '$nombre',
            apellido_p =  '$apellido_p', 
            apellido_m = '$apellido_m' ,
            sexo = '$sexo',
            documento = '$documento' 
            WHERE id= '$id' ";

        echo  "\t $sql";
        $this->conextionDB();

        $consulta = $this->ejecutarConsulta($sql);

        $this->desconectar();
    }
}
