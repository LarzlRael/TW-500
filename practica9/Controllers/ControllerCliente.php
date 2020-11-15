<?php
require_once('database/Database.php');
require_once('Model/Clientes.php');

class ControllerCliente extends Database
{
    public function insertarEmpleado($item)
    {

        $nombre = $item['nombre'];
        $apellido_p = $item['apellido_p'];
        $apellido_m = $item['apellido_m'];
        $telefono = $item['telefono'];
        $direccion = $item['direccion'];
        $codigo = $item['codigo'];
        $estado = $item['estado'];

        $sql = "INSERT  INTO users(nombre,apellido_p,apellido_m,telefono,direccion,codigo,estado) VALUES ('$nombre','$apellido_p','$apellido_m','$telefono','$direccion','$codigo','$estado')";

        $this->conextionDB();

        $consulta = $this->ejecutarConsulta($sql);

        $this->desconectar();
    }
    public function getUsers()
    {
        $sql = "select * from users order by id DESC";
        $this->conextionDB();

        $consulta = $this->ejecutarConsulta($sql);
        $respuesta = [];

        while ($row = pg_fetch_assoc($consulta)) {
            $usuario = [
                'id' => $row['id'],
                'nombre' => $row['nombre'],
                'apellido_p' => $row['apellido_p'],
                'apellido_m' => $row['apellido_m'],
                'telefono' => $row['telefono'],
                'direccion' => $row['direccion'],
                'codigo' => $row['codigo'],
                'estado' => $row['estado'],

            ];
            array_push($respuesta, $usuario);
        }
        echo json_encode($respuesta);

        $this->desconectar();
    }
}
