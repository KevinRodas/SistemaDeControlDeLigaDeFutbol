<?php
require_once('database/Database.php');
require_once "config/configGeneral.php";
require_once "Modelos/Jugador.php";

class Representante extends Database{
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
   /*
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
*/

    /////////////////////////////////////////////////////////////////////////////////////////
    
    public function Registar_Jugadores(){
        
        $j= new Jugador();
        $query = "INSERT INTO " . T_USUARIO . "(". U_ID. ','. U_NOM.','. U_LN.','.U_AGE.','.U_TEL.','.U_MAIL.','.U_PASS.','.U_ROL.")" . " VALUES(:" . U_ID . ", :" . U_NOM. ", :" . U_LN . ", :" . U_AGE . ", :". U_TEL . ", :". U_MAIL. ", :". U_PASS . ", :". U_ROL. ")";
        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . U_ID, $j->getCodigo());
        $statement->bindValue(':' . U_NOM, $j->getNombre());
        $statement->bindValue(':' . U_LN, $j->getApellido());
        $statement->bindValue(':' . U_AGE, $j->getEdad());
        $statement->bindValue(':' . U_TEL, $j->getNtelefono());
        $statement->bindValue(':' . U_MAIL, $j->getCorreo());
        $statement->bindValue(':' . U_PASS, "1234");
        $statement->bindValue(':' . U_ROL, "Jugador");

        
        $query1 = "INSERT INTO " . T_JUGADOR . "(". JUG_ID. ','. JUG_USER.','. JUG_EQP.','.JUG_PART.','.JUG_SANC.','.JUG_GOL.")" . " VALUES(:" . JUG_ID . ", :" . JUG_USER. ", :" . JUG_EQP . ", :" . JUG_PART . ", :". JUG_SANC. . ", :". JUG_GOL. ")";
        $statement1 = $this->conexion->prepare($query1);
        $statement1->bindValue(':' . JUG_ID, NULL);
        $statement1->bindValue(':' . JUG_USER, $j->getCodigo());
        $statement1->bindValue(':' . JUG_EQP, $j->getCodEquipo());
        $statement1->bindValue(':' . JUG_PART, "0");
        $statement1->bindValue(':' . JUG_SANC, "0");
        $statement1->bindValue(':' . JUG_GOL, "0");

        $message = "<h1>Error al ingresar datos!</h1>";
        if ($statement->execute() && $statement1->execute()) {
            $message = "<h1>Datos ingresados con éxito!</h1>";
        }
        return $message;

    }
    
    public function Aceptar_Partido(){

    }

}