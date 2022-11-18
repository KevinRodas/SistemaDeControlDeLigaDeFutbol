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


}

?>