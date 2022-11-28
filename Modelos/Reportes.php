<?php
require_once "database/Database.php";
require_once "config/db_config.php";
require_once "config/configGeneral.php";
class Reportes extends Database{
    public $cod_reporte;
    public $cod_partido;
    public $ntarjetas;
    public $observaciones;
    
  
    public function setIdReporte($id){
        $this->cod_reporte= $id;
        return $this;
    }
    public function getIdReporte(){
        return $this->cod_reporte;
    }

    public function setIdPartido($id){
        $this->cod_partido= $id;
        return $this;
    }
    public function getIdPartido(){
        return $this->cod_partido;
    }

    public function setNumTarjetas($tar){
        $this->ntarjetas = $tar;
        return $this;
    }

    public function getNumTarjetas(){
        return $this->ntarjetas;
    }

    public function setObservaciones($o){
        $this->observaciones = $o;
        return $this;
    }

    public function getObservaciones(){
        return $this->observaciones;
    }

    public function Crear_Reporte(){
        $query = "INSERT INTO " . T_REPORTE . "(". REPORT_ID. ','. REPORT_PART. ','. REPORT_TARJ.','. REPORT_OBSERV.")" . 
        " VALUES(:" . REPORT_ID . ", :" . REPORT_PART. ", :" .  REPORT_TARJ. ", :" . REPORT_OBSERV . ")";
        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . REPORT_ID,  $this->getIdReporte());
        $statement->bindValue(':' . REPORT_PART, $this->getIdPartido());
        $statement->bindValue(':' . REPORT_TARJ, $this->getNumTarjetas());
        $statement->bindValue(':' . REPORT_OBSERV, $this->getObservaciones());

        $message = "<h1>Error al ingresar datos!</h1>";
        if ($statement->execute()) {
            $message = "<h1>Datos ingresados con éxito!</h1>";
        }
        return $message;
    }
    
    public function Actualizar_Reporte(){
        $query = "UPDATE " . T_REPORTE. " SET(". REPORT_PART. ','. REPORT_TARJ.','. REPORT_OBSERV.")" . 
        " VALUES(:" .  REPORT_PART. ", :" .  REPORT_TARJ. ", :" . REPORT_OBSERV .  ") WHERE " . REPORT_ID . "= :" . REPORT_ID ;
        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . REPORT_ID,  $this->getIdReporte());
        $statement->bindValue(':' . REPORT_PART, $this->getIdPartido());
        $statement->bindValue(':' . REPORT_TARJ, $this->getNumTarjetas());
        $statement->bindValue(':' . REPORT_OBSERV, $this->getObservaciones());
        $message = "<h1>Error al actualizar estadio!</h1>";
        if ($statement->execute()) {
            $message = "<h1>Datos actualizados con éxito!</h1>";
        }
        return $message;
    }

    public function Actualizar_Reporte_NumTarjetas(){
        $query = "UPDATE " . T_REPORTE. " SET ".  REPORT_TARJ."=:" .  REPORT_TARJ. " WHERE " . REPORT_ID . "=:" . REPORT_ID ;
        //$query = "UPDATE " . TBL_FACTURAS_CONF . " SET " . F_ESTADO . "=:" . F_ESTADO . " WHERE " . F_ID . "=:" . F_ID;
        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . REPORT_ID,  $this->getIdReporte());
        $statement->bindValue(':' . REPORT_TARJ, $this->getNumTarjetas());
        echo $this->getIdReporte()."<br>";
        echo $this->getNumTarjetas()."<br>";
        var_dump($statement);
        $message = "<h1>Error al actualizar estadio!</h1>";
        if ($statement->execute()) {
            $message = "<h1>Datos actualizados con éxito!</h1>";
        }
        return $message;
    }

    
    
    public function Ver_Reportes(){
        $query = "SELECT * FROM " . T_REPORTE;
        $statement = $this->conexion->prepare($query);
        $rows = false;
        if ($statement->execute()) {
            $rows = $row= $statement->fetchAll(PDO::FETCH_ASSOC);;
        }
        return $rows;
    }

    public function Buscar_Reporte(){
        $query = "SELECT * FROM " . T_REPORTE . "WHERE " . REPORT_ID . "= :" . REPORT_ID ;
        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . DET_ID, $this->getIdReporte());
        $rows = false;
        if ($statement->execute()) {
            $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        return $rows;
    }

    public function Eliminar_Reporte(){
        $query = "DELETE FROM " . T_REPORTE . "WHERE " . REPORT_ID . "= :" . REPORT_ID ;
        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . DET_ID, $this->getIdReporte());
        $rows = false;
        if ($statement->execute()) {
            $rows = true;
        }
        return $rows;
    }

    /*public function Crear_Detalle_Sanciones(){ ESTA FUNCION PUEDE QUE NO SEA REQUERIDA

    }*/
}