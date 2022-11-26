<?php 
//session_start();
class AdministrarMiembrosController
{
public function __construct()
{
     
}
 public function showAdminJugador(){
      require_once "Vistas/AdministrarJugadores.php";
      //require_once "Vistas/AdministrarPartidos.php";
 }

 public function showAdminRepresentante(){
     require_once "Vistas/AdministrarRepresentante.php";
     
}
public function showAdminArbitro(){
     require_once "Vistas/AdministrarArbitros.php";

}
public function showAdminAdministrador(){
     require_once "Vistas/AdministrarAdmin.php";
}

public function buscarDireccion($action){
     if ($action=='showAdminJugador') {
          $this->showAdminJugador();
     }
      elseif ($action=="showAdminRepresentante") {
          $this->showAdminRepresentante();
     }
     elseif ($action=='showAdminAdministrador') {
          $this->showAdminAdministrador();
      }
      elseif ($action=='showAdminArbitro') {
          $this->showAdminArbitro();
      }
      else{
          return false;
      }
}

}

?>