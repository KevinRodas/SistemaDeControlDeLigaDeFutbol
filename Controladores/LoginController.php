<?php 
 require_once "Modelos/login.php";
 require_once "Modelos/usuario.php";
 require_once "config/configGeneral.php";

class LoginController
{
 
    public function __construct()
    {
        $mensaje='Hola';
    }
    
    public function login(){
        require_once "Vistas/login.php";
        
    }



 public function loginVerify(){
    $messa=false;
        if(!empty($_POST)&&isset($_POST[U_ID])){
            if($this->logged($_POST[U_ID],$_POST[U_PASS])){
               
               $rol= $this->logged($_POST[U_ID],$_POST[U_PASS]);
               
               if($rol[U_ROL]== ROL_ADMIN){
                   //require_once('Vistas/PanelAdministrador');
                   
                    header('Location:'.BASE_DIR.'/PanelAdministrador/showHome');
                   
                }     
               
                elseif ($rol[U_ROL]== ROL_REP) {
                    header('Location:'.BASE_DIR.'/PanelRepresentante/showHome');
                }
                elseif ($rol[U_ROL]== ROL_ARB) {
                    header('Location:'.BASE_DIR.'/PanelArbitro/showHome');
                    }
                    elseif ($rol[U_ROL]== ROL_J) {
                        # code...
                        }
                else{
                    echo 'Rol de usuario INfefinido';
                }
                
                
            }
            else{
               
                //header('Location:'.BASE_DIR.'/Login/login');
            }
        } 
        elseif(!empty($_COOKIE["Rol"])){
            echo ($_COOKIE["Rol"]);

            if($_COOKIE["Rol"]==ROL_ADMIN){
                header('Location:'.BASE_DIR.'/PanelAdministrador/showHome');
            }
            elseif ($_COOKIE["Rol"]== ROL_REP) {
                header('Location:'.BASE_DIR.'/PanelRepresentante/showHome');
            }
            elseif($_COOKIE["Rol"]== ROL_ARB){
                header('Location:'.BASE_DIR.'/PanelArbitro/showHome');
            }
        }
     

}

 public function logged($usuario,$contra){
    $bandera=false;
     $user= new Login();
     $user->setUsuario($usuario);
     $user->setContra($contra);
     if($user->login($usuario)){
        $bandera=$user->login($usuario);
     }
     return $bandera;

 }
 public function mensaje_error(){
    echo 'Su usuario o contraseña son incorrectos';

 }
 public function salir(){

    //$user= new Login();
    //$user->logout();
    if(!empty($_COOKIE["SessionId"])&&!empty($_COOKIE["Rol"])){
        
       /*  setcookie("SessionId", null, strtotime('+1 second'), '/');
        setcookie("Rol", null, strtotime('+1 second'), '/');
        unset($_COOKIE);*/
        
        $user= new Login();
       $user->logout();
       header('Location: ' . BASE_DIR . '');
        //echo "No ha iniciado sesion";
    
        
        
    }
    
    
   
 }

}

?>