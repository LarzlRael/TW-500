<?php 

class Persona{
    private $id;
    private $nombre;
    private $apellido_p;
    private $apellido_m;
    private $direccion;
    private $telefono;

    public function getId(){
        return $this->id;
    }
    
    public function setId($id){
        $this->id = $id;
        return $this;
    }

        public function getNombre(){
        return $this->nombre;
    }
    
    public function setNombre($nombre){
        $this->nombre = $nombre;
        return $this;
    }

        public function getApellido_p(){
        return $this->apellido_p;
    }
    
    public function setApellido_p($apellido_p){
        $this->apellido_p = $apellido_p;
        return $this;
    }

    public function getApellido_m(){
        return $this->apellido_m;
    }
    
    public function setApellido_m($apellido_m){
        $this->apellido_m = $apellido_m;
        return $this;
    }

    public function getDireccion(){
        return $this->direccion;
    }
    
    public function setDireccion($direccion){
        $this->direccion = $direccion;

        return $this;
    }

    public function getTelefono(){
        return $this->telefono;
    }

    
    public function setTelefono($telefono){
        $this->telefono = $telefono;
        return $this;
    }

    function toArray($access=''){
        if($access=='total'){
            return array(
                'id'=>$this->id,
                'nombre'=>$this->nombre,
                'apellido_p'=>$this->apellido_p,
                'apellido_m'=>$this->apellido_m,
                'telefono'=>$this->telefono,
                'direccion'=>$this->direccion,
            );
        }else{
            return array(
                'id'=>$this->id,
            );
        }
        
    }
}
