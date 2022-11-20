<?php 
require_once('database/Database.php');
class Login extends Database
{
    protected $usuario;
    protected $contraseña;
    

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

    public function login($user){
        $b=false;
        $query = 'SELECT * FROM '.T_USUARIO.' WHERE '.U_ID.'=:'.$user;
        $statement = $this->conexion->prepare($query);
        $statement->bindValue(":".$user,$this->getUsuario());
        if($statement->execute()){
            $nRows = $statement->rowCount();
            //Si se encontro solo un usuario continua con el proceso
            if ($nRows == 1) {

                //Tomamos ese usuario como un arreglo asociativo
                $result = $statement->fetch(PDO::FETCH_ASSOC);

                //una vez tenemos todos los datos de el usuario, comprobamos si su contraseña coincide
                //var_dump($statement);
                if ($this->getContra() == $result[U_PASS]) {

                    $_SESSION[U_ID] = $result[U_ID];
                    $_SESSION[U_ROL] = $result[U_ROL];
                    

                    //creamos una cookie
                    setcookie("SessionId", true, strtotime('+1 day'), '/');
                    setcookie("Rol", $result[U_ROL], strtotime('+1 day'), '/');

                    return $result;
                } else { //En caso que las contraseñas no coincidan, retornara false
                    $result = false;
                }
            //$b=true;
            }
            else{//encaso contrario ese usuario no existe
                //echo '<h1>No se encontro usuario</h1>';
            }
      
        }
    }

    public function logout(){
        setcookie("SessionId", null, strtotime('+1 second'), '/');
        setcookie("Rol", null, strtotime('+1 second'), '/');
        unset($_COOKIE);
        unset($_SESSION);
        
        /*


        setcookie("SessionId", null, strtotime('+1 second'), '/');
        setcookie("Rol", null, strtotime('+1 second'), '/');
        unset($_COOKIE);
        unset($_SESSION);

        header('Location: ' . BASE_DIR . ''); //Mandamos de regreso a la pagina de login
        
        */
    }

}
?>