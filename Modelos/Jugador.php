<?php
require_once('database/Database.php');
require_once "config/configGeneral.php";

class Jugador extends Database{
//Atributos
    public $codigo;
    public $nombre;
    public $apellido;
    public $edad;
    public $ntelefono;
    public $cod_equipo;
    public $correo;
    public $npartidos;
    public $nsancines;
    public $ngoles;
//metodos

    public function __construct()
    {
        parent::__construct();
    }

    public function getCodigo(){
        return $this->codigo;
    }

    public function setCodigo($cod){
        $this->codigo = $cod;
        return $this;
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

    public function getNpartidos(){
        return $this->npartidos;
    }

    public function setNpartidos($par){
        $this->npartidos = $par;
        return $this;
    }

    public function getNsanciones(){
        return $this->nsancines;
    }

    public function setNsanciones($nsan){
        $this->nsancines = $nsan;
        return $this;
    }

    public function getNgoles(){
        return $this->ngoles;
    }

    public function setNgoles($ng){
        $this->ngoles = $ng;
        return $this;
    }

    

    public function Mostrar_Expediente(){

    }
    
    public function Mostrar_Sanciones(){

    }
    
    public function Mostrar_Partidos(){

    }
}