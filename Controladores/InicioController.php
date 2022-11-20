<?php 

class InicioController
{
 public function __construct()
 {
 }
 public function showInicio(){

   if(empty ($_COOKIE["Rol"])){
      require_once 'Vistas/Inicio.php';
   }
   else{
      require_once 'Controladores/LoginController.php';
      $c = new LoginController();
      $c->loginVerify();
      //echo 'Inicio Sesion anteriormente';
   }
   
 }


}

?>