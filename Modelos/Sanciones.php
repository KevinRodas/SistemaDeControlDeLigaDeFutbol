<?php
require_once('database/Database.php');
require_once "config/configGeneral.php";

class Sanciones{
    public $cod_sancion;
    public $cod_partido;
    public $cod_arbitro;
    public $cod_sancionado;
    public $categoria;
    public $fecha_sancion;
    public $fecha_fin;
    public $dias_penalizacion;
    public $precio;
    public $estado;

    public function __construct()
    {
        parent::__construct();
    }

    public function getCodPartido(){
        return $this->cod_partido;
    }

    public function setCodPartido($cpar){
        $this->cod_partido = $cpar;
        return $this;
    }

    public function getCodArbitro(){
        return $this->cod_arbitro;
    }

    public function setCodArbitro($carb){
        $this->cod_arbitro = $carb;
        return $this;
    }

    public function getCodSancionado(){
        return $this->cod_sancionado;
    }

    public function setCodSancionado($csan){
        $this->cod_sancionado = $csan;
        return $this;
    }

    public function getCategoria(){
        return $this->categoria;
    }

    public function setCategoria($cat){
        $this->categoria = $cat;
        return $this;
    }

    public function getFecha_Sancion(){
        return $this->fecha_sancion;
    }

    public function setFecha_Sancion($fsan){
        $this->fecha_sancion = $fsan;
        return $this;
    }

    public function getFecha_Fin(){
        return $this->fecha_fin;
    }

    public function setFecha_Fin($ffin){
        $this->fecha_fin = $ffin;
        return $this;
    }

    public function getDias_Penalizacion(){
        return $this->dias_penalizacion;
    }

    public function setDias_Penalizacion($dpen){
        $this->dias_penalizacion = $dpen;
        return $this;
    }

    public function getPrecio(){
        return $this->precio;
    }

    public function setPrecio($prec){
        $this->precio = $prec;
        return $this;
    }

    public function getEstado(){
        return $this->estado;
    }

    public function setEstado($est){
        $this->estado = $est;
        return $this;
    }
    
    public function Crear_Sancion(){
        $query = "INSERT INTO " . T_SANCIONES . "(". SANCION_ID. ','. SANCION_PART.','. SANCION_ARB.','. SANCION_ID_SAN.','. SANCION_CAT.','. SANCION_INICIO.','. SANCION_FIN.','. SANCION_DIA.','. SANCION_PR.','. SANCION_EST.")" . " VALUES(:" . SANCION_ID . ", :" . SANCION_PART. ", :" . SANCION_ARB . ", :" . SANCION_ID_SAN . ", :" . SANCION_CAT . ", :" . SANCION_INICIO . ", :" . SANCION_FIN . ", :" . SANCION_DIA . ", :" . SANCION_PR . ", :" . SANCION_EST .")";
        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . SANCION_ID, NULL);
        $statement->bindValue(':' . SANCION_PART, $this->getCodPartido());
        $statement->bindValue(':' . SANCION_ARB, $this->getCodArbitro());
        $statement->bindValue(':' . SANCION_ID_SAN, $this->getCodSancionado());
        $statement->bindValue(':' . SANCION_CAT, $this->getCategoria());
        $statement->bindValue(':' . SANCION_INICIO, $this->getFecha_Sancion());
        $statement->bindValue(':' . SANCION_FIN, $this->getFecha_Fin());
        $statement->bindValue(':' . SANCION_DIA, $this->getDias_Penalizacion());
        $statement->bindValue(':' . SANCION_PR, $this->getPrecio());
        $statement->bindValue(':' . SANCION_EST, $this->getEstado());


        $message = "<h1>Error al ingresar datos!</h1>";
        if ($statement->execute()) {
            $message = "<h1>Datos ingresados con éxito!</h1>";
        }
        return $message;
    }

    public function get_Sancion(){
        $row=false;
        $query = "SELECT * FROM " .T_SANCIONES;
        $statement = $this->conexion->prepare($query);
        if ($statement->execute()) {
           $row= $statement->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        }
        return $row;
    }
    
    public function Actualizar_Sancion(){

    }
    
    public function Ver_Sancion(){

    }

    public function Buscar_Sancion(){

    }
}