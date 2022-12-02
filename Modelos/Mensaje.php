<?php
require_once "database/Database.php";
require_once "config/db_config.php";
require_once "config/configGeneral.php";
class Mensaje extends Database{
    public $cod_mensaje;
    public $cod_partido;
    public $cod_emisor;
    public $cod_receptor;
    public $asunto;
    public $contenido;
    public $tipo;
    public $estado;
    
  
    public function setIdMensaje($id){
        $this->cod_mensaje= $id;
        return $this;
    }
    public function getIdMensaje(){
        return $this->cod_mensaje;
    }

    public function setIdPartido($id){
        $this->cod_partido= $id;
        return $this;
    }
    public function getIdPartido(){
        return $this->cod_partido;
    }

    public function setIdEmisor($id){
        $this->cod_emisor= $id;
        return $this;
    }
    public function getIdEmisor(){
        return $this->cod_emisor;
    }

    public function setIdReceptor($id){
        $this->cod_receptor= $id;
        return $this;
    }
    public function getIdReceptor(){
        return $this->cod_receptor;
    }

    public function setAsunto($a){
        $this->asunto = $a;
        return $this;
    }

    public function getAsunto(){
        return $this->asunto;
    }

    public function setContenido($o){
        $this->contenido = $o;
        return $this;
    }

    public function getContenido(){
        return $this->contenido;
    }

    public function setTipo($o){
        $this->tipo = $o;
        return $this;
    }

    public function getTipo(){
        return $this->tipo;
    }

    public function setEstadoMensaje($o){
        $this->estado = $o;
        return $this;
    }

    public function getEstadoMensaje(){
        return $this->estado;
    }

    public function Crear_Mensaje(){
        $query = "INSERT INTO " . T_MENSAJERIA . "(". MSJ_ID. ','. MSJ_PART. ','. MSJ_EMISOR.','. MSJ_RECEPTOR. ','. MSJ_ASUNTO. ','. MSJ_CONTENIDO. ','. MSJ_EST. ','. MSJ_TIPO.")" . 
        " VALUES(:" . MSJ_ID . ", :" . MSJ_PART. ", :" .  MSJ_EMISOR. ", :" . MSJ_RECEPTOR .  ", :" . MSJ_ASUNTO .  ", :" . MSJ_CONTENIDO .  ", :" . MSJ_EST .", :" . MSJ_TIPO .")";
        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . MSJ_ID,  NULL);
        $statement->bindValue(':' . MSJ_PART, $this->getIdPartido());
        $statement->bindValue(':' . MSJ_EMISOR, $this->getIdEmisor());
        $statement->bindValue(':' . MSJ_RECEPTOR, $this->getIdReceptor());
        $statement->bindValue(':' . MSJ_ASUNTO, $this->getAsunto());
        $statement->bindValue(':' . MSJ_CONTENIDO, $this->getContenido());
        $statement->bindValue(':' . MSJ_EST, $this->getEstadoMensaje());
        $statement->bindValue(':' . MSJ_TIPO, $this->getTipo());

        $message = "<h1>Error al ingresar datos!</h1>";
        if ($statement->execute()) {
            $message = "<h1>Datos ingresados con éxito!</h1>";
        }
        return $message;
    }
    
    public function Actualizar_Estado_Mensaje(){
        $query = "UPDATE " . T_MENSAJERIA . " SET ".  MSJ_EST."=:" .  MSJ_EST. " WHERE " . MSJ_ID . "=:" . MSJ_ID;
        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . MSJ_ID,  $this->getIdMensaje());
        $statement->bindValue(':' . MSJ_EST, $this->getEstadoMensaje());
        $message = "<h1>Error al actualizar estadio!</h1>";
        if ($statement->execute()) {
            $message = "<h1>Datos actualizados con éxito!</h1>";
        }
        return $message;
    }

  
    public function Mostrar_Mensajes(){
        $query = "SELECT * FROM " . T_MENSAJERIA." WHERE ".MSJ_EMISOR."=:".MSJ_EMISOR." || ".MSJ_RECEPTOR."=:".MSJ_EMISOR ;
        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . MSJ_EMISOR,  $this->getIdEmisor());
        $rows = false;
        if ($statement->execute()) {
            $rows =  $statement->fetchAll(PDO::FETCH_ASSOC);;
        }
        return $rows;
    }

    public function Ver_Mensaje(){
        $query = "SELECT * FROM " . T_MENSAJERIA." WHERE ".MSJ_ID."=:".MSJ_ID ;
        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . MSJ_ID,  $this->getIdMensaje());
        $rows = false;
        if ($statement->execute()) {
            $rows = $statement->fetchAll(PDO::FETCH_ASSOC);;
        }
        return $rows;
    }

    public function Mostrar_Mensajes_Recibidos(){
        $query = "SELECT * FROM " . T_MENSAJERIA ." WHERE ".MSJ_RECEPTOR."=:".MSJ_RECEPTOR;
        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . MSJ_RECEPTOR,  $this->getIdReceptor());
        $rows = false;
        if ($statement->execute()) {
            $rows = $row= $statement->fetchAll(PDO::FETCH_ASSOC);;
        }
        return $rows;
    }

    public function Mostrar_Mensajes_Enviados(){
        $query = "SELECT * FROM " . T_MENSAJERIA ." WHERE ".MSJ_EMISOR."=:".MSJ_EMISOR;
        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . MSJ_EMISOR,  $this->getIdEmisor());
        $rows = false;
        if ($statement->execute()) {
            $rows = $row= $statement->fetchAll(PDO::FETCH_ASSOC);;
        }
        return $rows;
    }

    public function Eliminar_Mensaje(){
        $query = "DELETE FROM " . T_MENSAJERIA . " WHERE " . MSJ_ID . "= :" . MSJ_ID ;
        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . MSJ_ID, $this->getIdMensaje());
        $rows = false;
        if ($statement->execute()) {
            $rows = true;
        }
        return $rows;
    }

    /*public function Crear_Detalle_Sanciones(){ ESTA FUNCION PUEDE QUE NO SEA REQUERIDA

    }*/
}