<?php
require_once('database/Database.php');
require_once "config/configGeneral.php";

class Torneo extends Database{
    public $cod_torneo;
    public $fecha_inicio;
    public $fecha_final;
    public $nom;

    public function __construct()
    {
        parent::__construct();
    }

    public function getIdTorneo(){
        return $this->cod_torneo;
    }

    public function setIdTorneo($id){
        $this->cod_torneo = $id;
        return $this;
    }
    public function getNombre(){
        return $this->nom;
    }

    public function setNombre($nom){
        $this->nom = $nom;
        return $this;
    }

    public function getFecha_inicio(){
        return $this->fecha_inicio;
    }

    public function setFecha_inicio($i){
        $this->fecha_inicio = $i;
        return $this;
    }
    public function getFecha_final(){
        return $this->fecha_final;
    }

    public function setFecha_final($f){
        $this->fecha_final = $f;
        return $this;
    }
    
    public function Crear_Torneo(){
        
        $query = "INSERT INTO " . T_TORNEO . "(". TOR_ID. ','. TOR_NOM.','. TOR_INICIO.','.TOR_FINAL.")" . " VALUES(:" . TOR_ID . ", :" . TOR_NOM. ", :" . TOR_INICIO . ", :" . TOR_FINAL .  ")";
        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . TOR_ID, NULL);
        $statement->bindValue(':' . TOR_NOM, $this->getNombre());
        $statement->bindValue(':' . TOR_INICIO, $this->getFecha_inicio());
        $statement->bindValue(':' . TOR_FINAL, $this->getFecha_final());
        /*echo $query;
        var_dump($statement);
        echo $this->getNombre()."<br>";
        echo $this->getFecha_inicio()."<br>";
        echo $this->getFecha_final()."<br>";*/

        $message = "<h1>Error al ingresar datos!</h1>";
        if ($statement->execute()) {
            $message = "<h1>Datos ingresados con éxito!</h1>";
        }
        return $message;
        
    }
    public function get_Torneos(){
        $row=false;
        $query = "SELECT * FROM " .T_TORNEO;
        $statement = $this->conexion->prepare($query);
        if ($statement->execute()) {
           $row= $statement->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        }
        return $row;
    }
    public function Modificar_Torneo(){
        $query = " UPDATE " . T_TORNEO . "SET(". TOR_ID. ','. TOR_NOM.','. TOR_INICIO.','.TOR_FINAL.")" . 
        " VALUES(:" . TOR_ID . ", :" . TOR_NOM. ", :" . TOR_INICIO . ", :" . TOR_FINAL . ") WHERE " . TOR_ID . "= :" . TOR_ID;

        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . TOR_ID, $this->getIdTorneo());
        $statement->bindValue(':' . TOR_NOM, $this->getNombre());
        $statement->bindValue(':' . TOR_INICIO, $this->getFecha_inicio());
        $statement->bindValue(':' . TOR_FINAL, $this->getFecha_final());

        $message = "<h1>Error al modificar datos!</h1>";
        if ($statement->execute()) {
            $message = "<h1>Datos modificados con éxito!</h1>";
        }
        return $message;
    }
    
    public function Eliminar_Torneo(){
        $query = "DELETE FROM " . T_TORNEO . " WHERE " . TOR_ID . "= :" . TOR_ID ;
        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . TOR_ID, $this->getIdTorneo());

        $message = "<h1>Error al ELIMINAR estadio!</h1>";
        if ($statement->execute()) {
            $message = "<h1>Datos eliminados con éxito!</h1>";
        }
        return $message;
    }
}