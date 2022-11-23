<?php
require_once('database/Database.php');
require_once "config/configGeneral.php";
require_once "config/db_config.php";
class Detalle_Sanciones extends Database{
    public $cod_detalle;
    public $cod_reporte;
    public $cod_sancion;
    public $descripcion;
    public $estado;
    
    public function setIdDetalle($id){
        $this->cod_detalle= $id;
        return $this;
    }
    public function getIdDetalle(){
        return $this->cod_detalle;
    }
    public function setIdReporte($id){
        $this->cod_reporte= $id;
        return $this;
    }
    public function getIdReporte(){
        return $this->cod_reporte;
    }
    public function setIdSancion($id){
        $this->cod_torneo = $id;
        return $this;
    }
    public function getIdSancion(){
        return $this->descripcion;
    }

    public function getDescripcion(){
        return $this->cod_torneo;
    }

    public function setDescripcion($des){
        $this->descripcion = $des;
        return $this;
    }

    
    public function setEstado($est){
        $this->estado = $est;
        return $this;
    }
    public function getEstado(){
        return $this->estado;
    }


    public function Crear_Detalle(){
        $query = "INSERT INTO " . T_DETALLE . "(". DET_ID. ','. DET_REPORTE. ','. DET_SANCION.','. DET_DESCRIP.','.DET_EST.")" . 
        " VALUES(:" . DET_ID . ", :" . DET_REPORTE. ", :" .  DET_SANCION. ", :" . DET_DESCRIP . ", :" . DET_EST . ")";
        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . DET_ID, NULL);
        $statement->bindValue(':' . DET_REPORTE, $this->getIdReporte());
        $statement->bindValue(':' . DET_SANCION, $this->getIdSancion());
        $statement->bindValue(':' . DET_DESCRIP, $this->getDescripcion());
        $statement->bindValue(':' . DET_EST, $this->getEstado());

        $message = "<h1>Error al ingresar datos!</h1>";
        if ($statement->execute()) {
            $message = "<h1>Datos ingresados con éxito!</h1>";
        }
        return $message;
    }

    public function Actualizar_Detalle(){
        $query = "UPDATE " . T_DETALLE. "SET(". DET_ID. ','. DET_REPORTE. ','. DET_SANCION.','. DET_DESCRIP.','.DET_EST.")" . 
        " VALUES(:" . DET_ID . ", :" . DET_REPORTE. ", :" .  DET_SANCION. ", :" . DET_DESCRIP . ", :" . DET_EST .  ") WHERE " . DET_ID . "= :" . DET_ID ;
        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . DET_ID, $this->getIdDetalle());
        $statement->bindValue(':' . DET_REPORTE, $this->getIdReporte());
        $statement->bindValue(':' . DET_SANCION, $this->getIdSancion());
        $statement->bindValue(':' . DET_DESCRIP, $this->getDescripcion());
        $statement->bindValue(':' . DET_EST, $this->getEstado());
        $message = "<h1>Error al actualizar estadio!</h1>";
        if ($statement->execute()) {
            $message = "<h1>Datos actualizados con éxito!</h1>";
        }
        return $message;
    }
    
    public function Ver_Detalles_Reporte(){
        $query = "SELECT * FROM " . T_DETALLE . "WHERE " . DET_REPORTE . "= :" . DET_REPORTE ;
        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . DET_REPORTE, $this->getIdReporte());
        $rows = false;
        if ($statement->execute()) {
            $rows =  $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        return $rows;
    }
    
    public function Eliminar_Detalles_Reporte(){
        $query = "DELETE FROM " . T_DETALLE . "WHERE " . DET_REPORTE . "= :" . DET_REPORTE ;
        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . DET_REPORTE, $this->getIdReporte());
        $rows = false;
        if ($statement->execute()) {
            $rows = true;
        }
        return $rows;
    }

    public function Eliminar_Detalle(){
        $query = "DELETE FROM " . T_DETALLE . "WHERE " . DET_ID . "= :" . DET_ID ;
        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . DET_ID, $this->getIdDetalle());
        $rows = false;
        if ($statement->execute()) {
            $rows = true;
        }
        return $rows;
    }
    public function Buscar_Detalle(){
        $query = "SELECT * FROM " . T_DETALLE . "WHERE " . DET_ID . "= :" . DET_ID ;
        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . DET_ID, $this->getIdDetalle());
        $rows = false;
        if ($statement->execute()) {
            $rows =  $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        return $rows;
    }

    public function Mostrar_Detalles(){
        $query = "SELECT * FROM " . T_DETALLE ;
        $statement = $this->conexion->prepare($query);
        $rows = false;
        if ($statement->execute()) {
            $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        return $rows;
    }
}