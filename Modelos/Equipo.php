<?php
require_once "database/Database.php";
require_once "config/db_config.php";
require_once "config/configGeneral.php";
class Equipo extends Database{
    public $codigo;
    public $nombre;
    public $direccion;
    public $departamento;
    public $cod_representante;
    public $nintegrantes;
    public $cod_indumentaria;
    public $nsanciones;
    public $estado;
    
    public function __construct()
    {
        parent::__construct();
    }

    public function getID(){
        return $this->codigo;
    }
    public function setID($id){
        $this->codigo = $id;
        return $this;
    }

    public function getNom(){
        return $this->nombre;
    }
    public function setNom($nom){
        $this->nombre = $nom;
        return $this;
    }

    public function getDir(){
        return $this->direccion;
    }
    public function setDir($dir){
        $this->direccion = $dir;
        return $this;
    }

    public function getDep(){
        return $this->departamento;
    }
    public function setDep($dep){
        $this->departamento = $dep;
        return $this;
    }

    public function getIdRepre(){
        return $this->cod_representante;
    }
    public function setIdRepre($r){
        $this->cod_representante = $r;
        return $this;
    }

    public function getN_Integrantes(){
        return $this->nintegrantes;
    }
    public function setN_Integrantes($inte){
        $this->nintegrantes = $inte;
        return $this;
    }

    public function getIdIndumentaria(){
        return $this->cod_indumentaria;
    }
    public function setIdIndumentaria($indu){
        $this->cod_indumentaria = $indu;
        return $this;
    }

    public function getN_Sanciones(){
        return $this->nsanciones;
    }
    public function setN_Sanciones($s){
        $this->nsanciones = $s;
        return $this;
    }

    public function getEstado(){
        return $this->estado;
    }
    public function setEstado($e){
        $this->estado = $e;
        return $this;
    }


    public function Crear_Equipo(){
        $query = "INSERT INTO " . T_EQUIPO . "(". EQP_ID. ','. EQP_NOM.','.EQP_DIR.','.EQP_DEP.','.EQP_REPRE.','.EQP_INTEGRANTE.','.EQP_SANCIONES.','.EQP_ESTADO.")" . 
        " VALUES(:" . EQP_ID . ", :" . EQP_NOM. ", :" . EQP_DIR . ", :" . EQP_DEP . ", :". EQP_REPRE . ", :". EQP_INTEGRANTE. ", :". EQP_SANCIONES . ", :". EQP_ESTADO.  ")";
        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . EQP_ID, $this->getID());
        $statement->bindValue(':' . EQP_NOM, $this->getNom());
        $statement->bindValue(':' . EQP_DIR, $this->getDir());
        $statement->bindValue(':' . EQP_DEP, $this->getDep());
        $statement->bindValue(':' . EQP_REPRE, $this->getIdRepre());
        $statement->bindValue(':' . EQP_INTEGRANTE, $this->getN_Integrantes());
        $statement->bindValue(':' . EQP_SANCIONES, $this->getN_Sanciones());
        $statement->bindValue(':' . EQP_ESTADO, $this->getEstado());
        $message = "<h1>Error al ingresar datos!</h1>";
        if ($statement->execute()) {
            $message = "<h1>Datos ingresados con éxito!</h1>";
        }
        return $message;
    }
    
    public function Ver_Equipo(){
        $query = "SELECT * FROM " . T_EQUIPO . "WHERE " . EQP_ID . "= :" . EQP_ID ;
        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . EQP_ID, $this->getID());
        $message = "<h1>Error al buscar estadio!</h1>";
        if ($statement->execute()) {
            $message = "<h1>Datos encontrado con éxito!</h1>";
        }
        return $message;
    }
    
    public function Editar_Equipo(){
        $query = " UPDATE " . T_EQUIPO . "SET(". EQP_NOM.','.EQP_DIR.','.EQP_DEP.','.EQP_REPRE.','.EQP_INTEGRANTE.','.EQP_SANCIONES.','.EQP_ESTADO.")" . 
        " VALUES(:" . EQP_NOM. ", :" . EQP_DIR . ", :" . EQP_DEP . ", :". EQP_REPRE . ", :". EQP_INTEGRANTE.", :" . EQP_SANCIONES . ", :". EQP_ESTADO.  ") WHERE " . EQP_ID . "= :" . EQP_ID ;
        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . EQP_ID, $this->getID());
        $statement->bindValue(':' . EQP_NOM, $this->getNom());
        $statement->bindValue(':' . EQP_DIR, $this->getDir());
        $statement->bindValue(':' . EQP_DEP, $this->getDep());
        $statement->bindValue(':' . EQP_REPRE, $this->getIdRepre());
        $statement->bindValue(':' . EQP_INTEGRANTE, $this->getN_Integrantes());
        //$statement->bindValue(':' . EQP_INDUMENTARIA, $this->getIdIndumentaria());
        $statement->bindValue(':' . EQP_SANCIONES, $this->getN_Sanciones());
        $statement->bindValue(':' . EQP_ESTADO, $this->getEstado());
        $message = "<h1>Error al modificar datos!</h1>";
        if ($statement->execute()) {
            $message = "<h1>Datos modificados con éxito!</h1>";
        }
        return $message;
    }

    public function Eliminar_Equipo(){
        $query = "DELETE FROM " . T_EQUIPO . " WHERE " . EQP_ID . "= :" . EQP_ID ;
        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . EQP_ID , $this->getID());

        $message = "<h1>Error al ELIMINAR estadio!</h1>";
        if ($statement->execute()) {
            $message = "<h1>Datos eliminados con éxito!</h1>";
        }
        return $message;
    }

    public function Mostrar_Equipos(){
        $row=false;
        $query = "SELECT * FROM " .T_EQUIPO;
        $statement = $this->conexion->prepare($query);
        if ($statement->execute()) {
           $row= $statement->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        }
        return $row;
    }

    public function Ver_Estado_Equipo(){
        $row=false;
        $query = "SELECT ".EQP_ESTADO." FROM " .T_EQUIPO. " WHERE " . EQP_ID . "= :" . EQP_ID;
        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . EQP_ID , $this->getID());
        if ($statement->execute()) {
           $row= $statement->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        }
        return $row;
    }


    public function Ver_Equipos_Activos(){
        $row=false;
        $query = "SELECT * FROM " . T_EQUIPO . " WHERE " . EQP_ESTADO . "= 'Activo'" ;
        $statement = $this->conexion->prepare($query);
        $message = "<h1>Error al buscar estadio!</h1>";
        if ($statement->execute()) {
            $row= $statement->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        }
        return $row;
    }

    public function buscar_Equipos(){
        $row=false;
        $query = "SELECT * FROM " .T_EQUIPO." WHERE ".EQP_ID."=:".EQP_ID;
        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . EQP_ID , $this->getID());
        if ($statement->execute()) {
           $row= $statement->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        }
        return $row;
    }

    public function buscar_Equipo_repre(){
        $row=false;
        $query = "SELECT * FROM " .T_EQUIPO." WHERE ".EQP_REPRE."=:".EQP_REPRE;
        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . EQP_REPRE , $this->getIdRepre());
        if ($statement->execute()) {
           $row= $statement->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        }
        return $row;
    }
}