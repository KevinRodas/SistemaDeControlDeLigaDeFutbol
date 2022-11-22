<?php
require_once('database/Database.php');
require_once "config/configGeneral.php";

class Administrativo{
    public $codigo;
    public $nombre;
    public $apellido;
    public $edad;
    public $ntelefono;
    public $correo;
    public $puesto;

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

    public function getPuesto(){
        return $this->puesto;
    }

    public function setPuesto($pu){
        $this->puesto = $pu;
        return $this;
    }


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

    /////////////////////////////////////////////////////////////////////////////////////////
    
    public function Cancelacion_Sanciones(){

    }
    
    public function Crear_Partido(){

    }
    
    public function Registrar_Equipo(){

    }

    public function Mostrar_Lista_Report_Partido(){

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

    }
}