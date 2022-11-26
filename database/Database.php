<?php 
require_once('config/db_config.php');

class Database 
{
    protected $conexion;

    public function __construct()
    {
        try{
            $this->conexion = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME."",DB_USER, DB_PASSWORD);
            //$this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //$this->conexion ->exec("SET CHARACTER SET".DB_CHARSET);
            return $this->conexion;
        }
        catch(Exception $e){
            print "ERROR: ".$e->getMessage();
            die();
        }
    }
}


?>