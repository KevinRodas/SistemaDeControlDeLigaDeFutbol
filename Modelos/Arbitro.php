<?php
require_once('database/Database.php');
require_once "config/configGeneral.php";

class Arbitro extends Database{
    public $codigo;
   
    public $direccion;
    public $disponibilidad;
    public $npartidos;

    public function __construct()
    {
        parent::__construct();
    }

    public function getId(){
        return $this->codigo;
    }

    public function setId($id){
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

    public function getDisponibilidad(){
        return $this->disponibilidad;
    }

    public function setDisponibilidad($dis){
        $this->disponibilidad = $dis;
        return $this;
    }

    public function getNpartidos(){
        return $this->npartidos;
    }

    public function setNpartidos($par){
        $this->npartidos = $par;
        return $this;
    }
    
    public function Crear_Arbitro(){
        $query = "INSERT INTO " . T_ARBITRO. " (". ARB_ID. ', '. ARB_DIR.', '. ARB_DISP.', '. ARB_PART.")" . 
        " VALUES(:" . ARB_ID . ", :" . ARB_DIR. ", :" . ARB_DISP . ", :" . ARB_PART.")";
        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . ARB_ID, $this->getId());
        $statement->bindValue(':' . ARB_DIR, $this->getDireccion());
        $statement->bindValue(':' . ARB_DISP, $this->getDisponibilidad());
        $statement->bindValue(':' . ARB_PART, $this->getNpartidos());
        
        var_dump($statement);
        $message = "<h1>Error al ingresar datos!</h1>";
        if ($statement->execute()) {
            var_dump($statement);
            $message = "<h1>Datos ingresados con éxito!</h1>";
        }
        return $message;
    }
    
    public function Modificar_Arbitro(){
        $query = " UPDATE " . T_REPRE . "SET(".  ARB_ID. ', '. ARB_DIR.', '. ARB_DISP.', '. ARB_PART.")" . 
        " VALUES(:" .  ARB_ID . ", :" . ARB_DIR. ", :" . ARB_DISP . ", :" . ARB_PART. ")";
        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . ARB_ID, $this->getId());
        $statement->bindValue(':' . ARB_DIR, $this->getDireccion());
        $statement->bindValue(':' . ARB_DISP, $this->getDisponibilidad());
        $statement->bindValue(':' . ARB_PART, $this->getNpartidos());

        $message = "<h1>Error al modificar datos!</h1>";
        if ($statement->execute()) {
            $message = "<h1>Datos modificados con éxito!</h1>";
        }
        return $message;
    }
    
    public function Ver_Arbitro(){
        $row=false;
        $query = "SELECT * FROM " .T_ARBITRO;
        $statement = $this->conexion->prepare($query);
        if ($statement->execute()) {
           $row= $statement->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        }
        return $row;
    }
    
    public function Buscar_Arbitro(){
        $query = "SELECT * FROM " . T_ARBITRO . "WHERE " . ARB_ID . "= :" . ARB_ID ;
        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . ARB_ID, $this->getId());
        $row = false;
        if ($statement->execute()) {
            $row = $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        return $row;
    }

    public function Eliminar_Arbitro(){
        $query = "DELETE FROM " . T_ARBITRO . " WHERE " . ARB_ID . "= :" . ARB_ID ;
        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . ARB_ID, $this->getId());

        $message = "<h1>Error al ELIMINAR !</h1>";
        if ($statement->execute()) {
            $message = "<h1>Datos eliminados con éxito!</h1>";
        }
        return $message;
    }

    public function Crear_Reportes(){
        
    }
    
    public function Describir_Reporte(){

    }
    
    public function Lista_Reportes(){

    }
}