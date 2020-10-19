<?php 

include_once 'Functions.php';
include_once 'Persona_model.php';

class API extends Functions{

    function nuevoAlumno($datos){
        $nuevaPersona = new Persona();
        $nuevaPersona->setNombre($datos['nombre']);
        $nuevaPersona->setApellido_p($datos['apellido_p']);
        $nuevaPersona->setApellido_m($datos['apellido_m']);
        $nuevaPersona->setDireccion($datos['direccion']);
        $nuevaPersona->setTelefono($datos['telefono']);

        return $this->newPersona($nuevaPersona);
    }

    
    function obtenerAlumnos(){
        return $this->getAll();
    }
    function obtenerAlumnosPorId($id){
        return $this->getById($id);
    }

    function eliminarAlumno($id){
        return $this->deletePersona($id);
    }
}
?>