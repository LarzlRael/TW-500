<?php

class Database
{

    private $dbhost = '127.0.0.1';
    private $dbname = "ajax_pg";
    private $user = "postgres";
    private $password = "root";
    private $port = "5432";
    public $conexion;

    function conextionDB()
    {
        try {
            $parametros = "host=" . $this->dbhost . " dbname=" . $this->dbname . "  port=" . $this->port . " user=" . $this->user . " password=" . $this->password;

            $this->conexion = pg_connect($parametros) or die('false');
        } catch (PDOException $e) {
            print_r('Error de conexion ' . $e->getMessage());
        }
    }
    function ejecutarConsulta($sql)
    {
        $resultado = pg_query($this->conexion, $sql) or die("La consulta fallo 1" . pg_last_error($this->conexion));
        
        if (!isset($resultado)) {
            echo "La consulta fallo " . pg_errormessage($this->conexion);
            exit;
        }

        return $resultado;
    }
    function desconectar()
    {
        pg_close($this->conexion);
    }
}
