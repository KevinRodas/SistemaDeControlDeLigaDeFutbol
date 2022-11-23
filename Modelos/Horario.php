<?php
require_once "database/Database.php";
require_once "config/db_config.php";
require_once "config/configGeneral.php";
class Horario extends Database{
    public $cod_horario;
    public $cod_partido;
    public $cod_estadio;
    public $fecha;
    public $hora_inicio;
    public $hora_final;

    public function setId($id){
        $this->cod_horario = $id;
        return $this;
    }
    public function getId(){
        return $this->cod_horario;
    }

    public function setIdPartido($id){
        $this->cod_partido = $id;
        return $this;
    }
    public function getIdPartido(){
        return $this->cod_partido;
    }

    public function setIdEstadio($id){
        $this->cod_estadio = $id;
        return $this;
    }
    public function getIdEstadio(){
        return $this->cod_estadio;
    }

    public function setFecha($f){
        $this->fecha = $f;
        return $this;
    }
    public function getFecha(){
        return $this->fecha;
    }

    public function setHoraInicio($h){
        $this->hora_inicio = $h;
        return $this;
    }
    public function getHoraInicio(){
        return $this->hora_inicio;
    }
    
    public function setHoraFinal($h){
        $this->hora_final = $h;
        return $this;
    }
    public function getHoraFinal(){
        return $this->hora_final;
    }

    public function Crear_Horario(){
        $query = "INSERT INTO " . T_HORARIO . "(". HOR_ID. ','. HOR_PART.','. HOR_FECHA.','.HOR_INICIO.','.HOR_FINAL.")" . " VALUES(:" . HOR_ID . ", :" . HOR_PART. ", :" . HOR_FECHA . ", :" . HOR_INICIO . ", :". HOR_FINAL . ")";
        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . HOR_ID, NULL);
        $statement->bindValue(':' . HOR_PART, $this->getIdPartido());
        $statement->bindValue(':' . HOR_FECHA, $this->getFecha());
        $statement->bindValue(':' . HOR_INICIO, $this->getHoraInicio());
        $statement->bindValue(':' . HOR_FINAL, $this->getHoraFinal());
        $message = "<h1>Error al ingresar datos!</h1>";
        if ($statement->execute()) {
            $message = "<h1>Datos ingresados con éxito!</h1>";
        }
        return $message;
    }
    
    public function Modificar_Horario(){
        $query = " UPDATE " . T_HORARIO . "SET(".HOR_PART.','. HOR_FECHA.','.HOR_INICIO.','.HOR_FINAL.")" . 
        " VALUES(:" . HOR_PART. ", :". HOR_FECHA. ", :" . HOR_INICIO . ", :" . HOR_FINAL .  ") WHERE " . HOR_ID . "= :" . HOR_ID ;
        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . HOR_ID, $this->getID());
        $statement->bindValue(':' . HOR_PART, $this->getIdPartido());
        $statement->bindValue(':' . HOR_FECHA, $this->getFecha());
        $statement->bindValue(':' . HOR_INICIO, $this->getHoraInicio());
        $statement->bindValue(':' . HOR_FINAL, $this->getHoraFinal());

        $message = "<h1>Error al modificar datos!</h1>";
        if ($statement->execute()) {
            $message = "<h1>Datos modificados con éxito!</h1>";
        }
        return $message;
    }
    
    public function Ver_Horarios(){
        $row=false;
        $query = "SELECT * FROM " .T_HORARIO;
        $statement = $this->conexion->prepare($query);
        if ($statement->execute()) {
           $row= $statement->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        }
        return $row;
    }

    public function Buscar_Horario(){
        $query = "SELECT * FROM " . T_HORARIO . "WHERE " . HOR_ID . "= :" . HOR_ID ;
        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . HOR_ID, $this->getId());
        $row = false;
        if ($statement->execute()) {
            $row = $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        return $row;
    }

    public function Eliminar_Horario(){
        $query = "DELETE FROM " . T_HORARIO . " WHERE " . HOR_ID . "= :" . HOR_ID ;
        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . HOR_ID, $this->getId());

        $message = "<h1>Error al ELIMINAR estadio!</h1>";
        if ($statement->execute()) {
            $message = "<h1>Datos eliminados con éxito!</h1>";
        }
        return $message;
    }
}