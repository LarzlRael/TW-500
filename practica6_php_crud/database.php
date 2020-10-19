<?php 
class Database{


    private $dbhost='127.0.0.1';
    private $dbname="tw_500_1";
    private $user="larz";
    private $password="larz";
    private $charset="utf8mb4";

    function connect(){
        try {
            $conexion = "mysql:host=".$this->dbhost.";dbname=".$this->dbname.";charset=".$this->charset;
            $pdo= new PDO($conexion,$this->user,$this->password);
            return $pdo;
        } catch (PDOException $e) {
            print_r('Error de conexion'.$e->getMessage());
        }
    }

}
?>
