<?php
require_once('database/Database.php');
require_once "config/configGeneral.php";

class Indumentaria{
    public $cod_indumentaria;
    public $cod_logo;
    public $color_pri;
    public $color_sec;
    public $cod_uniforme;

    public function __construct()
    {
        parent::__construct();
    }

    public function getCodLogo(){
        return $this->cod_logo;
    }

    public function setCodLogo($clog){
        $this->cod_logo = $clog;
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
        
    }
    
    public function Modificar_Indumentaria(){

    }

}