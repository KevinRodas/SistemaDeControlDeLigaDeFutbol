<?php
require_once('database/Database.php');
require_once "config/configGeneral.php";

class Indumentaria extends Database{
    public $id_indumentaria;
    public $id_equipo;
    public $cod_logo;
    public $color_pri;
    public $color_sec;
    public $cod_uniforme;

    public function __construct()
    {
        parent::__construct();
    }

    public function getIdIndumentaria(){
        return $this->id_indumentaria;
    }

    public function setIdIndumentaria($idin){
        $this->id_indumentaria = $idin;
        return $this;
    }

    public function getCodLogo(){
        return $this->cod_logo;
    }

    public function setCodLogo($clog){
        $this->cod_logo = $clog;
        return $this;
    }

    public function getIdEquipo(){
        return $this->id_equipo;
    }

    public function setIdEquipo($ieq){
        $this->id_equipo = $ieq;
        return $this;
    }

    public function getColorPrimario(){
        return $this->color_pri;
    }

    public function setColorPrimario($cpri){
        $this->color_pri = $cpri;
        return $this;
    }

    public function getColorSecundario(){
        return $this->color_sec;
    }

    public function setColorSecundario($csec){
        $this->color_sec = $csec;
        return $this;
    }

    public function getCodUniforme(){
        return $this->cod_uniforme;
    }

    public function setCodUniforme($cat){
        $this->cod_uniforme = $cat;
        return $this;
    }
    
    public function Crear_Indumentaria(){
        $query = "INSERT INTO " . T_INDUMENTARIA . "(". INDUMT_ID. ','. INDUMT_EQP.','. INDUMT_LOGO.','.INDUMT_UNIF.','.INDUMT_COLORP.','.INDUMT_COLORS.")" . " VALUES(:" . INDUMT_ID . ", :" . INDUMT_EQP. ", :" . INDUMT_LOGO . ", :" . INDUMT_UNIF . ", :". INDUMT_COLORP . ", :". INDUMT_COLORS. ")";
        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . INDUMT_ID, NULL);
        $statement->bindValue(':' . INDUMT_EQP, $this->getIdEquipo());
        $statement->bindValue(':' . INDUMT_LOGO, $this->getCodLogo());
        $statement->bindValue(':' . INDUMT_UNIF, $this->getCodUniforme());
        $statement->bindValue(':' . INDUMT_COLORP, $this->getColorPrimario());
        $statement->bindValue(':' . INDUMT_COLORS, $this->getColorSecundario());
        var_dump($statement);
        $message = "<h1>Error al ingresar datos!</h1>";
        if ($statement->execute()) {
            var_dump($statement);
            $message = "<h1>Datos ingresados con éxito!</h1>";
        }
        return $message;
    }

    public function Ver_Indumentaria(){
        $rows=false;
        $query = "SELECT * FROM " .T_INDUMENTARIA;
        $statement = $this->conexion->prepare($query);
        if ($statement->execute()) {
           $rows= $statement->fetchAll(PDO::FETCH_ASSOC);
            return $rows;
        }
        return $rows;
    }
    
    public function Editar_Indumentaria(){
        $query = "UPDATE " . T_INDUMENTARIA . "SET(". INDUMT_ID. ','. INDUMT_EQP.','. INDUMT_LOGO.','.INDUMT_UNIF.','.INDUMT_COLORP.','.INDUMT_COLORS.")" . " VALUES(:" . INDUMT_ID . ", :" . INDUMT_EQP. ", :" . INDUMT_LOGO . ", :" . INDUMT_UNIF . ", :". INDUMT_COLORP . ", :". INDUMT_COLORS. ") WHERE " . INDUMT_ID . "= :" . INDUMT_ID ;
        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . INDUMT_ID, $this->getIdIndumentaria());
        $statement->bindValue(':' . INDUMT_EQP, $this->getIdEquipo());
        $statement->bindValue(':' . INDUMT_LOGO, $this->getCodLogo());
        $statement->bindValue(':' . INDUMT_UNIF, $this->getCodUniforme());
        $statement->bindValue(':' . INDUMT_COLORP, $this->getColorPrimario());
        $statement->bindValue(':' . INDUMT_COLORS, $this->getColorSecundario());
        $message = "<h1>Error al actualizar estadio!</h1>";
        if ($statement->execute()) {
            $message = "<h1>Datos actualizados con éxito!</h1>";
        }
        return $message;
    }

    public function Eliminar_Indumentaria(){
        $query = "DELETE FROM " . T_INDUMENTARIA . " WHERE " . INDUMT_ID . "= :" . INDUMT_ID ;
        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . INDUMT_ID, $this->getIdIndumentaria());

        $message = "<h1>Error al ELIMINAR estadio!</h1>";
        if ($statement->execute()) {
            $message = "<h1>Datos eliminados con éxito!</h1>";
        }
        return $message;
    }

    public function Buscar_Indumentaria(){
        $row=false;
        $query = "SELECT * FROM " .T_INDUMENTARIA . " WHERE " . INDUMT_ID . "= :" . INDUMT_ID ;
        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . INDUMT_ID, $this->getIdIndumentaria());

        if ($statement->execute()) {
           $row= $statement->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        }
        return $row;
    }

}