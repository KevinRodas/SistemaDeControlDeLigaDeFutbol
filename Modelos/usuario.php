<?php 
require_once('database/Database.php');
class Usuario extends Database
{
    protected $usuario;
    protected $contraseña;
    protected $nombre;
    protected $apellido;
    protected $edad;
    protected $telefono;
    protected $correo;
    protected $rol;

    public function __construct()
    {
        parent::__construct();
    }

    public function getUsuario(){
        return $this->usuario;
    }

    public function setUsuario($user){
        $this->usuario = $user;
        return $this;
    }

    public function getContra(){
        return $this->contraseña;
    }

    public function setContra($contra){
        $this->contraseña = $contra;
        return $this;
    }

    public function getRol(){
        return $this->rol;
    }

    public function setRol($r){
        $this->rol= $r;
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

    public function Crear_Usuario(){
        $query = "INSERT INTO " . T_USUARIO. "(". U_ID. ','. U_NOM.','. U_LN.','.U_AGE.','.U_TEL.','.U_MAIL.','.U_PASS.','.U_ROL.")" . 
        " VALUES(:" . U_ID . ", :" . U_NOM. ", :" . U_LN . ", :" . U_AGE . ", :". U_TEL .  ", :". U_MAIL .  ", :". U_PASS .  ", :". U_ROL . ")";
        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . U_ID, $this->getUsuario());
        $statement->bindValue(':' . U_NOM, $this->getNombre());
        $statement->bindValue(':' . U_LN, $this->getApellido());
        $statement->bindValue(':' . U_AGE, $this->getEdad());
        $statement->bindValue(':' . U_TEL, $this->getNtelefono());
        $statement->bindValue(':' . U_MAIL, $this->getCorreo());
        $statement->bindValue(':' . U_PASS, $this->getContra());
        $statement->bindValue(':' . U_ROL, $this->getRol());

        $message = "<h1>Error al ingresar datos!</h1>";
        if ($statement->execute()) {
            $message = "<h1>Datos ingresados con éxito!</h1>";
        }
        return $message;
    }
    
    public function Modificar_Usuario(){
        $query = " UPDATE " . T_USUARIO . "SET(". U_ID. ','. U_NOM.','. U_LN.','.U_AGE.','.U_TEL.','.U_MAIL.','.U_PASS.','.U_ROL.")" . 
        " VALUES(:" .  U_ID . ", :" . U_NOM. ", :" . U_LN . ", :" . U_AGE . ", :". U_TEL .  ", :". U_MAIL .  ", :". U_PASS .  ", :". U_ROL . ")";
        $statement = $this->conexion->prepare($query);
        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . U_ID, $this->getUsuario());
        $statement->bindValue(':' . U_NOM, $this->getNombre());
        $statement->bindValue(':' . U_LN, $this->getApellido());
        $statement->bindValue(':' . U_AGE, $this->getEdad());
        $statement->bindValue(':' . U_TEL, $this->getNtelefono());
        $statement->bindValue(':' . U_MAIL, $this->getCorreo());
        $statement->bindValue(':' . U_PASS, $this->getContra());
        $statement->bindValue(':' . U_ROL, $this->getRol());

        $message = "<h1>Error al modificar datos!</h1>";
        if ($statement->execute()) {
            $message = "<h1>Datos modificados con éxito!</h1>";
        }
        return $message;
    }
    
    public function Ver_Usuarios(){
        $row=false;
        $query = "SELECT * FROM " .T_USUARIO;
        $statement = $this->conexion->prepare($query);
        if ($statement->execute()) {
           $row= $statement->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        }
        return $row;
    }

    public function Buscar_Usuario(){
        $query = "SELECT * FROM " . T_USUARIO . "WHERE " . U_ID . "= :" . U_ID ;
        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . U_ID, $this->getUsuario());
        $row = false;
        if ($statement->execute()) {
            $row = $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        return $row;
    }

    public function Eliminar_Usuario(){
        $query = "DELETE FROM " . T_USUARIO . " WHERE " . U_ID . "= :" . U_ID ;
        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . U_ID, $this->getUsuario());

        $message = "<h1>Error al ELIMINAR USUARIO!</h1>";
        if ($statement->execute()) {
            $message = "<h1>Datos eliminados con éxito!</h1>";
        }
        return $message;
    }

}

?>