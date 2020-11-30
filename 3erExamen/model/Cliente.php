<?php
class Clientes
{

    private $id;
    private $nombre;
    private $apellido_p;
    private $apellido_m;
    private $sexo;
    private $documento;
    

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of apellido_p
     */ 
    public function getApellido_p()
    {
        return $this->apellido_p;
    }

    /**
     * Set the value of apellido_p
     *
     * @return  self
     */ 
    public function setApellido_p($apellido_p)
    {
        $this->apellido_p = $apellido_p;

        return $this;
    }

    /**
     * Get the value of apellido_m
     */ 
    public function getApellido_m()
    {
        return $this->apellido_m;
    }

    /**
     * Set the value of apellido_m
     *
     * @return  self
     */ 
    public function setApellido_m($apellido_m)
    {
        $this->apellido_m = $apellido_m;

        return $this;
    }

    /**
     * Get the value of sexo
     */ 
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * Set the value of sexo
     *
     * @return  self
     */ 
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;

        return $this;
    }

    /**
     * Get the value of documento
     */ 
    public function getDocumento()
    {
        return $this->documento;
    }

    /**
     * Set the value of documento
     *
     * @return  self
     */ 
    public function setDocumento($documento)
    {
        $this->documento = $documento;

        return $this;
    }
}
