<?php
require_once('database/Database.php');
require_once "config/configGeneral.php";

class Administrativo extends Database{
    public $codigo;
    public $puesto;

    public function __construct()
    {
        parent::__construct();
    }

    public function getId(){
        return $this->codigo;
    }

    public function setId($i){
        $this->codigo = $i;
        return $this;
    }

    

    public function getPuesto(){
        return $this->puesto;
    }

    public function setPuesto($pu){
        $this->puesto = $pu;
        return $this;
    }

/*
    ///////////////////////Atributos y metodos Arbitro///////////////////////////////////////
    public $codigo;
    public $nombre;
    public $apellido;
    public $edad;
    public $ntelefono;
    public $correo;
    public $direccion;
    public $disponibilidad;
    public $npartidos;

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

    /////////////////////////////////////////////////////////////////////////////////////////

    ///////////////////////Atributos y metodos Representante/////////////////////////////////

    public $codigo;
    public $nombre;
    public $apellido;
    public $edad;
    public $ntelefono;
    public $correo;
    public $direccion;
    public $cod_equipo;

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
*/
    /////////////////////////////////////////////////////////////////////////////////////////
    
    public function Crear_Administrativo(){
        $query = "INSERT INTO " . T_ADMIN. " (". ADMIN_ID. ', '. ADMIN_P .")" . 
        " VALUES(:" . ADMIN_ID . ", :" . ADMIN_P.")";
        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . ADMIN_ID, $this->getId());
        $statement->bindValue(':' . ADMIN_P, $this->getPuesto());
      
        var_dump($statement);
        $message = "<h1>Error al ingresar datos!</h1>";
        if ($statement->execute()) {
            var_dump($statement);
            $message = "<h1>Datos ingresados con ??xito!</h1>";
        }
        return $message;
    }

    public function Ver_Administrativo(){
        $row=false;
        $query = "SELECT * FROM " .T_ADMIN;
        $statement = $this->conexion->prepare($query);
        if ($statement->execute()) {
           $row= $statement->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        }
        return $row;
    }
    public function Cancelacion_Sanciones(){

    }
    
    public function Crear_Partido(){

    }
    
    public function Registrar_Equipo(){

    }

    public function Mostrar_Lista_Report_Partido(){
        $query = "SELECT * FROM " . T_REPORTE;
        $statement = $this->conexion->prepare($query);
        $rows = false;
        if ($statement->execute()) {
            $rows = $row= $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        return $rows;
    }

    public function Ver_Reporte(){

    }

    public function Editar_Reporte(){

    }

    public function Eliminar_Reporte(){
        
    }

    public function Buscar_Reporte(){
        
    }

    public function Mostar_Lista_Jugadores(){
        $row=false;
        $query = "SELECT * FROM " .T_JUGADOR;
        $statement = $this->conexion->prepare($query);
        if ($statement->execute()) {
           $row= $statement->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        }
        return $row;
    }

    public function Ver_Jugador(){

    }

    public function Editar_Jugador(){

    }

    public function Eliminar_Jugador(){
        
    }

    public function Buscar_Jugador(){
        
    }

    public function Mostar_Lista_Equipos(){
        $row=false;
        $query = "SELECT * FROM " .T_EQUIPO;
        $statement = $this->conexion->prepare($query);
        if ($statement->execute()) {
           $row= $statement->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        }
        return $row;
    }

    public function Ver_Equipo(){

    }

    public function Editar_Equipo(){

    }

    public function Eliminar_Equipo(){

    }

    public function Buscar_Equipo(){

    }

    public function Mostrar_Lista_Arbitros(){
        $row=false;
        $query = "SELECT * FROM " .T_ARBITRO;
        $statement = $this->conexion->prepare($query);
        if ($statement->execute()) {
           $row= $statement->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        }
        return $row;
    }

    public function Crear_Arbitro(){

    }

    public function Ver_Arbitro(){

    }

    public function Editar_Arbitro(){

    }

    public function Eliminar_Arbitro(){

    }

    public function Buscar_Arbitro(){

    }

    public function Mostrar_Lista_Representantes(){
        $row=false;
        $query = "SELECT * FROM " .T_REPRE;
        $statement = $this->conexion->prepare($query);
        if ($statement->execute()) {
           $row= $statement->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        }
        return $row;
    }

    public function Crear_Representante(){

    }

    public function Ver_Representante(){

    }

    public function Editar_Representante(){

    }

    public function Eliminar_Representante(){

    }

    public function Buscar_Representante(){

    }

    public function Mostar_Lista_Partidos(){
        $row=false;
        $query = "SELECT * FROM " .T_PARTIDO;
        $statement = $this->conexion->prepare($query);
        if ($statement->execute()) {
           $row= $statement->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        }
        return $row;
    }
}