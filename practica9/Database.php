<?php

class Database
{

    private $dbhost = 'localhost';
    private $dbname = "ajax_pg";
    private $user = "postgres";
    private $password = "root";
    private $port = "5432";
    private $conexion;

    function conextionDB()
    {
        if (!isset($this->conexion)) {

            $parametros = 1
            echo $parametros;
            $this->conexion = pg_connect($parametros) or die('false');
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
