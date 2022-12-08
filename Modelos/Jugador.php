<?php
require_once('database/Database.php');
require_once "config/configGeneral.php";

class Jugador extends Database{
//Atributos
    public $codigo;
    public $cod_equipo;
    public $npartidos;
    public $nsancines;
    public $ngoles;
//metodos

    public function __construct()
    {
        parent::__construct();
    }


    public function getIdJugador(){
        return $this->codigo;
    }
    
    public function setIdJugador($id){
        $this->codigo = $id;
        return $this;
    }

    
    public function getCodEquipo(){
        return $this->cod_equipo;
    }

    public function setCodEquipo($ceq){
        $this->cod_equipo = $ceq;
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

    public function Crear_Jugador(){
        $query = "INSERT INTO " . T_JUGADOR. " (". JUG_ID. ', '. JUG_EQP .', '. JUG_PART.', '.JUG_SANC.', '.JUG_GOL.")" . 
        " VALUES(:" . JUG_ID . ", :" . JUG_EQP. ", :" . JUG_PART . ", :" . JUG_SANC . ", :". JUG_GOL . ")";
        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . JUG_ID, $this->getIdJugador());
        $statement->bindValue(':' . JUG_EQP, $this->getCodEquipo());
        $statement->bindValue(':' . JUG_PART, $this->getNpartidos());
        $statement->bindValue(':' . JUG_SANC, $this->getNsanciones());
        $statement->bindValue(':' . JUG_GOL, $this->getNgoles());
        var_dump($statement);
        $message = "<h1>Error al ingresar datos!</h1>";
        if ($statement->execute()) {
            var_dump($statement);
            $message = "<h1>Datos ingresados con éxito!</h1>";
        }
        return $message;
    }
    
    public function Modificar_Jugador(){
        $query = " UPDATE " . T_JUGADOR . "SET(". JUG_ID. ','. JUG_EQP.','. JUG_PART.','.JUG_SANC.','.JUG_GOL.")" . 
        " VALUES(:" .  JUG_ID . ", :" . JUG_EQP. ", :" . JUG_PART . ", :" . JUG_SANC . ", :". JUG_GOL . ") WHERE " . JUG_ID . "= :" . JUG_ID ;
        $statement = $this->conexion->prepare($query);
        $statement = $this->conexion->prepare($query);

        $statement->bindValue(':' . JUG_ID, $this->getIdJugador());
        $statement->bindValue(':' . JUG_EQP, $this->getCodEquipo());
        $statement->bindValue(':' . JUG_PART, $this->getNpartidos());
        $statement->bindValue(':' . JUG_SANC, $this->getNsanciones());
        $statement->bindValue(':' . JUG_GOL, $this->getNgoles());

        $message = "<h1>Error al modificar datos!</h1>";
        if ($statement->execute()) {
            $message = "<h1>Datos modificados con éxito!</h1>";
        }
        return $message;
    }
    
    public function Ver_Jugadores(){
        $row=false;
        $query = "SELECT * FROM " .T_JUGADOR;
        $statement = $this->conexion->prepare($query);
        if ($statement->execute()) {
           $row= $statement->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        }
        return $row;
    }

    public function Ver_Jugadores2(){
        $row=false;
        $query = "SELECT id_usuario,nombre,apellido,id_equipo,n_sanciones FROM tbl_usuario u INNER JOIN tbl_jugador j ON j.id_jugador = u.id_usuario; ";
        $statement = $this->conexion->prepare($query);
        if ($statement->execute()) {
           $row= $statement->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        }
        return $row;
    }
    
    public function Buscar_Jugador(){
        $query = "SELECT * FROM " . T_JUGADOR . " WHERE " . JUG_ID . "= :" . JUG_ID ;
        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . JUG_ID, $this->getIdJugador());
        $row = false;
        if ($statement->execute()) {
            $row = $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        return $row;
    }

    public function Buscar_Jugadores_Equipo(){
        $query = "SELECT * FROM " . T_JUGADOR. " WHERE " . JUG_EQP . "= :" . JUG_EQP ;
        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . JUG_EQP, $this->getCodEquipo());
        $row = false;
        if ($statement->execute()) {
            $row = $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        return $row;
    }

    public function Eliminar_Jugador(){
        $query = "DELETE FROM " . T_JUGADOR . " WHERE " . JUG_ID . "= :" . JUG_ID ;
        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . U_ID, $this->getIdJugador());

        $message = "<h1>Error al ELIMINAR !</h1>";
        if ($statement->execute()) {
            $message = "<h1>Datos eliminados con éxito!</h1>";
        }
        return $message;
    }
    
    public function Actualizar_Gol(){
        $query = "UPDATE " . T_JUGADOR . " SET ".  JUG_GOL."=:" .  JUG_GOL. " WHERE " . JUG_ID . "=:" . JUG_ID;
        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . JUG_ID,  $this->getIdJugador());
        $statement->bindValue(':' . JUG_GOL,  $this->getNgoles());
        var_dump( $statement);
        echo $this->getIdJugador();
        echo $this->getNgoles();
        $message = "<h1>Error al actualizar partido!</h1>";
        if ($statement->execute()) {
            $message = "<h1>Datos actualizados con éxito!</h1>";
        }
        return $message;
    }

    public function Actualizar_Partido(){
        $query = "UPDATE " . T_JUGADOR . " SET ".  JUG_PART."=:" .  JUG_PART. " WHERE " . JUG_ID . "=:" . JUG_ID;
        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . JUG_ID,  $this->getIdJugador());
        $statement->bindValue(':' . JUG_PART,  $this->getNpartidos());
        var_dump( $statement);
        echo $this->getIdJugador();
        echo $this->getNpartidos();
        $message = "<h1>Error al actualizar partido!</h1>";
        if ($statement->execute()) {
            $message = "<h1>Datos actualizados con éxito!</h1>";
        }
        return $message;
    }

    public function Actualizar_Sancion(){
        $query = "UPDATE " . T_JUGADOR . " SET ".  JUG_SANC."=:" .  JUG_SANC. " WHERE " . JUG_ID . "=:" . JUG_ID;
        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . JUG_ID,  $this->getIdJugador());
        $statement->bindValue(':' . JUG_SANC,  $this->getNsanciones());
        var_dump( $statement);
        echo $this->getIdJugador();
        echo $this->getNsanciones();
        $message = "<h1>Error al actualizar partido!</h1>";
        if ($statement->execute()) {
            $message = "<h1>Datos actualizados con éxito!</h1>";
        }
        return $message;
    }

    public function Mostrar_Expediente(){

    }
    
    public function Mostrar_Sanciones(){

    }
    
    public function Mostrar_Partidos(){

    }

    public function Buscar_Jugadores_Equipo_SinSancion(){
        $query = "SELECT * FROM " . T_JUGADOR. " WHERE " . JUG_EQP . "= :" . JUG_EQP ;
        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . JUG_EQP, $this->getCodEquipo());
        $row = false;
        if ($statement->execute()) {
            $row = $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        return $row;
    }

    public function Buscar_Datos_Jugador(){
        $query = "SELECT * FROM tbl_jugador INNER JOIN tbl_usuario ON tbl_usuario.id_usuario = tbl_jugador.id_jugador " . " WHERE " . JUG_ID . "= :" . JUG_ID ;
        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . JUG_ID, $this->getIdJugador());
        $row = false;
        if ($statement->execute()) {
            $row = $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        return $row;
    }



    
}