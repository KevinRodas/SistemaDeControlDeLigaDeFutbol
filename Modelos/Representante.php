<?php
require_once('database/Database.php');
require_once "config/configGeneral.php";

class Representante{
    public $codigo;
    public $nombre;
    public $apellido;
    public $edad;
    public $ntelefono;
    public $correo;
    public $direccion;
    public $cod_equipo;

    public function __construct()
    {
        parent::__construct();
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nom){
        $this->nombre = $nom;
        return $this;
    }

    public function getApellido(){
        return $this->apellido;
    }

    public function setApellido($ap){
        $this->apellido = $ap;
        return $this;
    }

    public function getEdad(){
        return $this->edad;
    }

    public function setEdad($ed){
        $this->edad = $ed;
        return $this;
    }

    public function getNtelefono(){
        return $this->ntelefono;
    }

    public function setNtelefono($ntel){
        $this->ntelefono = $ntel;
        return $this;
    }

    public function getCorreo(){
        return $this->correo;
    }

    public function setCorreo($cor){
        $this->correo = $cor;
        return $this;
    }

    public function getDireccion(){
        return $this->direccion;
    }

    public function setDireccion($dir){
        $this->direccion = $dir;
        return $this;
    }

    public function getCodEquipo(){
        return $this->cod_equipo;
    }

    public function setCodEquipo($ceq){
        $this->cod_equipo = $ceq;
        return $this;
    }

    ///////////////////////Atributos y metodos jugador////////////////////////////////
    public $codigo;
    public $nombre;
    public $apellido;
    public $edad;
    public $ntelefono;
    public $cod_equipo;
    public $correo;

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nom){
        $this->nombre = $nom;
        return $this;
    }

    public function getApellido(){
        return $this->apellido;
    }

    public function setApellido($ap){
        $this->apellido = $ap;
        return $this;
    }

    public function getEdad(){
        return $this->edad;
    }

    public function setEdad($ed){
        $this->edad = $ed;
        return $this;
    }

    public function getNtelefono(){
        return $this->ntelefono;
    }

    public function setNtelefono($ntel){
        $this->ntelefono = $ntel;
        return $this;
    }

    public function getCodEquipo(){
        return $this->cod_equipo;
    }

    public function setCodEquipo($ceq){
        $this->cod_equipo = $ceq;
        return $this;
    }

    public function getCorreo(){
        return $this->correo;
    }

    public function setCorreo($cor){
        $this->correo = $cor;
        return $this;
    }


    /////////////////////////////////////////////////////////////////////////////////////////
    
    public function Registar_Jugadores(){
        
    }
    
    public function Aceptar_Partido(){

    }

}