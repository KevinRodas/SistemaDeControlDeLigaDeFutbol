<?php
require_once "database/Database.php";
require_once "config/db_config.php";
require_once "config/configGeneral.php";

class Estadio extends Database{
    public $codigo;
    public $nombre;
    public $direccion;
    public $disponibilidad;
    public $encargado;
    public $telefono;
    
    
    public function __construct()
    {
        parent::__construct();
    }

    public function setId($id){
        $this->codigo = $id;
        return $this;
    }
    public function getId(){
        return $this->codigo;
    }
 
    public function setNom($nom){
        $this->nombre = $nom;
        return $this;
    }
    public function getNom(){
        return $this->nombre;
    }
     
    public function setDir($dir){
        $this->direccion = $dir;
        return $this;
    }
    public function getDir(){
        return $this->direccion;
    }
     
    public function setDisponibilidad($dis){
        $this->disponibilidad=$dis;
        return $this;
    }
    public function getDisponibilidad(){
        return $this->disponibilidad;
    }

    public function setEncargado($e){
        $this->encargado = $e;
        return $this;
    }
    public function getEncargado(){
        return $this->encargado;
    }

    public function setTel($t){
        $this->telefono = $t;
        return $this;
    }
    public function getTel(){
        return $this->telefono;
    }

    public function Crear_Estadio(){
 
        $query = "INSERT INTO " . T_ESTADIO . "(". EST_ID. ','. EST_NOM.','. EST_DIR.','.EST_DISP.','.EST_ENC.','.EST_TEL.")" . " VALUES(:" . EST_ID . ", :" . EST_NOM. ", :" . EST_DIR . ", :" . EST_DISP . ", :". EST_ENC . ", :". EST_TEL. ")";
        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . EST_ID, NULL);
        $statement->bindValue(':' . EST_NOM, $this->getNom());
        $statement->bindValue(':' . EST_DIR, $this->getDir());
        $statement->bindValue(':' . EST_DISP, $this->getDisponibilidad());
        $statement->bindValue(':' . EST_ENC, $this->getEncargado());
        $statement->bindValue(':' . EST_TEL, $this->getTel());
        $message = "<h1>Error al ingresar datos!</h1>";
        if ($statement->execute()) {
            $message = "<h1>Datos ingresados con éxito!</h1>";
        }
        return $message;
    }
    
    public function Ver_Estadio(){
        $query = "SELECT * FROM " . T_ESTADIO . "WHERE " . EST_ID . "= :" . EST_ID ;
        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . EST_ID, $this->getId());
        $row = false;
        if ($statement->execute()) {
            $row = $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        return $row;
    }
    
    public function Modificar_Estadio(){
        $query = "UPDATE " . T_ESTADIO . "SET(". EST_NOM.','. EST_DIR.','.EST_DISP.")" . " VALUES(:" . EST_NOM. ", :" . EST_DIR . ", :" . EST_DISP .  ") WHERE " . EST_ID . "= :" . EST_ID ;
        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . EST_ID, $this->getId());
        $statement->bindValue(':' . EST_NOM, $this->getNom());
        $statement->bindValue(':' . EST_DIR, $this->getDir());
        $statement->bindValue(':' . EST_DISP, $this->getDisponibilidad());
        $statement->bindValue(':' . EST_ENC, $this->getEncargado());
        $statement->bindValue(':' . EST_TEL, $this->getTel());
        $message = "<h1>Error al actualizar estadio!</h1>";
        if ($statement->execute()) {
            $message = "<h1>Datos actualizados con éxito!</h1>";
        }
        return $message;
    }

    public function Eliminar_Estadio(){
        $query = "DELETE FROM " . T_ESTADIO . " WHERE " . EST_ID . "= :" . EST_ID ;
        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . EST_ID, $this->getId());

        $message = "<h1>Error al ELIMINAR estadio!</h1>";
        if ($statement->execute()) {
            $message = "<h1>Datos eliminados con éxito!</h1>";
        }
        return $message;
    }

    public function Actualizar_Disponibilidad(){
        $query = "UPDATE " . T_ESTADIO . "SET(".EST_DISP.")" . " VALUES(:".  EST_DISP .  ") WHERE " . EST_ID . "= :" . EST_ID ;
        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . EST_DISP, $this->getDisponibilidad());
        $statement->bindValue(':' . EST_ID, $this->getId());
        
        $message = "<h1>Error al actualizar estado!</h1>";
        if ($statement->execute()) {
            $message = "<h1>Datos actualizados con éxito!</h1>";
        }
        return $message;
    }

    public function get_Estadios(){
        $row=false;
        $query = "SELECT * FROM " .T_ESTADIO;
        $statement = $this->conexion->prepare($query);
        if ($statement->execute()) {
           $row= $statement->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        }
        return $row;
    }
}