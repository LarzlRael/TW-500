<?php

include_once 'database.php';
include_once 'Persona_model.php';

class Functions extends Database{

    function getAll(){
        $personas = array();
        $personas['items'] = array();
        $query = $this->connect()->query("SELECT * FROM persona");
        if ($query->rowCount()) {
            while ($row = $query->fetch()) {
                $persona  = new Persona();

                $persona->setId($row['id']);
                $persona->setNombre($row['nombre']);
                $persona->setApellido_p($row['apellido_p']);
                $persona->setApellido_m($row['apellido_m']);
                $persona->setDireccion($row['direccion']);
                $persona->setTelefono($row['telefono']);

                array_push($personas['items'], $persona->toArray('total'));
            }
            echo json_encode($personas);
        } else {
            echo json_encode(array('Error' => 'No hay datos que mosrar'));
        }
    }


    function getById($id){
        $personas = array();
        $personas['items'] = array();

        $query = $this->connect()->prepare("SELECT * FROM persona WHERE id= :id");

        $query->execute(['id' => $id]);

        if ($query->rowCount()) {
            while ($row = $query->fetch()) {
                $persona  = new Persona();

                $persona->setId($row['id']);
                $persona->setNombre($row['nombre']);
                $persona->setApellido_p($row['apellido_p']);
                $persona->setApellido_m($row['apellido_m']);
                $persona->setDireccion($row['direccion']);
                $persona->setTelefono($row['telefono']);

                array_push($personas['items'], $persona->toArray('total'));
            }
            echo json_encode($personas);
        } else {
            echo json_encode(array('Error' => 'No hay datos que mosrar'));
        }
    }

    function newPersona($item){
        try {
            $query = $this->connect()->prepare('INSERT INTO persona (nombre,apellido_p,apellido_m,direccion,telefono) values(:nombre,:apellido_p,:apellido_m,:direccion,:telefono)');
            $query->execute([
                'nombre' => $item['nombre'],
                'apellido_p' => $item['apellido_p'],
                'apellido_m' => $item['apellido_m'],
                'direccion' => $item['direccion'],
                'telefono' => $item['telefono']
            ]);

            echo json_encode((array('success' => 'nueva persona agregada')));
        } catch (\Throwable $th) {
            echo json_encode(array('Error' => 'No hay datos que mosrar'));
            //throw $th;
        }
    }

    function deletePersona($id){
        try {
            $query = $this->connect()->prepare('DELETE FROM persona where id = :id');
            if ($query->execute(['id' => $id,]) && $query->rowCount()) {
                echo json_encode((array('success' => 'La persona fue eliminada')));
            } else {
                echo json_encode(array('Error' => 'Hubo un error el eliminar el alumno'));
            }
        } catch (\Throwable $th) {
            echo json_encode(array('Error' => 'Hubo un error el eliminar el alumno'));
            
        }
    }
}
