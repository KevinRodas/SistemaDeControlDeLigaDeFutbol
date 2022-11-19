<?php 
//session_start();
class PanelAdministradorController
{
public function __construct()
{
     
}
 public function showHome(){
      require_once "Vistas/PanelAdministrador.php";
      //require_once "Vistas/AdministrarPartidos.php";
 }

 public function showAdminPartido(){
     require_once "Vistas/AdministrarPartidos.php";
     
}
public function showAdminEquipo(){
     require_once "Vistas/AdministrarEquipos.php";

}
public function cancelarSancion(){
     //require_once "Vistas/";


}
public function showAdminNoticias(){
     //require_once "Vistas/";
}

 public function showAdminMiembro(){
     //require_once "Vistas/";
 }

 public function showAdminLocal(){
     require_once "Vistas/AdministrarEstadio.php";
}

public function buscarDireccion($action){
     if ($action=='showHome') {
          $this->showHome();
     }
      elseif ($action=="showAdminPartido") {
          $this->showAdminPartido();
     }
     elseif ($action=='showAdminEquipo') {
          $this->showAdminEquipo();
      }
      elseif ($action=='cancelarSancion') {
          $this->cancelarSancion();
      }
      elseif ($action=='showAdminNoticias') {
          $this->showAdminNoticias();
      }
      elseif ($action=='showAdminMiembro') {
          $this->showAdminMiembro();
      }
      elseif ($action == 'showAdminLocal') {
          $this->showAdminLocal();
      }
      else{
          return false;
      }
}

}

?>