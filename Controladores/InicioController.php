<?php 
require_once "Modelos/Partido.php";
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
   $p1 = new Partido();
   $registros = $p1->Ver_Resultado_Equipo1();
   $registros2 = $p1->Ver_Resultado_Equipo2();
   $data[T_PARTIDO] = "";
   $data2[T_PARTIDO] = "";

   if ($registros != null) {
      $data[T_PARTIDO] = $registros;
      
   }

   if ($registros2 != null) {
      $data2[T_PARTIDO] = $registros2;
      
   }

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