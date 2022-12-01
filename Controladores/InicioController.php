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

 public function showAcerca(){
   require_once "Vistas/AcercaDe.php";
}

public function showPartidos(){
   require_once "Vistas/partidos.php";

}

public function showNoticias(){
   
   require_once "Vistas/noticias.php";
   
}

public function showEquipos(){
   require_once "Vistas/Equipos.php";
}

public function buscarDireccion($action){
   if ($action=='showAcerca') {
       $this->showAcerca();
   }
   elseif ($action=="showPartidos") {
       $this->showPartidos();
   }
   elseif ($action=="showNoticias") {
       $this->showNoticias();
   }
   elseif ($action=="showEquipos") {
       $this->showEquipos();
   }
   elseif ($action=="showInicio") {
       $this->showInicio();
   }
   else{
       return false;
   }
}


}

?>