<?php
require_once('database/Database.php');
require_once "config/configGeneral.php";

class Representante extends Database{
    public $codigo;
    public $direccion;
    public $cod_equipo;

    public function __construct()
    {
        parent::__construct();
    }

    public function getIdRepre(){
        return $this->codigo;
    }

    public function setIdRepre($id){
        $this->codigo = $id;
        return $this;
    }

    public function getDireccion(){
        return $this->direccion;
    }

    public function setDireccion($dir){
        $this->direccion = $dir;
        return $this;
    }

    public function getCodEquipo(){
        return $this->cod_equipo;
    }

    public function setCodEquipo($ceq){
        $this->cod_equipo = $ceq;
        return $this;
    }

    public function Crear_Representante(){
        $query = "INSERT INTO " . T_REPRE. " (". REP_ID. ', '. REP_DIR .', '. REP_EQP.")" . 
        " VALUES(:" . REP_ID . ", :" . REP_DIR. ", :" . REP_EQP .")";
        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . REP_ID, $this->getIdRepre());
        $statement->bindValue(':' . REP_EQP, $this->getCodEquipo());
        $statement->bindValue(':' . REP_DIR, $this->getDireccion());
        
        var_dump($statement);
        $message = "<h1>Error al ingresar datos!</h1>";
        if ($statement->execute()) {
            var_dump($statement);
            $message = "<h1>Datos ingresados con éxito!</h1>";
        }
        return $message;
    }
    
    public function Modificar_Representante(){
        $query = " UPDATE " . T_REPRE . "SET(".  REP_ID. ', '. REP_DIR .', '. REP_EQP.")" . 
        " VALUES(:" .  REP_ID . ", :" . REP_DIR. ", :" . REP_EQP . ") WHERE " . REP_ID . "= :" . REP_ID ;
        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . REP_ID, $this->getIdRepre());
        $statement->bindValue(':' . REP_EQP, $this->getCodEquipo());
        $statement->bindValue(':' . REP_DIR, $this->getDireccion());

        $message = "<h1>Error al modificar datos!</h1>";
        if ($statement->execute()) {
            $message = "<h1>Datos modificados con éxito!</h1>";
        }
        return $message;
    }
    
    public function Ver_Representante(){
        $row=false;
        $query = "SELECT * FROM " .T_REPRE;
        $statement = $this->conexion->prepare($query);
        if ($statement->execute()) {
           $row= $statement->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        }
        return $row;
    }
    
    public function Buscar_Reprer(){
        $query = "SELECT * FROM " . T_REPRE . "WHERE " . REP_ID . "= :" . REP_ID ;
        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . REP_ID, $this->getIdRepre());
        $row = false;
        if ($statement->execute()) {
            $row = $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        return $row;
    }

    public function Eliminar_Representante(){
        $query = "DELETE FROM " . T_REPRE . " WHERE " . REP_ID . "= :" . REP_ID ;
        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . REP_ID, $this->getIdRepre());

        $message = "<h1>Error al ELIMINAR !</h1>";
        if ($statement->execute()) {
            $message = "<h1>Datos eliminados con éxito!</h1>";
        }
        return $message;
    }
    
    public function Registar_Jugadores(){
        
    }
    
    public function Aceptar_Partido(){

    }

}